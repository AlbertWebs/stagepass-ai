<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Throwable;

class QuoteRequestController extends Controller
{
    public function __invoke(Request $request): RedirectResponse|JsonResponse
    {
        if ($request->filled('company_website')) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Thanks for your quotation request.',
                ], 202);
            }

            return to_route('home');
        }

        $quoteRequest = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:254'],
            'phone' => ['required', 'string', 'max:32'],
            'organization' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
            'challenge' => ['required', 'integer', 'between:4,18'],
        ]);

        $expectedChallenge = $request->session()->get('quote_challenge');

        if ($expectedChallenge === null || ! hash_equals((string) $expectedChallenge, (string) $quoteRequest['challenge'])) {
            throw ValidationException::withMessages([
                'challenge' => 'That answer was not correct. Please try the new question.',
            ]);
        }

        if (in_array(config('mail.default'), ['log', 'array'], true)) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Online quote delivery is not available right now. Please email info@stagepass.co.ke.',
                ], 503);
            }

            return back()
                ->withInput($request->except(['_token', 'company_website']))
                ->with('quote_delivery_unavailable', true);
        }

        $messageBody = implode("\n", [
            'A new quotation request was submitted through the Stagepass website.',
            '',
            'Name: '.$quoteRequest['name'],
            'Email: '.$quoteRequest['email'],
            'Phone: '.$quoteRequest['phone'],
            'Company or organisation: '.($quoteRequest['organization'] ?: 'Not provided'),
            '',
            'Event details:',
            $quoteRequest['message'],
        ]);

        try {
            Mail::raw($messageBody, static function (Message $message) use ($quoteRequest): void {
                $message
                    ->from('info@stagepass.co.ke', 'Stagepass Website')
                    ->to('info@stagepass.co.ke')
                    ->replyTo($quoteRequest['email'])
                    ->subject('New Stagepass quotation request');
            });
        } catch (Throwable $exception) {
            report($exception);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'We could not send your request right now. Please email info@stagepass.co.ke.',
                ], 503);
            }

            return back()
                ->withInput($request->except(['_token', 'company_website']))
                ->with('quote_delivery_unavailable', true);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Thanks for reaching out. Your quotation request has been sent to our team.',
            ]);
        }

        return to_route('home')->with('quote_submitted', true);
    }
}

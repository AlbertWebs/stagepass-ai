<?php

use App\Http\Controllers\QuoteRequestController;
use App\Services\InstagramFeedService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$sitePages = config('site_pages', []);
$canonicalOrigin = rtrim(config('site_seo.canonical_origin', 'https://stagepass.co.ke'), '/');

Route::get('/', function (Request $request, InstagramFeedService $instagramFeed): View {
    $firstChallengeNumber = random_int(2, 9);
    $secondChallengeNumber = random_int(2, 9);
    $request->session()->put('quote_challenge', $firstChallengeNumber + $secondChallengeNumber);

    return view('welcome', [
        'instagramPosts' => $instagramFeed->posts(),
        'quoteChallenge' => $firstChallengeNumber.' + '.$secondChallengeNumber,
    ]);
})->name('home');

Route::post('/quote-requests', QuoteRequestController::class)
    ->middleware('throttle:quote-requests')
    ->name('quote-requests.store');

foreach ($sitePages as $slug => $page) {
    Route::get($page['uri'], function (InstagramFeedService $instagramFeed) use ($page, $canonicalOrigin) {
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => match ($page['name']) {
                'about' => 'AboutPage',
                'contact' => 'ContactPage',
                default => 'WebPage',
            },
            'name' => $page['title'],
            'description' => $page['description'],
            'url' => $canonicalOrigin.$page['uri'],
            'isPartOf' => ['@type' => 'WebSite', 'name' => 'Stagepass Audio Visual', 'url' => route('home')],
            'publisher' => ['@type' => 'Organization', 'name' => 'Stagepass Audio-Visual Limited', 'url' => route('home')],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => $page['eyebrow'], 'item' => $canonicalOrigin.$page['uri']],
                ],
            ],
            ...in_array($page['name'], ['services', 'lighting'], true) ? [
                'mainEntity' => ['@type' => 'Service', 'name' => $page['heading'], 'serviceType' => $page['eyebrow'], 'provider' => ['@type' => 'Organization', 'name' => 'Stagepass Audio-Visual Limited']],
            ] : [],
        ];

        $viewData = [
            ...$page,
            'metaTitle' => $page['title'],
            'metaDescription' => $page['description'],
            'canonicalUrl' => $canonicalOrigin.$page['uri'],
            'metaKeywords' => $page['keywords'] ?? config('site_seo.keywords'),
            'structuredData' => $structuredData,
        ];

        if ($page['name'] === 'our-work') {
            return view('pages.instagram-feed', [
                ...$viewData,
                'instagramPosts' => $instagramFeed->posts(),
            ]);
        }

        return view('pages.content', $viewData);
    })->name($page['name']);
}

Route::get('/sitemap.xml', function () use ($sitePages, $canonicalOrigin) {
    $urls = [$canonicalOrigin.'/', ...array_map(fn (array $page): string => $canonicalOrigin.$page['uri'], array_values($sitePages))];

    return response()->view('sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

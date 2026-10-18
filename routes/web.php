<?php

use Illuminate\Support\Facades\Route;

$sitePages = config('site_pages');

Route::view('/', 'welcome')->name('home');

foreach ($sitePages as $slug => $page) {
    Route::get($page['uri'], function () use ($page) {
        $structuredData = [
            '@context' => 'https://schema.org',
            '@type' => match ($page['name']) {
                'about' => 'AboutPage',
                'contact' => 'ContactPage',
                default => 'WebPage',
            },
            'name' => $page['title'],
            'description' => $page['description'],
            'url' => url()->current(),
            'isPartOf' => ['@type' => 'WebSite', 'name' => 'Stagepass Audio Visual', 'url' => route('home')],
            'publisher' => ['@type' => 'Organization', 'name' => 'Stagepass Audio-Visual Limited', 'url' => route('home')],
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => $page['eyebrow'], 'item' => url()->current()],
                ],
            ],
            ...in_array($page['name'], ['services', 'lighting'], true) ? [
                'mainEntity' => ['@type' => 'Service', 'name' => $page['heading'], 'serviceType' => $page['eyebrow'], 'provider' => ['@type' => 'Organization', 'name' => 'Stagepass Audio-Visual Limited']],
            ] : [],
        ];

        return view('pages.content', [
            ...$page,
            'metaTitle' => $page['title'],
            'metaDescription' => $page['description'],
            'structuredData' => $structuredData,
        ]);
    })->name($page['name']);
}

Route::get('/sitemap.xml', function () use ($sitePages) {
    $urls = [route('home'), ...array_map(fn (array $page): string => route($page['name']), array_values($sitePages))];

    return response()->view('sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

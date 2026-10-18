@extends('layouts.site')

@push('head')
    <script type="application/ld+json">@json($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')
<main class="inner-page">
    <section class="inner-hero">
        <div class="wrap inner-hero-content">
            <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span>{{ $eyebrow }}</span></nav>
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h1>{{ $heading }}</h1>
            <p class="inner-intro">{{ $intro }}</p>
            @if (!empty($cta))
                <a class="button button-primary" href="{{ $cta['url'] }}">{{ $cta['label'] }} <svg><use href="#i-arrow"/></svg></a>
            @endif
        </div>
    </section>
    <div class="inner-content wrap">
        @foreach ($sections as $section)
            <section class="inner-section" @if (!empty($section['id'])) id="{{ $section['id'] }}" @endif>
                @if (!empty($section['eyebrow']))<p class="eyebrow">{{ $section['eyebrow'] }}</p>@endif
                @if (!empty($section['heading']))<h2>{{ $section['heading'] }}</h2>@endif
                @if (!empty($section['body']))<p class="inner-body">{{ $section['body'] }}</p>@endif
                @if (!empty($section['items']))
                    <div class="inner-card-grid">
                        @foreach ($section['items'] as $item)
                            <article class="inner-card">
                                @if (!empty($item['eyebrow']))<span class="inner-card-label">{{ $item['eyebrow'] }}</span>@endif
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['body'] }}</p>
                                @if (!empty($item['url']))<a href="{{ $item['url'] }}">{{ $item['link'] ?? 'Learn more' }} <svg><use href="#i-arrow"/></svg></a>@endif
                            </article>
                        @endforeach
                    </div>
                @endif
                @if (!empty($section['list']))
                    <ul class="inner-list">@foreach ($section['list'] as $item)<li>{{ $item }}</li>@endforeach</ul>
                @endif
            </section>
        @endforeach
    </div>
</main>
@endsection

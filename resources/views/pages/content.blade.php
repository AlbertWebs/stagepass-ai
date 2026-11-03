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
    @if ($name === 'industries' && !empty($gallery))
        <section class="inner-industries-gallery wrap" aria-label="Industries served">
            @foreach ($gallery as $industry)
                <article class="inner-industry-card {{ $industry['scene'] }} {{ count($industry['images']) > 0 ? 'industry-card-gallery' : '' }}" @if (count($industry['images']) > 1) data-industry-carousel role="group" aria-label="{{ $industry['title'] }} image carousel" @endif>
                    @if (count($industry['images']) > 0)
                        <div class="industry-gallery" style="--industry-backdrop: url('{{ asset('images/industries/'.$industry['images'][0]) }}')">
                            @foreach ($industry['images'] as $image)
                                <img class="industry-slide {{ $loop->first ? 'is-active' : '' }}" src="{{ asset('images/industries/'.$image) }}" alt="{{ $industry['title'] }} event production, image {{ $loop->iteration }} of {{ count($industry['images']) }}" @if (!$loop->first) loading="lazy" @endif decoding="async">
                            @endforeach
                        </div>
                    @endif
                    <span class="industry-card-shade" aria-hidden="true"></span>
                    <h2>{{ $industry['title'] }}</h2>
                    @if (count($industry['images']) > 1)
                        <div class="industry-carousel-pagination" role="group" aria-label="{{ $industry['title'] }} image selection">
                            <div class="industry-carousel-dots">
                                @foreach ($industry['images'] as $image)
                                    <button type="button" data-industry-slide="{{ $loop->index }}" aria-label="Show {{ $industry['title'] }} image {{ $loop->iteration }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"></button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </article>
            @endforeach
        </section>
    @endif
    <div class="inner-content wrap">
        @foreach ($sections as $section)
            <section @class(['inner-section', 'inner-section--has-image' => !empty($section['image']), 'services-section' => $name === 'services']) @if ($name === 'services') data-scroll-reveal @endif @if (!empty($section['id'])) id="{{ $section['id'] }}" @endif>
                @if (!empty($section['image']))<div class="inner-section-feature"><div class="inner-section-copy">@endif
                @if (!empty($section['eyebrow']))<p class="eyebrow">{{ $section['eyebrow'] }}</p>@endif
                @if (!empty($section['heading']))<h2>{{ $section['heading'] }}</h2>@endif
                @if (!empty($section['body']))<p class="inner-body">{{ $section['body'] }}</p>@endif
                @if (!empty($section['items']))
                    <div class="inner-card-grid">
                        @foreach ($section['items'] as $item)
                            <article @class(['inner-card', 'services-card' => $name === 'services']) @if ($name === 'services') data-scroll-reveal style="--reveal-delay: {{ ($loop->index % 3) * 80 }}ms" @endif>
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
                @if (!empty($section['image']))</div><figure class="inner-section-image"><img src="{{ asset($section['image']) }}" alt="{{ $section['image_alt'] ?? '' }}" loading="lazy" decoding="async"></figure></div>@endif
            </section>
        @endforeach
    </div>
</main>
@endsection

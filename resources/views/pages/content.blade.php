@extends('layouts.site')

@push('head')
    <script type="application/ld+json">@json($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')
<main @class(['inner-page', 'services-page' => $name === 'services', 'about-page' => $name === 'about'])>
    <section @class(['inner-hero', 'services-hero' => $name === 'services']) @if ($name === 'services') style="--services-hero-photo: url('{{ asset('images/fifa-congress-hero.jpg') }}')" @endif>
        <div @class(['wrap', 'inner-hero-content', 'services-hero-content' => $name === 'services'])>
            <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span>{{ $eyebrow }}</span></nav>
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h1>{{ $heading }}</h1>
            <p class="inner-intro">{{ $intro }}</p>
            @if ($name === 'services')
                <div class="services-hero-actions">
                    <a class="button button-primary" href="{{ route('contact') }}">Plan your event <svg><use href="#i-arrow"/></svg></a>
                    <a class="services-text-link" href="#service-capabilities">Explore services <span aria-hidden="true">↓</span></a>
                </div>
            @elseif ($name === 'about')
                <div class="about-hero-actions">
                    <a class="button button-outline button-small" href="{{ route('industries') }}">Explore Industries <svg><use href="#i-arrow"/></svg></a>
                    <span>People <i></i> Technology <i></i> Impact</span>
                </div>
            @elseif (!empty($cta))
                <a class="button button-primary" href="{{ $cta['url'] }}">{{ $cta['label'] }} <svg><use href="#i-arrow"/></svg></a>
            @endif
            @if ($name === 'services')
                <div class="services-hero-stamp" aria-label="Concept, design, execution">
                    <span>Concept</span><i></i><span>Design</span><i></i><span>Execution</span>
                </div>
            @endif
        </div>
    </section>
    @if ($name === 'industries')
        @include('partials.industries-section', ['industries' => config('site_industries'), 'isHomePage' => false])
    @elseif ($name === 'services')
        @php($capabilities = $sections[0])
        <section class="services-capabilities wrap" id="service-capabilities" aria-labelledby="service-capabilities-title">
            <div class="services-capabilities-heading">
                <div>
                    <p class="eyebrow">{{ $capabilities['eyebrow'] }}</p>
                    <h2 id="service-capabilities-title">{{ $capabilities['heading'] }}</h2>
                    <p class="inner-body">{{ $capabilities['body'] }}</p>
                </div>
                <span class="services-count"><strong>09</strong><small>capabilities<br>one production team</small></span>
            </div>
            <div class="services-capability-grid">
                @foreach ($capabilities['items'] as $item)
                    <article class="services-capability-card" data-scroll-reveal style="--reveal-delay: {{ ($loop->index % 3) * 70 }}ms">
                        <div class="services-card-top"><span class="services-card-number">0{{ $loop->iteration }}</span><svg aria-hidden="true"><use href="#{{ $item['icon'] }}"/></svg></div>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['body'] }}</p>
                        <a href="{{ $item['url'] ?? route('contact') }}">{{ $item['link'] ?? 'Discuss your event' }} <svg aria-hidden="true"><use href="#i-arrow"/></svg></a>
                    </article>
                @endforeach
            </div>
        </section>
        @php($process = $sections[1])
        <section class="services-process">
            <div class="wrap services-process-inner">
                <div class="services-process-copy">
                    <p class="eyebrow">{{ $process['eyebrow'] }}</p>
                    <h2>{{ $process['heading'] }}</h2>
                    <p class="inner-body">{{ $process['body'] }}</p>
                    <a class="button button-primary" href="{{ route('contact') }}">Start a conversation <svg><use href="#i-arrow"/></svg></a>
                </div>
                <div class="services-process-steps" aria-label="Our production process">
                    <div><span>01</span><strong>Plan</strong><small>Brief, venue &amp; audience</small></div>
                    <div><span>02</span><strong>Design</strong><small>Creative &amp; technical plan</small></div>
                    <div><span>03</span><strong>Deliver</strong><small>Setup, show &amp; support</small></div>
                </div>
            </div>
        </section>
    @else
    <div @class(['inner-content', 'wrap', 'about-content' => $name === 'about'])>
        @foreach ($sections as $section)
            <section @class(['inner-section', 'about-story-section' => $name === 'about', 'inner-section--has-image' => !empty($section['image'])]) @if (!empty($section['id'])) id="{{ $section['id'] }}" @endif>
                @if (!empty($section['image']))<div class="inner-section-feature"><div class="inner-section-copy">@endif
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
                @if (!empty($section['image']))</div><figure class="inner-section-image"><img src="{{ asset($section['image']) }}" alt="{{ $section['image_alt'] ?? '' }}" loading="lazy" decoding="async"></figure></div>@endif
            </section>
        @endforeach
    </div>
    @endif
</main>
@endsection

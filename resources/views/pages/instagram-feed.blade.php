@extends('layouts.site')

@push('head')
    <script type="application/ld+json">@json($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
@endpush

@section('content')
<main class="inner-page instagram-page">
    <section class="inner-hero">
        <div class="wrap inner-hero-content">
            <nav class="breadcrumbs" aria-label="Breadcrumb"><a href="{{ route('home') }}">Home</a><span aria-hidden="true">/</span><span>{{ $eyebrow }}</span></nav>
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h1>{{ $heading }}</h1>
            <p class="inner-intro">{{ $intro }}</p>
        </div>
    </section>

    <section class="instagram-feed wrap" aria-labelledby="instagram-feed-title">
        <div class="instagram-feed-heading">
            <div>
                <p class="eyebrow">@stagepassav</p>
                <h2 id="instagram-feed-title">Latest from Instagram</h2>
            </div>
            <a href="https://www.instagram.com/stagepassav/" target="_blank" rel="noopener noreferrer">Follow on Instagram <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M7 17 17 7M8 7h9v9"/></svg></a>
        </div>

        @if (count($instagramPosts) > 0)
            <div class="instagram-feed-grid">
                @foreach ($instagramPosts as $post)
                    @php($isVideo = ($post['media_type'] ?? '') === 'VIDEO' && isset($post['preview_url']))
                    <button
                        class="instagram-feed-card instagram-media-trigger"
                        type="button"
                        data-media-type="{{ $isVideo ? 'VIDEO' : 'IMAGE' }}"
                        data-media-url="{{ $post['media_url'] }}"
                        data-preview-url="{{ $post['preview_url'] ?? $post['media_url'] }}"
                        data-caption="{{ $post['caption'] }}"
                        data-permalink="{{ $post['permalink'] }}"
                        aria-label="View {{ $isVideo ? 'video' : 'image' }}: {{ \Illuminate\Support\Str::limit($post['caption'], 120) }}"
                    >
                        <img src="{{ $post['preview_url'] ?? $post['media_url'] }}" alt="{{ \Illuminate\Support\Str::limit($post['caption'], 180) }}" loading="lazy" decoding="async">
                        @if ($isVideo)
                            <span class="instagram-feed-play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m9 6 10 6-10 6z"/></svg></span>
                        @endif
                        <span class="instagram-feed-overlay" aria-hidden="true">
                            <svg viewBox="0 0 24 24"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.6" cy="6.7" r="1"/></svg>
                            <span>{{ \Illuminate\Support\Str::limit($post['caption'], 150) }}</span>
                        </span>
                    </a>
                @endforeach
            </div>
        @else
            <p class="instagram-feed-empty">The Instagram feed is temporarily unavailable. Visit <a href="https://www.instagram.com/stagepassav/" target="_blank" rel="noopener noreferrer">@stagepassav</a> to see our latest posts.</p>
        @endif
    </section>

    @include('partials.instagram-lightbox')
</main>
@endsection

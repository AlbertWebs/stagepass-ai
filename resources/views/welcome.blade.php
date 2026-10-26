<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050b14">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="description" content="StagePass Audio Visual Limited is Kenya's leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.">
    <meta name="keywords" content="{{ config('site_seo.keywords') }}">
    <meta name="author" content="StagePass Audio Visual Limited">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="geo.region" content="KE-110">
    <meta name="geo.placename" content="Nairobi">
    <meta name="geo.position" content="-1.2210922;36.8443046">
    <meta name="ICBM" content="-1.2210922, 36.8443046">
    <link rel="canonical" href="https://stagepass.co.ke">
    <link rel="alternate" hreflang="en-KE" href="https://stagepass.co.ke">
    <link rel="alternate" hreflang="x-default" href="https://stagepass.co.ke">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="StagePass Audio Visual Limited">
    <meta property="og:locale" content="en_KE">
    <meta property="og:title" content="The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited">
    <meta property="og:description" content="Kenya's trusted Audio Visual &amp; Event Production company — professional sound engineering, staging, LED screens, event technology and conferencing solutions.">
    <meta property="og:url" content="https://stagepass.co.ke">
    <meta property="og:image" content="{{ asset(config('site_seo.og_image')) }}">
    <meta property="og:image:width" content="1672">
    <meta property="og:image:height" content="941">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://stagepass.co.ke">
    <meta name="twitter:title" content="The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited">
    <meta name="twitter:description" content="Events &amp; Audio Visual production company in Kenya — sound systems, staging, lighting, LED screens, conferencing &amp; event technology.">
    <meta name="twitter:image" content="{{ asset(config('site_seo.og_image')) }}">
    <meta name="twitter:site" content="@stagepass">
    <meta name="twitter:creator" content="@stagepass">
    <title>The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited</title>
    @php
        $homeStructuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'StagePass Audio Visual Limited',
            'url' => 'https://stagepass.co.ke',
            'logo' => asset('images/stagepass-logo-source.png'),
            'image' => asset(config('site_seo.og_image')),
            'description' => 'StagePass Audio Visual Limited provides professional audio visual, sound engineering, stage lighting, LED screens and event production services across Kenya.',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jacaranda Close, Ridgeways',
                'addressLocality' => 'Nairobi',
                'addressRegion' => 'Nairobi',
                'addressCountry' => 'KE',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => config('site_seo.latitude'),
                'longitude' => config('site_seo.longitude'),
            ],
            'areaServed' => ['@type' => 'Country', 'name' => 'Kenya'],
            'priceRange' => '$$',
            'telephone' => '+254 729 171 351',
            'email' => 'info@stagepass.co.ke',
            'openingHours' => 'Mo-Fr 09:00-18:00, Sa 10:00-16:00',
            'sameAs' => [
                'https://stagepass.co.ke/',
                'https://ke.linkedin.com/company/stagepass-audio-visual-limited',
                'https://facebook.com/stagepass',
                'https://twitter.com/stagepass',
            ],
        ];
    @endphp
    <script type="application/ld+json">@json($homeStructuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)</script>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>:root { --hero-photo: url("{{ asset('images/stagepass-hero-branded.png') }}"); --about-photo: url("{{ asset('images/about-technician-branded.png') }}"); --event-sprite: url("{{ asset('images/event-contact-sheet.png') }}"); }</style>
</head>
<body>
    <svg class="svg-library" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 5l7 7-7 7"/></symbol>
        <symbol id="i-search" viewBox="0 0 24 24"><circle cx="10.8" cy="10.8" r="7.2"/><path d="m16.2 16.2 4.4 4.4"/></symbol>
        <symbol id="i-play" viewBox="0 0 24 24"><path d="m9 6 10 6-10 6z" fill="currentColor" stroke="none"/></symbol>
        <symbol id="i-audio" viewBox="0 0 24 24"><path d="M4 9v6h4l6 5V4L8 9H4Z"/><path d="M17 9a5 5 0 0 1 0 6M19.5 6.5a9 9 0 0 1 0 11"/></symbol>
        <symbol id="i-screen" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="1"/><path d="M8 21h8M12 17v4"/></symbol>
        <symbol id="i-bulb" viewBox="0 0 24 24"><path d="M9 18h6m-5 3h4m-6-6c-1.7-1.2-3-3.2-3-5.5a7 7 0 1 1 14 0c0 2.3-1.3 4.3-3 5.5-.7.5-1 1.3-1 2h-6c0-.7-.3-1.5-1-2Z"/><path d="M12 1v2M4.8 4l1.4 1.4M19.2 4l-1.4 1.4"/></symbol>
        <symbol id="i-stage" viewBox="0 0 24 24"><path d="M3 5h18v4H3zM5 9v11m14-11v11M3 20h18M8 9l8 11m0-11L8 20M7 5l3 4m7-4-3 4"/></symbol>
        <symbol id="i-gear" viewBox="0 0 24 24"><path d="m12 2 1.3 2.6 2.9-.2 1.2 2.7 2.7 1.2-.2 2.9 2.6 1.3-1.4 2.6.9 2.8-2.4 1.7-.5 2.8-2.9.3L12 23l-2.3-1.9-2.9-.3-.5-2.8-2.4-1.7.9-2.8-1.4-2.6L6 9.6l-.2-2.9L8.5 5.5 9.7 2.8 12 2Z"/><circle cx="12" cy="13" r="3.5"/></symbol>
        <symbol id="i-power" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="15" rx="2"/><path d="M7 9h4v4H7zM15 9h2m-2 4h2M8 20v2m8-2v2"/></symbol>
        <symbol id="i-camera" viewBox="0 0 24 24"><path d="M3 7h11a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H3zM16 11l5-3v8l-5-3M6 7l1-3h4l1 3"/></symbol>
        <symbol id="i-cube" viewBox="0 0 24 24"><path d="m12 2 9 5v10l-9 5-9-5V7l9-5Z"/><path d="m3.5 7 8.5 5 8.5-5M12 12v10M8 4.5l9 5"/></symbol>
        <symbol id="i-case" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V4h8v3M3 12h18m-11 0v2h4v-2"/></symbol>
        <symbol id="i-pen" viewBox="0 0 24 24"><path d="m4 20 4.5-1 11-11a2.8 2.8 0 0 0-4-4l-11 11L4 20Z"/><path d="m13.5 6.5 4 4M4 20l5-1"/></symbol>
        <symbol id="i-team" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M16 5a3 3 0 0 1 0 6m2 3a5 5 0 0 1 3 5v1"/></symbol>
        <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 2 20 5v6c0 5-3.4 8.7-8 11-4.6-2.3-8-6-8-11V5l8-3Z"/><path d="m8.5 12 2.2 2.2 4.8-5"/></symbol>
        <symbol id="i-star" viewBox="0 0 24 24"><path d="m12 2 3 6.3 7 .9-5.1 4.9 1.3 7L12 17.8l-6.2 3.3 1.2-7L2 9.2l7-.9L12 2Z"/></symbol>
        <symbol id="i-diamond" viewBox="0 0 24 24"><path d="M3 8 6.5 3h11L21 8l-9 13L3 8Z"/><path d="M3 8h18M6.5 3 9 8l3 13 3-13 2.5-5"/></symbol>
        <symbol id="i-pin" viewBox="0 0 24 24"><path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="2.5"/></symbol>
        <symbol id="i-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></symbol>
        <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></symbol>
        <symbol id="i-rig" viewBox="0 0 24 24"><path d="M3 5h18M5 5v14m14-14v14M3 19h18M7 5l10 14m0-14L7 19M9 5v3m6-3v3m-6 8v3m6-3v3"/></symbol>
    </svg>

    @php
        $services = [
            ['Audio Reinforcement', 'i-audio'], ['LED Screens & Displays', 'i-screen'], ['Lighting Design', 'i-bulb'],
            ['Staging & Scenography', 'i-stage'], ['Rigging & Structures', 'i-rig'], ['Power & Generators', 'i-power'],
            ['Livestream & Production', 'i-camera'], ['Fabrication & Branding', 'i-cube'], ['Equipment Rentals', 'i-case'],
            ['Event Design & Consultancy', 'i-pen'],
        ];
        $industries = [
            ['Corporate', 'scene-1', ['corporate-ceo-forum.webp', 'corporate-business-summit.webp', 'corporate-forum-stage.webp']],
            ['Government', 'scene-2', []],
            ['Entertainment', 'scene-3', ['entertainment-event.webp', 'entertainment-production.webp', 'entertainment-concert.webp', 'entertainment-performance.webp']],
            ['Exhibitions', 'scene-4', ['exhibitions.webp']],
            ['Hospitality', 'scene-5', []],
            ['Broadcast', 'scene-6', ['broadcast.webp']],
            ['Sports', 'scene-3', ['sports-congress.webp', 'sports-event.webp']],
        ];
        $projects = [
            ['Dangote Groundbreaking Ceremony', 'Kenya', 'scene-4'], ['Safaricom @ 25', 'Kenya', 'scene-3'],
            ['Africa CEO Forum', 'Rwanda', 'scene-1'], ['Trace Africa – Le Concert', 'Kenya', 'scene-6'],
        ];
        $clientLogos = [
            ['Huawei', 'client-01.png'], ['Microsoft', 'client-02.png'], ['Visa', 'client-03.png'],
            ['Google', 'client-04.png'], ['Safaricom', 'client-05.png'], ['Mo Ibrahim Foundation', 'client-06.png'],
            ['American Chamber of Commerce Kenya', 'client-07.png'], ['KCB Bank', 'client-08.png'],
            ['Africa CEO Forum', 'client-09.png'], ['QVIA', 'client-10.png'], ['AVIC International', 'client-11.png'],
            ['Stanbic Bank', 'client-12.png'], ['Novo Nordisk', 'client-13.png'], ['JW Marriott Nairobi', 'client-14.png'],
            ['Abbott', 'client-15.png'], ['AHK Eastern Africa', 'client-16.png'], ['M-Pesa', 'client-17.png'],
            ['JETRO', 'client-18.png'], ['EABL', 'client-19.png'], ['EnergyNet Africa', 'client-20.png'],
            ['The Bench', 'client-21.png'], ['SportPesa', 'client-22.png'], ['Google Developers', 'client-23.png'],
        ];
    @endphp

    <header class="site-header">
        <a class="brand" href="#home" aria-label="Stagepass Audio Visual home"><span class="brand-logo"><img src="/images/stagepass-logo-source.png" alt="Stagepass Audio Visual"></span></a>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false"><span></span><span></span></button>
        <nav class="main-nav" aria-label="Main navigation">
            <a class="is-active" href="#home">Home</a><a href="#about">About</a><a href="#services">Services</a><a href="#industries">Industries</a><a href="#work">Our Work</a><a href="#contact">Contact</a>
        </nav>
        <div class="header-actions"><a class="search-button" href="#work" aria-label="Explore our work"><svg><use href="#i-search"/></svg></a><button class="button button-outline" type="button" data-quote-open>Get a Quotation <svg><use href="#i-arrow"/></svg></button></div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-photo" role="img" aria-label="Stage technician running the show from a live event control desk"></div>
            <img class="hero-top-ribbon" src="/images/stagepass-hero-top-ribbon.svg" alt="" aria-hidden="true">
            <div class="hero-grid"></div>
            <div class="hero-content wrap">
                <div class="hero-copy">
                    <p class="eyebrow">People <i></i> Technology <i></i> Impact</p>
                    <h1>We engineer<br><em>extraordinary</em><br>experiences<span class="blue-dot">.</span></h1>
                    <p class="hero-description">Stagepass Audio Visual delivers world-class event technology and creative production across Africa, transforming ideas into unforgettable experiences.</p>
                    <div class="hero-actions"><a class="button button-primary" href="#work">Explore Our Work <svg><use href="#i-arrow"/></svg></a><a class="showreel" href="https://www.youtube.com/@STAGEPASSAV-KE" target="_blank" rel="noopener noreferrer"><span><svg><use href="#i-play"/></svg></span>Watch Showreel</a></div>
                </div>
                <div class="orbit-wrap" role="img" aria-label="Stagepass audio, visual, lighting, scenic, design, production and rigging"><img class="orbit-center" src="/images/stagepass-disciplines-transparent.png" alt=""><img class="orbit-vectors" src="/images/stagepass-disciplines-vector.svg" alt=""></div>
            </div>
            <img class="hero-ribbon" src="/images/stagepass-hero-ribbon.svg" alt="" aria-hidden="true">
            <div class="hero-foot wrap"><div class="proof-points"><div><svg><use href="#i-bulb"/></svg><span>Innovative<br>Solutions</span></div><div><svg><use href="#i-team"/></svg><span>Expert<br>Team</span></div><div><svg><use href="#i-diamond"/></svg><span>Premium<br>Quality</span></div><div><svg><use href="#i-shield"/></svg><span>Safety<br>Focused</span></div><div><svg><use href="#i-team"/></svg><span>Client<br>Driven</span></div></div><p class="speed-tag">The future<br>with speed<br>together<span></span></p></div>
        </section>

        <section class="about-section section-rule" id="about">
            <div class="about-copy section-copy"><p class="eyebrow">About Stagepass</p><h2>More than<br>technology.<br><em>A team that delivers.</em></h2><p>We are a team of creative thinkers, technical experts and event professionals committed to delivering exceptional experiences across Africa.</p><a class="button button-outline button-small" href="#contact">Learn More <svg><use href="#i-arrow"/></svg></a></div>
            <div class="about-photo" role="img" aria-label="Stage technician wearing the Stagepass logo on his shirt, seen from behind at a digital audio console in a live event venue"></div>
            <div class="about-highlights"><div><svg><use href="#i-diamond"/></svg><span><b>Years of</b><small>Experience</small></span></div><div><svg><use href="#i-team"/></svg><span><b>A passionate</b><small>Team</small></span></div><div><img class="africa-icon" src="/images/africa-map-icon.svg" alt=""><span><b>Projects across</b><small>Africa</small></span></div><div><svg><use href="#i-star"/></svg><span><b>Trusted by</b><small>Leading brands</small></span></div></div>
            <div class="africa-card"><div class="africa-map"><img src="/images/africa-map.svg" alt=""><svg class="africa-routes" viewBox="0 0 280 300" role="img" aria-label="Routes from Nairobi reaching destinations across Africa" xmlns="http://www.w3.org/2000/svg"><defs><marker id="africa-route-arrow" viewBox="0 0 8 8" refX="7" refY="4" markerWidth="5" markerHeight="5" orient="auto"><path d="M0 0 8 4 0 8z"/></marker></defs><g class="africa-route-lines"><path d="M220 158 Q207 119 194 91"/><path d="M220 158 Q186 136 154 130"/><path d="M220 158 Q180 160 139 168"/><path d="M220 158 Q196 192 166 218"/><path d="M220 158 Q225 193 222 226"/><path d="M220 158 Q240 141 249 121"/></g><circle class="africa-nairobi-halo" cx="220" cy="158" r="8"/><circle class="africa-nairobi-dot" cx="220" cy="158" r="3.5"/></svg></div><p>Africa’s<br>event technology<br>partner</p></div>
        </section>

        <section class="services-section section-rule" id="services">
            <div class="section-copy services-copy"><p class="eyebrow">Our Services</p><h2>One partner.<br><em>Every solution.</em></h2><p>From concept to execution, we provide end-to-end event technology and production services tailored to your needs.</p><a class="button button-outline button-small" href="#contact">View All Services <svg><use href="#i-arrow"/></svg></a></div>
            <div class="services-grid">
                @foreach ($services as [$service, $icon])
                    <a href="#contact" class="service-card"><svg><use href="#{{ $icon }}"/></svg><span>{{ $service }}</span></a>
                @endforeach
            </div>
        </section>

        <section class="industries-section section-rule" id="industries">
            <div class="industry-heading"><div class="section-copy"><p class="eyebrow">Industries We Serve</p><h2>Every industry.<br>Exceptional experiences.</h2></div><a class="button button-outline button-small" href="#contact">View All Industries <svg><use href="#i-arrow"/></svg></a><p class="industry-note">Different sectors.<br>One standard.<br>Excellence.</p></div>
            <div class="industry-grid">
                @foreach ($industries as [$industry, $scene, $industryImages])
                    <div class="industry-card {{ $scene }} {{ count($industryImages) > 0 ? 'industry-card-gallery' : '' }}" @if (count($industryImages) > 1) data-industry-carousel role="group" aria-label="{{ $industry }} image carousel" @endif>
                        @if (count($industryImages) > 0)
                            <div class="industry-gallery">
                                @foreach ($industryImages as $image)
                                    <img class="industry-slide {{ $loop->first ? 'is-active' : '' }}" src="{{ asset('images/industries/'.$image) }}" alt="{{ $industry }} event production, image {{ $loop->iteration }} of {{ count($industryImages) }}" loading="lazy" decoding="async">
                                @endforeach
                            </div>
                        @endif
                        <span class="industry-card-shade" aria-hidden="true"></span>
                        <div class="industry-card-footer">
                            <a class="industry-card-label" href="#contact">{{ $industry }}</a>
                        </div>
                        @if (count($industryImages) > 1)
                            <div class="industry-carousel-pagination" role="group" aria-label="{{ $industry }} image selection">
                                <div class="industry-carousel-dots">
                                    @foreach ($industryImages as $image)
                                        <button type="button" data-industry-slide="{{ $loop->index }}" aria-label="Show {{ $industry }} image {{ $loop->iteration }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"></button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <section class="work-section section-rule" id="work">
            <div class="work-intro section-copy"><p class="eyebrow">Our Work</p><h2>Ideas brought<br>to <em>life.</em></h2><p>A showcase of the events, experiences and productions we have delivered across Africa.</p><a class="button button-outline button-small" href="#contact">View Our Work <svg><use href="#i-arrow"/></svg></a></div>
            <div class="project-track {{ count($instagramPosts) > 0 ? 'has-instagram-feed' : 'is-static' }}" aria-label="{{ count($instagramPosts) > 0 ? 'Recent Instagram projects' : 'Selected projects' }}" data-project-count="{{ count($instagramPosts) }}">
                @if (count($instagramPosts) > 0)
                    <div class="project-marquee">
                        @foreach ([false, true] as $isDuplicate)
                            <div class="project-feed-group" @if ($isDuplicate) aria-hidden="true" @endif>
                                @foreach ($instagramPosts as $post)
                                    @php($isVideo = ($post['media_type'] ?? '') === 'VIDEO' && isset($post['preview_url']))
                                    <button class="project-card project-card-instagram instagram-media-trigger" type="button" data-media-type="{{ $isVideo ? 'VIDEO' : 'IMAGE' }}" data-media-url="{{ $post['media_url'] }}" data-preview-url="{{ $post['preview_url'] ?? $post['media_url'] }}" data-caption="{{ $post['caption'] }}" data-permalink="{{ $post['permalink'] }}" aria-label="View Instagram {{ $isVideo ? 'video' : 'photo' }}: {{ \Illuminate\Support\Str::limit($post['caption'], 100) }}" @if ($isDuplicate) tabindex="-1" @endif>
                                        <span class="project-image"><img class="project-feed-image" src="{{ $post['preview_url'] ?? $post['media_url'] }}" alt="{{ \Illuminate\Support\Str::limit($post['caption'], 140) }}" loading="lazy" decoding="async">@if ($isVideo)<span class="project-feed-play" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m9 6 10 6-10 6z"/></svg></span>@endif</span>
                                        <strong>{{ \Illuminate\Support\Str::limit($post['caption'] ?: 'Stagepass event production', 58) }}</strong>
                                        <small>{{ $isVideo ? 'Video' : 'Instagram' }} · @stagepassav</small>
                                    </button>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @else
                    @foreach ($projects as [$project, $location, $scene])
                        <a class="project-card {{ $scene }}" href="#contact"><span class="project-image"></span><strong>{{ $project }}</strong><small>{{ $location }}</small></a>
                    @endforeach
                @endif
                <div class="slider-controls"><button type="button" class="slide-prev" aria-label="Previous projects">←</button><button type="button" class="slide-next" aria-label="Next projects">→</button></div>
            </div>
        </section>

        <section class="brand-strip" aria-label="Trusted clients">
            <p>Trusted by<br>visionary brands<span></span></p>
            <div class="client-logo-track" role="region" aria-label="Our clients">
                <div class="client-logo-marquee">
                    <div class="client-logo-group" role="list">
                        @foreach ($clientLogos as [$clientName, $logoFile])
                            <div class="client-logo-item" role="listitem"><img class="client-logo" src="{{ asset('images/clients/' . $logoFile) }}" alt="{{ $clientName }}" loading="lazy" decoding="async"></div>
                        @endforeach
                    </div>
                    <div class="client-logo-group" aria-hidden="true">
                        @foreach ($clientLogos as [$clientName, $logoFile])
                            <div class="client-logo-item"><img class="client-logo" src="{{ asset('images/clients/' . $logoFile) }}" alt="" loading="lazy" decoding="async"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="more-brands">And many more<br>across Africa<span></span></p>
        </section>

        <section class="contact-section section-rule" id="contact">
            <div class="contact-copy"><h2>Let’s create<br>what’s next.</h2><p>Tell us about your event and our team will get back to you.</p><button class="button button-gold" type="button" data-quote-open>Get a Quotation <svg><use href="#i-arrow"/></svg></button></div>
            <div class="contact-details"><a href="mailto:info@stagepass.co.ke"><svg><use href="#i-mail"/></svg><span><b>info@stagepass.co.ke</b><small>Let’s bring your vision to life.</small></span></a><a href="https://www.stagepass.co.ke"><svg><use href="#i-globe"/></svg><span><b>www.stagepass.co.ke</b><small>Explore. Experience. Excellence.</small></span></a><a href="https://maps.google.com/?q=Jacaranda+Close+Nairobi+Kenya"><svg><use href="#i-pin"/></svg><span><b>Jacaranda Close, Off Ridgeways Road</b><small>Nairobi, Kenya</small></span></a></div>
            <p class="contact-watermark">The future<br>with speed<br>together<span></span></p>
        </section>
    </main>

    <dialog class="quote-dialog" id="quote-dialog" aria-labelledby="quote-dialog-title" @if ($errors->any() || session('quote_submitted') || session('quote_delivery_unavailable')) data-open-on-load @endif>
        <div class="quote-dialog-panel">
            <button class="quote-dialog-close" type="button" data-quote-close aria-label="Close quotation form"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg></button>
            <p class="eyebrow">Start a conversation</p>
            <h2 id="quote-dialog-title">Get your AV quotation</h2>
            <p class="quote-dialog-intro">Tell us a little about your event and our team will be in touch.</p>

            @if (session('quote_submitted'))
                <div class="quote-alert quote-alert-success" role="status">Thanks for reaching out. Your quotation request has been sent to our team.</div>
                <a class="quote-contact-link" href="mailto:info@stagepass.co.ke">Need a faster response? Email info@stagepass.co.ke</a>
            @else
                @if (session('quote_delivery_unavailable'))
                    <div class="quote-alert quote-alert-error" role="alert">Online quote delivery is not configured yet. Please email <a href="mailto:info@stagepass.co.ke">info@stagepass.co.ke</a>; your form details are still filled in below.</div>
                @endif

                @if ($errors->any())
                    <div class="quote-alert quote-alert-error" role="alert">Please check the highlighted details and try again.</div>
                @endif

                <form class="quote-form" method="POST" action="{{ route('quote-requests.store') }}">
                    @csrf
                    <div class="quote-alert" data-quote-feedback role="status" hidden></div>
                    <a class="quote-contact-link" data-quote-email-fallback href="mailto:info@stagepass.co.ke" hidden>Email info@stagepass.co.ke</a>
                    <div class="quote-form-grid">
                        <label class="quote-form-field" for="quote-name"><span class="quote-form-label">Name <span>*</span></span>
                            <input id="quote-name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" maxlength="100" required @error('name') aria-invalid="true" @enderror>
                            @error('name')<small class="quote-field-error">{{ $message }}</small>@enderror
                        </label>
                        <label class="quote-form-field" for="quote-email"><span class="quote-form-label">Email <span>*</span></span>
                            <input id="quote-email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="254" required @error('email') aria-invalid="true" @enderror>
                            @error('email')<small class="quote-field-error">{{ $message }}</small>@enderror
                        </label>
                        <label class="quote-form-field" for="quote-phone"><span class="quote-form-label">Phone number <span>*</span></span>
                            <input id="quote-phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="32" required @error('phone') aria-invalid="true" @enderror>
                            @error('phone')<small class="quote-field-error">{{ $message }}</small>@enderror
                        </label>
                        <label class="quote-form-field" for="quote-organization"><span class="quote-form-label">Company or organisation</span>
                            <input id="quote-organization" name="organization" type="text" value="{{ old('organization') }}" autocomplete="organization" maxlength="150">
                        </label>
                        <label class="quote-form-field quote-form-field-wide" for="quote-message"><span class="quote-form-label">Event details <span>*</span></span>
                            <textarea id="quote-message" name="message" rows="4" maxlength="3000" required @error('message') aria-invalid="true" @enderror>{{ old('message') }}</textarea>
                            @error('message')<small class="quote-field-error">{{ $message }}</small>@enderror
                        </label>
                        <label class="quote-form-field quote-form-field-wide" for="quote-challenge"><span class="quote-form-label">Spam check: what is {{ $quoteChallenge }}? <span>*</span></span>
                            <input id="quote-challenge" name="challenge" type="number" inputmode="numeric" required @error('challenge') aria-invalid="true" @enderror>
                            @error('challenge')<small class="quote-field-error">{{ $message }}</small>@enderror
                        </label>
                    </div>
                    <div class="quote-form-honeypot" aria-hidden="true"><label for="quote-company-website">Leave this field empty</label><input id="quote-company-website" name="company_website" type="text" value="" tabindex="-1" autocomplete="off"></div>
                    <button class="button button-gold quote-submit" type="submit">Send quotation request <svg><use href="#i-arrow"/></svg></button>
                    <p class="quote-privacy-note">Your details are only used to respond to this quotation request.</p>
                </form>
            @endif
        </div>
    </dialog>

    <footer class="site-footer"><div class="footer-main"><a class="brand" href="#home" aria-label="Stagepass Audio Visual home"><span class="brand-logo"><img src="/images/stagepass-logo-source.png" alt="Stagepass Audio Visual"></span></a><p class="footer-disciplines">Audio <i>•</i> Visual <i>•</i> Scenic <i>•</i> Lighting <i>•</i> Rigging <i>•</i> Design <i>•</i> Production</p><div class="social-links"><a href="#contact" aria-label="LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8.5h3V19H5zM6.5 4a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5ZM10 8.5h2.9v1.4c.6-1 1.6-1.7 3.2-1.7 2.8 0 3.9 1.7 3.9 4.7V19h-3v-5.4c0-1.5-.2-2.8-1.8-2.8s-2.2 1.1-2.2 2.8V19h-3z"/></svg></a><a href="#contact" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle class="social-icon-dot" cx="17.6" cy="6.7" r="1"/></svg></a><a href="#contact" aria-label="YouTube"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23 7.1a3 3 0 0 0-2.1-2.2C19 4.4 12 4.4 12 4.4s-7 0-8.9.5A3 3 0 0 0 1 7.1 31 31 0 0 0 .5 12a31 31 0 0 0 .5 4.9 3 3 0 0 0 2.1 2.2c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 0 0 2.1-2.2 31 31 0 0 0 .5-4.9 31 31 0 0 0-.5-4.9Z"/><path class="social-icon-play" d="m10 8.5 6 3.5-6 3.5z"/></svg></a><a href="#contact" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8.2h2.8l.4-3.2h-3.2V7.5c0-.9.3-1.6 1.6-1.6h1.7V3.1c-.3 0-1.4-.1-2.8-.1-2.8 0-4.8 1.7-4.8 4.9v1.7H6.5v3.2h2.7V21z"/></svg></a></div></div><div class="footer-bottom"><p>© 2026 Stagepass Audio Visual. All Rights Reserved.</p><p><a href="#contact">Privacy Policy</a><i>|</i><a href="#contact">Terms of Use</a></p><p>Designed for<br>a greater tomorrow<span></span></p></div></footer>
    @include('partials.instagram-lightbox')
</body>
</html>

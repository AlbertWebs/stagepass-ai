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
    <style>:root { --hero-photo: url("{{ asset('images/stagepass-hero-branded.png') }}"); --event-sprite: url("{{ asset('images/event-contact-sheet.png') }}"); }</style>
</head>
<body class="home-page">
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
        <symbol id="i-phone" viewBox="0 0 24 24"><path d="M7.1 3.5h3l1.4 4.1-2 1.6a15.5 15.5 0 0 0 5.3 5.3l1.6-2 4.1 1.4v3a2 2 0 0 1-2.2 2A16.8 16.8 0 0 1 5 5.7a2 2 0 0 1 2.1-2.2Z"/></symbol>
        <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"/></symbol>
        <symbol id="i-rig" viewBox="0 0 24 24"><path d="M3 5h18M5 5v14m14-14v14M3 19h18M7 5l10 14m0-14L7 19M9 5v3m6-3v3m-6 8v3m6-3v3"/></symbol>
        <symbol id="i-booth" viewBox="0 0 24 24"><path d="M3 20h18M5 20V9h14v11M3 6h18v3H3zM8 12v4m8-4v4"/></symbol>
        <symbol id="i-cap" viewBox="0 0 24 24"><path d="m2 9 10-5 10 5-10 5L2 9Z"/><path d="M6 11v5c3.5 2.7 8.5 2.7 12 0v-5m4-2v6"/></symbol>
        <symbol id="i-bell" viewBox="0 0 24 24"><path d="M3 18h18M5 18a7 7 0 0 1 14 0M10 5h4m-2-2v2m-7 16h14"/></symbol>
        <symbol id="i-pulse" viewBox="0 0 24 24"><path d="M3 12h4l2-6 4 12 3-8 2 2h3"/><path d="M12 22a10 10 0 1 1 10-10"/></symbol>
        <symbol id="i-building" viewBox="0 0 24 24"><path d="M4 21V5h16v16M2 21h20M8 9h1m6 0h1M8 13h1m6 0h1M8 17h1m6 0h1M11 21v-4h2v4"/></symbol>
        <symbol id="i-trophy" viewBox="0 0 24 24"><path d="M8 4h8v5a4 4 0 0 1-8 0V4ZM8 6H4v2a4 4 0 0 0 4 4m8-6h4v2a4 4 0 0 1-4 4m-4 1v4m-4 3h8m-7-3h6v3H9z"/></symbol>
    </svg>

    @php
        $services = [
            ['name' => 'Audio Reinforcement', 'icon' => 'i-audio', 'summary' => 'Shape a sound system around the room, the audience and the programme—not just the equipment list. We plan for clear speech at the back of the room and a balanced experience for music, panels and live moments.', 'delivery' => 'From setup and checks to show-time mixing, our team keeps microphones, playback and cues moving as one sound picture.'],
            ['name' => 'LED Screens & Displays', 'icon' => 'i-screen', 'summary' => 'Make the message visible from every seat. We plan LED display placement around the stage, audience sightlines, format and content so presenters and visuals work together.', 'delivery' => 'Screens and playback become part of the wider show flow, from opening graphics to speaker decks and live cues.'],
            ['name' => 'Lighting Design', 'icon' => 'i-bulb', 'summary' => 'Use light to shape the room before anyone takes the stage. We plan looks around the venue, programme and camera needs, giving speakers visibility and key moments their own atmosphere.', 'delivery' => 'As the event moves from welcome to keynote to celebration, lighting cues help each transition feel intentional.'],
            ['name' => 'Staging & Scenography', 'icon' => 'i-stage', 'summary' => 'Build the place where the story happens. Stage, scenic elements and room layout are shaped around the venue, audience flow, brand and programme.', 'delivery' => 'The result is a clear focal point that gives presenters space, supports the production plan and connects with the rest of the room.'],
            ['name' => 'Rigging & Structures', 'icon' => 'i-rig', 'summary' => 'Put the visual ambition into the structure. We coordinate rigging and truss requirements around the venue, equipment positions and installation sequence.', 'delivery' => 'That planning helps lighting, screens and scenic elements work together while supporting careful, safe execution.'],
            ['name' => 'Power & Generators', 'icon' => 'i-power', 'summary' => 'Give production a power plan before the first cue. We coordinate temporary power and generator support around the equipment and event schedule.', 'delivery' => 'Power becomes part of the production picture, with setup and live operations coordinated alongside the rest of the technical crew.'],
            ['name' => 'Livestream & Production', 'icon' => 'i-camera', 'summary' => 'Let an audience join from beyond the room. We bring audio-visual production and show coordination to events that need to connect in person and online.', 'delivery' => 'From room sound and visuals to live cues and remote contributors, we plan the handoffs that help audiences follow along.'],
            ['name' => 'Fabrication & Branding', 'icon' => 'i-cube', 'summary' => 'Turn a venue into a world that carries the brand. We bring together fabrication, signage and scenic details to shape arrivals, stages and guest touchpoints.', 'delivery' => 'Each element is planned in context with the space and event design, so the experience feels considered from first impression to final reveal.'],
            ['name' => 'Equipment Rentals', 'icon' => 'i-case', 'summary' => 'Get equipment that fits the brief, venue and run of show. Stagepass provides audio-visual, lighting and staging rentals supported by technical advice and production planning.', 'delivery' => 'We help identify the right combination and coordinate it with setup and on-site needs, so each component has a place in the production.'],
            ['name' => 'Event Design & Consultancy', 'icon' => 'i-pen', 'summary' => 'Start with the feeling you want guests to leave with. We help translate the event brief into a plan for the audience journey, programme, venue and technical experience.', 'delivery' => 'Creative design and technical consulting meet early, giving the production a direction that can be planned, built and delivered.'],
        ];
        $industries = [
            [
                'name' => 'Corporate & Business Events',
                'icon' => 'i-team',
                'scene' => 'scene-1',
                'images' => ['africa-ceo-forum-corporate.webp'],
                'description' => 'Conferences, summits, product launches and brand experiences.',
                'overview' => 'A production blueprint for conferences, launches and business gatherings, shaped around clear communication and confident presentation.',
                'formats' => ['Conferences & summits', 'Product launches', 'AGMs & shareholder meetings', 'Award ceremonies', 'Team-building events'],
                'needs' => 'Sound systems, LED screens, stage lighting, live streaming and interpretation systems.',
            ],
            [
                'name' => 'Entertainment & Live Shows',
                'icon' => 'i-audio',
                'scene' => 'scene-3',
                'images' => ['entertainment-event.webp'],
                'description' => 'Concerts, festivals, tours and large-scale live productions.',
                'overview' => 'A high-energy setup for live performance, balancing powerful sound, dynamic lighting and a stage that carries the show.',
                'formats' => ['Concerts & music festivals', 'Comedy shows', 'Theatre productions', 'Cultural performances'],
                'needs' => 'Line-array sound systems, moving lights, LED backdrops, special effects and stage design.',
            ],
            [
                'name' => 'Exhibitions & Trade Shows',
                'icon' => 'i-booth',
                'scene' => 'scene-4',
                'images' => ['o2-bar-exhibition-booth.webp'],
                'description' => 'Custom booths, AV, branding and immersive experiences.',
                'overview' => 'Make each stand and demonstration easier to discover with visual systems built for active exhibition floors.',
                'formats' => ['Exhibition stands', 'Product demo booths', 'Brand activations', 'Expo pavilions'],
                'needs' => 'Touch screens, video walls, digital signage, interactive displays and booth lighting.',
            ],
            [
                'name' => 'Education & Training',
                'icon' => 'i-cap',
                'scene' => 'scene-1',
                'images' => ['education-citizens-of-the-future.webp'],
                'description' => 'Learning environments, graduations and capacity-building events.',
                'overview' => 'Connect teaching spaces and audiences with presentation, recording and hybrid-learning systems.',
                'formats' => ['University lecture halls', 'Training centers', 'E-learning environments', 'Graduation ceremonies'],
                'needs' => 'Projectors, smart boards, recording systems, lecture capture and hybrid learning setups.',
            ],
            [
                'name' => 'Religious Institutions',
                'icon' => 'i-diamond',
                'scene' => 'scene-5',
                'images' => ['broadcast.webp'],
                'description' => 'Worship events, crusades and faith-based gatherings.',
                'overview' => 'Support weekly services and larger gatherings with intelligible sound, clear screens and broadcast-ready production.',
                'formats' => ['Weekly worship services', 'Conferences & crusades', 'Religious festivals'],
                'needs' => 'Installed sound systems, IMAG screens, stage lighting and live broadcast systems.',
            ],
            [
                'name' => 'Hospitality & Tourism',
                'icon' => 'i-bell',
                'scene' => 'scene-5',
                'images' => ['hospitality-stagepass-event.webp'],
                'description' => 'Gala dinners, awards, destination events and high-end hospitality.',
                'overview' => 'Adapt the production to the character of each venue, from refined ballrooms to open-air destinations.',
                'formats' => ['Hotel conferences', 'Destination weddings', 'Gala dinners', 'Resort entertainment'],
                'needs' => 'Ballroom AV, ambient lighting, outdoor sound systems and projection mapping.',
            ],
            [
                'name' => 'Healthcare & Medical',
                'icon' => 'i-pulse',
                'scene' => 'scene-2',
                'images' => ['medico-marketing-healthcare.webp'],
                'description' => 'Conferences, medical forums and health awareness events.',
                'overview' => 'Help specialist audiences follow presentations and training through dependable display, recording and broadcast systems.',
                'formats' => ['Medical conferences', 'Hospital auditoriums', 'Surgical training broadcasts'],
                'needs' => 'Presentation systems, live surgery streaming, recording systems and interpretation systems.',
            ],
            [
                'name' => 'Government & Public Sector',
                'icon' => 'i-building',
                'scene' => 'scene-2',
                'images' => ['government-dangote-ceremony.webp'],
                'description' => 'National events, forums, summits and public engagements.',
                'overview' => 'Plan high-visibility public events with production requirements coordinated from the room to the broadcast audience.',
                'formats' => ['National celebrations', 'Policy summits', 'State functions', 'Public forums'],
                'needs' => 'Large-scale sound systems, LED screens, live broadcasting and security-compliant AV solutions.',
            ],
            [
                'name' => 'Sports & Recreation',
                'icon' => 'i-trophy',
                'scene' => 'scene-3',
                'images' => ['sports-recreation.webp'],
                'description' => 'Stadium ceremonies, fan experiences and live sports production.',
                'overview' => 'Bring stadiums and sporting venues to life for ceremonies, fan activations and major sporting events, with production shaped around the match-day experience.',
                'formats' => ['Opening & closing ceremonies', 'Fan zones & activations', 'Award ceremonies', 'Stadium concerts'],
                'needs' => 'Stadium sound systems, large-scale LED screens, broadcast-ready production, stage lighting and live show coordination.',
            ],
        ];
        $projects = [
            ['Safaricom Dealer Conference', 'Nairobi, Kenya', 'scene-3'], ['Corporate Gala Awards', 'Nairobi, Kenya', 'scene-5'],
            ['Government Summit', 'Kigali, Rwanda', 'scene-2'], ['Brand Activation', 'Nairobi, Kenya', 'scene-4'],
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
        <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="main-navigation" aria-expanded="false"><span></span><span></span></button>
        <nav class="main-nav" id="main-navigation" aria-label="Main navigation">
            <div class="navigation-links">
                <p class="menu-eyebrow">Stagepass <span>/</span> Explore</p>
                <a class="is-active" href="#home">Home</a><a href="#about">About</a><a href="#services">Services</a><a href="#industries">Industries</a><a href="#work">Our Work</a><a href="#contact">Contact</a>
            </div>
            <aside class="menu-contact-panel" aria-label="Contact Stagepass">
                <div class="menu-contact-topline"><span class="menu-live-dot"></span><span>Nairobi <i>/</i> Across Africa</span><b>SP&nbsp; / &nbsp;01</b></div>
                <p class="menu-contact-kicker">Make room for extraordinary</p>
                <h2>Let’s make your<br>next event <em>unforgettable.</em></h2>
                <a class="menu-contact-detail" href="tel:+254729171351"><span class="menu-contact-icon"><svg><use href="#i-phone"/></svg></span><span><small>Call our production team</small><b>+254 729 171 351</b></span><svg class="menu-detail-arrow"><use href="#i-arrow"/></svg></a>
                <div class="menu-contact-detail menu-location-detail"><span class="menu-contact-icon"><svg><use href="#i-pin"/></svg></span><span><small>Based in Nairobi</small><b>Jacaranda Close, Off Ridgeways Road</b><b>Nairobi, Kenya</b></span></div>
                <button class="menu-quote-button" type="button" data-quote-open><span>Request a Quote</span><span class="menu-quote-arrow"><svg><use href="#i-arrow"/></svg></span></button>
                <p class="menu-contact-footnote">People <i>•</i> Technology <i>•</i> Impact</p>
            </aside>
        </nav>
        <div class="header-actions"><button class="button button-outline" type="button" data-quote-open>@if ($isAlternateHome) Get AV Quote @else Get a Quotation @endif <svg><use href="#i-arrow"/></svg></button></div>
    </header>

    <main>
        <section class="hero" id="home">
            <div class="hero-photo" role="img" aria-label="Stagepass event production across conferences, live shows and branded experiences">
                <span class="hero-image-slide is-active" style="--hero-image: url('{{ asset('images/fifa-congress-hero.jpg?v=20261030-hq') }}')" aria-hidden="true"></span>
            </div>
            <img class="hero-top-ribbon" src="/images/stagepass-hero-top-ribbon.svg" alt="" aria-hidden="true">
            <div class="hero-grid"></div>
            <div class="hero-content wrap">
                <div class="hero-copy">
                    <p class="eyebrow">People <i></i> Technology <i></i> Impact</p>
                    <h1 class="hero-headline">We Create the Most<br>Engaging Events<br>in the World Using<br><em>Technology &amp;<br>Scenography</em></h1>
                    <p class="hero-description">World-class audiovisual technology, creative production and immersive experiences for events across Africa.</p>
                    <div class="hero-actions"><a class="button button-primary" href="#work">Explore Our Work <svg><use href="#i-arrow"/></svg></a></div>
                </div>
                <div class="orbit-wrap" role="img" aria-label="Stagepass audio, visual, lighting, scenic, design, production and rigging"><img class="orbit-center" src="/images/stagepass-disciplines-transparent.png" alt=""><img class="orbit-vectors" src="/images/stagepass-disciplines-vector.svg" alt=""></div>
            </div>
            <img class="hero-ribbon" src="/images/stagepass-hero-ribbon.svg" alt="" aria-hidden="true">
            <div class="hero-foot wrap">
                <div class="proof-points hero-proof-points" aria-label="Why Stagepass">
                    <div><svg><use href="#i-bulb"/></svg><span>Innovative<br>Solutions</span></div>
                    <div><svg><use href="#i-globe"/></svg><span>Pan Africa<br>Reach</span></div>
                    <div><svg><use href="#i-team"/></svg><span>Expert<br>Team</span></div>
                    <div><svg><use href="#i-shield"/></svg><span>Reliable<br>Support</span></div>
                </div>
                <a class="hero-scroll-cue" href="#about"><span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M19 14l-7 7m0 0-7-7m7 7V3"/></svg></span><b>Scroll to discover</b><i></i></a>
            </div>
        </section>

        <section class="about-section section-rule" id="about">
            <div class="about-copy section-copy"><p class="eyebrow">About Stagepass</p><h2>More than<br>technology.<br><em>A team that delivers.</em></h2><p class="about-description"><strong>StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional event planning and design based in Nairobi and operating within Africa.</strong></p><p class="about-description"><strong>We specialize in rentals of audio-visual technology including sound, screens, lighting, content management, digital and Interactive technology and scenic design.</strong></p><div class="about-proof-actions"><div class="about-proof" data-count-up data-count-to="2362"><span class="about-proof-number"><span data-count-value>2,362</span><sup>+</sup></span><span class="about-proof-label">Successful<br>Events</span></div><a class="button button-outline button-small" href="#services">Explore Our Services <svg><use href="#i-arrow"/></svg></a></div></div>
            <div class="about-photo{{ $isAlternateHome ? ' about-photo-framed' : '' }}" role="group" aria-label="Stagepass event production"><div class="about-photo-frame"><span class="about-photo-accent brand-gradient-x" aria-hidden="true"></span><img class="about-photo-image" src="{{ asset('images/home-about-stagepass.webp') }}" width="1920" height="1080" alt="Stagepass branded LED screen and event stage setup" loading="lazy" decoding="async"></div></div>
            <div class="about-reach">
                <h3 class="about-reach-title" data-about-typewriter aria-label="Africa’s event technology partner"><span data-typewriter-line="Africa’s event" aria-hidden="true">Africa’s event</span><br aria-hidden="true"><span data-typewriter-line="technology partner" aria-hidden="true">technology partner</span></h3>
            </div>
        </section>

        <section class="services-section section-rule" id="services">
            <div class="section-copy services-copy"><p class="eyebrow">Our Services</p><h2>One partner.<br><em>Every solution.</em></h2><p>From concept to execution, we provide end-to-end event technology and production services tailored to your needs.</p><a class="button button-outline button-small" href="#industries">See All Industries <svg><use href="#i-arrow"/></svg></a></div>
            <div class="services-grid">
                @foreach ($services as $service)
                    <button class="service-card" type="button" data-service-open aria-haspopup="dialog" aria-controls="service-detail-dialog" data-service-title="{{ $service['name'] }}" data-service-summary="{{ $service['summary'] }}" data-service-delivery="{{ $service['delivery'] }}"><svg><use href="#{{ $service['icon'] }}"/></svg><span>{{ $service['name'] }}</span><small class="service-card-cue">Explore details <b aria-hidden="true">↗</b></small></button>
                @endforeach
            </div>
        </section>

        <dialog class="service-detail-dialog" id="service-detail-dialog" aria-labelledby="service-detail-title">
            <div class="service-detail-panel">
                <button class="service-detail-close" type="button" data-service-detail-close aria-label="Close service details"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg></button>
                <div class="service-detail-orbit" aria-hidden="true"><span class="service-detail-orbit-caption">STAGEPASS / FIELD SYSTEMS</span><span class="service-detail-orbit-ring"></span><strong data-service-detail-number>01</strong><span class="service-detail-orbit-coordinate">LIVE SERVICE BLUEPRINT</span></div>
                <div class="service-detail-copy">
                    <p class="eyebrow"><span>Inside the experience</span><span data-service-detail-counter>01 / 10</span></p>
                    <h2 id="service-detail-title">Audio Reinforcement</h2>
                    <p id="service-detail-summary"></p>
                    <p id="service-detail-delivery"></p>
                    <button class="button button-outline service-detail-cta" type="button" data-quote-open>Build this into my event <svg><use href="#i-arrow"/></svg></button>
                </div>
            </div>
        </dialog>

        <section class="industries-section section-rule" id="industries">
            <div class="industry-heading"><div class="section-copy"><p class="eyebrow">Industries We Serve</p><h2>Every industry.<br><em>Exceptional</em> experiences.</h2></div><a class="button button-outline button-small" href="#work">Explore Our Work <svg><use href="#i-arrow"/></svg></a><p class="industry-note">Different sectors.<br>One standard.<br>Excellence.</p></div>
            <div class="industry-grid">
                @foreach ($industries as $industry)
                    <div class="industry-card {{ $industry['scene'] }} {{ count($industry['images']) > 0 ? 'industry-card-gallery' : '' }}" @if (count($industry['images']) > 1) data-industry-carousel role="group" aria-label="{{ $industry['name'] }} image carousel" @endif>
                        @if (count($industry['images']) > 0)
                            <div class="industry-gallery" style="--industry-backdrop: url('{{ asset('images/industries/'.$industry['images'][0]) }}')">
                                @foreach ($industry['images'] as $image)
                                    <img class="industry-slide {{ $loop->first ? 'is-active' : '' }}" src="{{ asset('images/industries/'.$image) }}" alt="{{ $industry['name'] }} event production, image {{ $loop->iteration }} of {{ count($industry['images']) }}" loading="lazy" decoding="async">
                                @endforeach
                            </div>
                        @endif
                        <span class="industry-card-shade" aria-hidden="true"></span>
                        <div class="industry-card-footer">
                            <span class="industry-card-icon" aria-hidden="true"><svg><use href="#{{ $industry['icon'] }}"/></svg></span>
                            <span class="industry-card-divider" aria-hidden="true"></span>
                            <div class="industry-card-copy">
                                <span class="industry-card-label">{{ $industry['name'] }}</span>
                                <p class="industry-card-description">{{ $industry['description'] }}</p>
                                <button class="industry-card-open" type="button" data-industry-open aria-haspopup="dialog" aria-controls="industry-detail-dialog" aria-label="Explore {{ $industry['name'] }}" data-industry-title="{{ $industry['name'] }}" data-industry-overview="{{ $industry['overview'] }}" data-industry-formats="{{ implode('||', $industry['formats']) }}" data-industry-needs="{{ $industry['needs'] }}" data-industry-number="{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}" data-industry-total="{{ str_pad((string) count($industries), 2, '0', STR_PAD_LEFT) }}">Explore Sector <b aria-hidden="true">→</b></button>
                            </div>
                        </div>
                        @if (count($industry['images']) > 1)
                            <div class="industry-carousel-pagination" role="group" aria-label="{{ $industry['name'] }} image selection">
                                <div class="industry-carousel-dots">
                                    @foreach ($industry['images'] as $image)
                                        <button type="button" data-industry-slide="{{ $loop->index }}" aria-label="Show {{ $industry['name'] }} image {{ $loop->iteration }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"></button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>

        <dialog class="service-detail-dialog industry-detail-dialog" id="industry-detail-dialog" aria-labelledby="industry-detail-title">
            <div class="service-detail-panel industry-detail-panel">
                <button class="service-detail-close" type="button" data-industry-detail-close aria-label="Close industry playbook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg></button>
                <div class="industry-detail-visual" aria-hidden="true">
                    <p>STAGEPASS / SECTOR BLUEPRINT</p>
                    <div class="industry-detail-radar"><span data-industry-detail-number>01</span><i></i><b></b></div>
                    <small>DESIGNED AROUND THE AUDIENCE</small>
                </div>
                <div class="service-detail-copy industry-detail-copy">
                    <p class="eyebrow"><span>Industry playbook</span><span data-industry-detail-counter>01 / 09</span></p>
                    <h2 id="industry-detail-title">Corporate &amp; Business Events</h2>
                    <p id="industry-detail-overview"></p>
                    <div class="industry-detail-facts">
                        <div><h3>Event formats</h3><ul id="industry-detail-formats"></ul></div>
                        <div><h3>Production blueprint</h3><p id="industry-detail-needs"></p></div>
                    </div>
                    <button class="button button-outline service-detail-cta" type="button" data-quote-open>Plan this experience <svg><use href="#i-arrow"/></svg></button>
                </div>
            </div>
        </dialog>

        <section class="work-section section-rule" id="work">
            <div class="work-intro section-copy"><p class="eyebrow">Our Work</p><h2>Ideas brought<br>to <em>life.</em></h2><p>A showcase of the events, experiences and productions we have delivered across Africa.</p><a class="button button-outline button-small" href="#contact">Plan Your Event <svg><use href="#i-arrow"/></svg></a></div>
            <div class="project-track {{ count($instagramPosts) > 0 ? 'has-instagram-feed' : 'is-static' }}" aria-label="{{ count($instagramPosts) > 0 ? 'Recent Instagram projects' : 'Selected projects' }}" data-project-count="{{ count($instagramPosts) }}">
                @if (count($instagramPosts) > 0)
                    <div class="project-lane project-lane-forward" role="group" aria-label="Instagram projects moving forward" data-project-count="{{ count($instagramPosts) }}">
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
                    </div>
                @else
                    @foreach ($projects as [$project, $location, $scene])
                        <article class="project-card {{ $scene }}"><span class="project-image"></span><strong>{{ $project }}</strong><small>{{ $location }}</small></article>
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
        </section>

        <section class="contact-section section-rule" id="contact">
            <div class="contact-copy"><h2>Let’s create<br>what’s next.</h2><p>Tell us about your event and our team will get back to you.</p><button class="button button-gold" type="button" data-quote-open>Get a Quotation <svg><use href="#i-arrow"/></svg></button></div>
            <div class="contact-details"><a href="mailto:info@stagepass.co.ke"><svg><use href="#i-mail"/></svg><span><b>info@stagepass.co.ke</b><small>Let’s bring your vision to life.</small></span></a><a href="tel:+254729171351"><svg><use href="#i-phone"/></svg><span><b>+254 729 171 351</b><small>Call our event production team.</small></span></a><a href="https://maps.google.com/?q=Jacaranda+Close+Nairobi+Kenya"><svg><use href="#i-pin"/></svg><span><b>Jacaranda Close, Off Ridgeways Road</b><small>Nairobi, Kenya</small></span></a></div>
            <p class="contact-watermark">The future<br>with speed<br>together<span></span></p>
        </section>
    </main>

    @include('partials.quote-dialog')



    @include('partials.site-footer')
    @include('partials.instagram-lightbox')
</body>
</html>

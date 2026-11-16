<!DOCTYPE html>
<html lang="en-KE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050b14">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="author" content="StagePass Audio Visual Limited">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="English">
    <meta name="geo.region" content="KE-110">
    <meta name="geo.placename" content="Nairobi">
    <meta name="geo.position" content="-1.2210922;36.8443046">
    <meta name="ICBM" content="-1.2210922, 36.8443046">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="en-KE" href="{{ $canonicalUrl }}">
    <link rel="alternate" hreflang="x-default" href="{{ $canonicalUrl }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="StagePass Audio Visual Limited">
    <meta property="og:locale" content="en_KE">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ asset(config('site_seo.og_image')) }}">
    <meta property="og:image:width" content="1672">
    <meta property="og:image:height" content="941">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $canonicalUrl }}">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ asset(config('site_seo.og_image')) }}">
    <meta name="twitter:site" content="@stagepass">
    <meta name="twitter:creator" content="@stagepass">
    <title>{{ $metaTitle }}</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>:root { --hero-photo: url("{{ asset('images/stagepass-hero-branded.png') }}"); --about-photo: url("{{ asset('images/about-technician-branded.png') }}"); --event-sprite: url("{{ asset('images/event-contact-sheet.png') }}"); }</style>
    @stack('head')
</head>
<body class="inner-site">
    <svg class="svg-library" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
        <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M4 12h15M13 5l7 7-7 7"/></symbol>
        <symbol id="i-search" viewBox="0 0 24 24"><circle cx="10.8" cy="10.8" r="7.2"/><path d="m16.2 16.2 4.4 4.4"/></symbol>
        <symbol id="i-audio" viewBox="0 0 24 24"><path d="M4 9v6h4l6 5V4L8 9H4Z"/><path d="M17 9a5 5 0 0 1 0 6M19.5 6.5a9 9 0 0 1 0 11"/></symbol>
        <symbol id="i-screen" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="13" rx="1"/><path d="M8 21h8M12 17v4"/></symbol>
        <symbol id="i-bulb" viewBox="0 0 24 24"><path d="M9 18h6m-5 3h4m-6-6c-1.7-1.2-3-3.2-3-5.5a7 7 0 1 1 14 0c0 2.3-1.3 4.3-3 5.5-.7.5-1 1.3-1 2h-6c0-.7-.3-1.5-1-2Z"/><path d="M12 1v2M4.8 4l1.4 1.4M19.2 4l-1.4 1.4"/></symbol>
        <symbol id="i-stage" viewBox="0 0 24 24"><path d="M3 5h18v4H3zM5 9v11m14-11v11M3 20h18M8 9l8 11m0-11L8 20M7 5l3 4m7-4-3 4"/></symbol>
        <symbol id="i-rig" viewBox="0 0 24 24"><path d="M3 5h18M5 5v14m14-14v14M3 19h18M7 5l10 14m0-14L7 19M9 5v3m6-3v3m-6 8v3m6-3v3"/></symbol>
        <symbol id="i-power" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="15" rx="2"/><path d="M7 9h4v4H7zM15 9h2m-2 4h2M8 20v2m8-2v2"/></symbol>
        <symbol id="i-camera" viewBox="0 0 24 24"><path d="M3 7h11a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H3zM16 11l5-3v8l-5-3M6 7l1-3h4l1 3"/></symbol>
        <symbol id="i-cube" viewBox="0 0 24 24"><path d="m12 2 9 5v10l-9 5-9-5V7l9-5Z"/><path d="m3.5 7 8.5 5 8.5-5M12 12v10M8 4.5l9 5"/></symbol>
        <symbol id="i-case" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V4h8v3M3 12h18m-11 0v2h4v-2"/></symbol>
        <symbol id="i-team" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3"/><path d="M3 20v-2a6 6 0 0 1 12 0v2M16 5a3 3 0 0 1 0 6m2 3a5 5 0 0 1 3 5v1"/></symbol>
        <symbol id="i-diamond" viewBox="0 0 24 24"><path d="M3 8 6.5 3h11L21 8l-9 13L3 8Z"/><path d="M3 8h18M6.5 3 9 8l3 13 3-13 2.5-5"/></symbol>
        <symbol id="i-booth" viewBox="0 0 24 24"><path d="M3 20h18M5 20V9h14v11M3 6h18v3H3zM8 12v4m8-4v4"/></symbol>
        <symbol id="i-cap" viewBox="0 0 24 24"><path d="m2 9 10-5 10 5-10 5L2 9Z"/><path d="M6 11v5c3.5 2.7 8.5 2.7 12 0v-5m4-2v6"/></symbol>
        <symbol id="i-bell" viewBox="0 0 24 24"><path d="M3 18h18M5 18a7 7 0 0 1 14 0M10 5h4m-2-2v2m-7 16h14"/></symbol>
        <symbol id="i-pulse" viewBox="0 0 24 24"><path d="M3 12h4l2-6 4 12 3-8 2 2h3"/><path d="M12 22a10 10 0 1 1 10-10"/></symbol>
        <symbol id="i-building" viewBox="0 0 24 24"><path d="M4 21V5h16v16M2 21h20M8 9h1m6 0h1M8 13h1m6 0h1M8 17h1m6 0h1M11 21v-4h2v4"/></symbol>
        <symbol id="i-trophy" viewBox="0 0 24 24"><path d="M8 4h8v5a4 4 0 0 1-8 0V4ZM8 6H4v2a4 4 0 0 0 4 4m8-6h4v2a4 4 0 0 1-4 4m-4 1v4m-4 3h8m-7-3h6v3H9z"/></symbol>
    </svg>
    @include('partials.site-header')
    @yield('content')
    @include('partials.site-footer')
    @include('partials.quote-dialog')
</body>
</html>

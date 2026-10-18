<!DOCTYPE html>
<html lang="en-KE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#050b14">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="Stagepass Audio Visual">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/stagepass-hero-branded.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ asset('images/stagepass-hero-branded.png') }}">
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
    </svg>
    @include('partials.site-header')
    @yield('content')
    @include('partials.site-footer')
</body>
</html>

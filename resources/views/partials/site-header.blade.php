<header class="site-header">
    <a class="brand" href="{{ route('home') }}" aria-label="Stagepass Audio Visual home"><span class="brand-logo"><img src="{{ asset('images/stagepass-logo-source.png') }}" alt="Stagepass Audio Visual"></span></a>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="main-navigation" aria-expanded="false"><span></span><span></span></button>
    <nav class="main-nav" id="main-navigation" aria-label="Main navigation">
        <a href="{{ route('home') }}" @if (request()->routeIs('home')) class="is-active" aria-current="page" @endif>Home</a>
        <a href="{{ route('about') }}" @if (request()->routeIs('about')) class="is-active" aria-current="page" @endif>About</a>
        <a href="{{ route('services') }}" @if (request()->routeIs('services', 'lighting')) class="is-active" aria-current="page" @endif>Services</a>
        <a href="{{ route('industries') }}" @if (request()->routeIs('industries')) class="is-active" aria-current="page" @endif>Industries</a>
        <a href="{{ route('our-work') }}" @if (request()->routeIs('our-work', 'portfolio')) class="is-active" aria-current="page" @endif>Our Work</a>
        <a href="{{ route('contact') }}" @if (request()->routeIs('contact')) class="is-active" aria-current="page" @endif>Contact</a>
    </nav>
    <div class="header-actions"><button class="button button-outline" type="button" data-quote-open>Request Proposal <svg><use href="#i-arrow"/></svg></button></div>
</header>

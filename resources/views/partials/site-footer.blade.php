@php($isHomepage = request()->routeIs('home', 'home-1', 'home-one'))
<footer class="site-footer">
    <div class="footer-main">
        <a class="brand" href="{{ $isHomepage ? '#home' : route('home') }}" aria-label="Stagepass Audio Visual home"><span class="brand-logo"><img src="{{ asset('images/stagepass-logo-source.png') }}" alt="Stagepass Audio Visual"></span></a>
        <nav class="footer-nav" aria-label="Footer navigation">
            @if ($isHomepage)
                <a href="#home">Home</a><a href="#about">About</a><a href="#services">Services</a><a href="#industries">Industries</a><a href="#work">Our Work</a><a href="#contact">Contact</a>
            @else
                <a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}">About</a><a href="{{ route('services') }}">Services</a><a href="{{ route('industries') }}">Industries</a><a href="{{ route('our-work') }}">Our Work</a><a href="{{ route('contact') }}">Contact</a>
            @endif
        </nav>
        <div class="social-links"><a href="https://www.linkedin.com/company/stagepass-audio-visual-limited/" aria-label="Stagepass on LinkedIn" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8.5h3V19H5zM6.5 4a1.75 1.75 0 1 0 0 3.5 1.75 1.75 0 0 0 0-3.5ZM10 8.5h2.9v1.4c.6-1 1.6-1.7 3.2-1.7 2.8 0 3.9 1.7 3.9 4.7V19h-3v-5.4c0-1.5-.2-2.8-1.8-2.8s-2.2 1.1-2.2 2.8V19h-3z"/></svg></a><a href="https://www.facebook.com/stagepassAv/" aria-label="Stagepass on Facebook" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8.2h2.8l.4-3.2h-3.2V7.5c0-.9.3-1.6 1.6-1.6h1.7V3.1c-.3 0-1.4-.1-2.8-.1-2.8 0-4.8 1.7-4.8 4.9v1.7H6.5v3.2h2.7V21z"/></svg></a><a href="https://twitter.com/stagepassav" aria-label="Stagepass on Twitter" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 5.9a8.3 8.3 0 0 1-2.4.7 4.2 4.2 0 0 0 1.8-2.3 8.4 8.4 0 0 1-2.7 1 4.2 4.2 0 0 0-7.2 3.8 11.9 11.9 0 0 1-8.6-4.4 4.2 4.2 0 0 0 1.3 5.6 4.2 4.2 0 0 1-1.9-.5v.1c0 2 1.4 3.8 3.4 4.1a4.2 4.2 0 0 1-1.9.1 4.2 4.2 0 0 0 3.9 2.9A8.4 8.4 0 0 1 1.5 19a11.8 11.8 0 0 0 6.4 1.9c7.7 0 11.9-6.4 11.9-11.9v-.5A8.5 8.5 0 0 0 22 5.9Z"/></svg></a><a href="https://www.instagram.com/stagepassav/" aria-label="Stagepass on Instagram" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle class="social-icon-dot" cx="17.6" cy="6.7" r="1"/></svg></a><a href="https://youtube.com/@stagepassav-ke" aria-label="Stagepass on YouTube" target="_blank" rel="noopener noreferrer"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23 7.1a3 3 0 0 0-2.1-2.2C19 4.4 12 4.4 12 4.4s-7 0-8.9.5A3 3 0 0 0 1 7.1 31 31 0 0 0 .5 12a31 31 0 0 0 .5 4.9 3 3 0 0 0 2.1 2.2c1.9.5 8.9.5 8.9.5s7 0 8.9-.5a3 3 0 0 0 2.1-2.2 31 31 0 0 0 .5-4.9 31 31 0 0 0-.5-4.9Z"/><path class="social-icon-play" d="m10 8.5 6 3.5-6 3.5z"/></svg></a></div>
    </div>
    <div class="footer-bottom"><p>© {{ now()->year }} Stagepass Audio Visual Limited. All Rights Reserved.</p><p><a href="{{ route('privacy') }}">Privacy Policy</a><i>|</i><a href="{{ $isHomepage ? '#contact' : route('contact') }}">Contact</a><i>|</i><a href="https://designekta.com" target="_blank" rel="noopener noreferrer">Site by Designekta</a></p></div>
</footer>
<nav class="mobile-bottom-nav" aria-label="Mobile navigation">
    @if ($isHomepage)
        <a href="#home" aria-label="Home"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/></svg><span>Home</span></a>
        <a href="#about" aria-label="About"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5m0-9h.01"/></svg><span>About</span></a>
        <a href="#services" aria-label="Services"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m-13 5h18m-11 0v2h4v-2"/></svg><span>Services</span></a>
        <a href="#work" aria-label="Work"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h3l2-3h6l2 3h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2Z"/><circle cx="12" cy="13" r="3.5"/></svg><span>Work</span></a>
        <a href="#contact" aria-label="Contact"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg><span>Contact</span></a>
    @else
        <a href="{{ route('home') }}" aria-label="Home"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/></svg><span>Home</span></a>
        <a href="{{ route('about') }}" aria-label="About"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5m0-9h.01"/></svg><span>About</span></a>
        <a href="{{ route('services') }}" aria-label="Services"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="7" width="18" height="14" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m-13 5h18m-11 0v2h4v-2"/></svg><span>Services</span></a>
        <a href="{{ route('our-work') }}" aria-label="Work"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h3l2-3h6l2 3h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2Z"/><circle cx="12" cy="13" r="3.5"/></svg><span>Work</span></a>
        <a href="{{ route('contact') }}" aria-label="Contact"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg><span>Contact</span></a>
    @endif
</nav>
@if ($isHomepage)
    <a class="back-to-top" href="#home" aria-label="Back to top" data-back-to-top>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 19V5m-7 7 7-7 7 7"/></svg>
    </a>
@endif

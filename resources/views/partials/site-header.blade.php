<header class="site-header">
    <a class="brand" href="{{ route('home') }}" aria-label="Stagepass Audio Visual home"><span class="brand-logo"><img src="{{ asset('images/stagepass-logo-source.png') }}" alt="Stagepass Audio Visual"></span></a>
    <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false"><span></span><span></span></button>
    <nav class="main-nav" aria-label="Main navigation">
        <a href="{{ route('home') }}#home">Home</a><a href="{{ route('home') }}#about">About</a><a href="{{ route('home') }}#services">Services</a><a href="{{ route('home') }}#industries">Industries</a><a href="{{ route('home') }}#work">Our Work</a><a href="{{ route('home') }}#contact">Contact</a>
    </nav>
    <div class="header-actions"><a class="search-button" href="{{ route('home') }}#work" aria-label="Explore our work"><svg><use href="#i-search"/></svg></a><a class="button button-outline" href="{{ route('home') }}#contact">Request Proposal <svg><use href="#i-arrow"/></svg></a></div>
</header>

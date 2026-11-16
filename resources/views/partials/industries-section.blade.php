<section class="industries-section section-rule" id="industries">
    <div class="industry-heading">
        <div class="section-copy">
            <p class="eyebrow">Industries We Serve</p>
            <h2>Every industry.<br><em>Exceptional</em> experiences.</h2>
        </div>
        <a class="button button-outline button-small" href="{{ $isHomePage ? '#work' : route('our-work') }}">Explore Our Work <svg><use href="#i-arrow"/></svg></a>
        <p class="industry-note">Different sectors.<br>One standard.<br>Excellence.</p>
    </div>
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
            <div class="industry-detail-radar"><span data-industry-detail-number>01</span><i></i><b></b></div>
        </div>
        <div class="service-detail-copy industry-detail-copy">
            <p class="eyebrow"><span>Industry playbook</span><span data-industry-detail-counter>01 / {{ str_pad((string) count($industries), 2, '0', STR_PAD_LEFT) }}</span></p>
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

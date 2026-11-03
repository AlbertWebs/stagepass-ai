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

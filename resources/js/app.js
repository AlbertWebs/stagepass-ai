const menuToggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.main-nav');

menuToggle?.addEventListener('click', () => {
    const isOpen = navigation?.classList.toggle('is-open') ?? false;
    menuToggle.setAttribute('aria-expanded', String(isOpen));
});

navigation?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        navigation.classList.remove('is-open');
        menuToggle?.setAttribute('aria-expanded', 'false');
    });
});

const quoteDialog = document.querySelector('#quote-dialog');
const quoteForm = quoteDialog?.querySelector('.quote-form');

document.querySelectorAll('[data-quote-open]').forEach((button) => {
    button.addEventListener('click', () => {
        if (quoteDialog instanceof HTMLDialogElement && !quoteDialog.open) {
            quoteDialog.showModal();
        }
    });
});

quoteDialog?.querySelector('[data-quote-close]')?.addEventListener('click', () => {
    if (quoteDialog instanceof HTMLDialogElement) {
        quoteDialog.close();
    }
});

quoteDialog?.addEventListener('click', (event) => {
    if (event.target === quoteDialog && quoteDialog instanceof HTMLDialogElement) {
        quoteDialog.close();
    }
});

if (quoteDialog instanceof HTMLDialogElement && quoteDialog.hasAttribute('data-open-on-load')) {
    quoteDialog.showModal();
}

quoteForm?.addEventListener('submit', async (event) => {
    event.preventDefault();

    const feedback = quoteForm.querySelector('[data-quote-feedback]');
    const emailFallback = quoteForm.querySelector('[data-quote-email-fallback]');
    const submitButton = quoteForm.querySelector('button[type="submit"]');

    if (!feedback || !(submitButton instanceof HTMLButtonElement)) {
        return;
    }

    quoteForm.querySelectorAll('[data-field-error-for]').forEach((error) => error.remove());
    quoteForm.querySelectorAll('[aria-invalid="true"]').forEach((field) => field.removeAttribute('aria-invalid'));
    feedback.hidden = true;
    feedback.textContent = '';
    emailFallback?.setAttribute('hidden', '');
    submitButton.disabled = true;
    quoteForm.setAttribute('aria-busy', 'true');

    const showFeedback = (message, type = 'error') => {
        feedback.textContent = message;
        feedback.classList.toggle('quote-alert-success', type === 'success');
        feedback.classList.toggle('quote-alert-error', type === 'error');
        feedback.setAttribute('role', type === 'success' ? 'status' : 'alert');
        feedback.hidden = false;
    };

    try {
        const response = await fetch(quoteForm.action, {
            method: quoteForm.method,
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: new FormData(quoteForm),
            credentials: 'same-origin',
        });
        const result = await response.json().catch(() => ({}));

        if (response.status === 422 && result.errors) {
            Object.entries(result.errors).forEach(([fieldName, messages]) => {
                const field = quoteForm.elements.namedItem(fieldName);
                const fieldContainer = field instanceof HTMLElement ? field.closest('.quote-form-field') : null;
                const errorText = Array.isArray(messages) ? messages[0] : null;

                if (!field || !fieldContainer || !errorText) {
                    return;
                }

                field.setAttribute('aria-invalid', 'true');

                const fieldError = document.createElement('small');
                fieldError.className = 'quote-field-error';
                fieldError.dataset.fieldErrorFor = fieldName;
                fieldError.textContent = errorText;
                fieldContainer.append(fieldError);
            });

            showFeedback('Please check the highlighted details and try again.');
            quoteForm.querySelector('[aria-invalid="true"]')?.focus();
            return;
        }

        if (response.status === 429) {
            showFeedback('Too many attempts. Please wait a little while before trying again.');
            return;
        }

        if (response.status === 503) {
            showFeedback(result.message || 'We could not send your request right now. Please email info@stagepass.co.ke.');
            emailFallback?.removeAttribute('hidden');
            return;
        }

        if (!response.ok) {
            showFeedback('We could not send your request right now. Please email info@stagepass.co.ke.');
            emailFallback?.removeAttribute('hidden');
            return;
        }

        quoteForm.reset();
        quoteForm.hidden = true;
        showFeedback(result.message || 'Thanks for reaching out. Your quotation request has been sent to our team.', 'success');
    } catch {
        showFeedback('We could not reach the server. Please email info@stagepass.co.ke.');
        emailFallback?.removeAttribute('hidden');
    } finally {
        submitButton.disabled = false;
        quoteForm.removeAttribute('aria-busy');
    }
});

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

document.querySelectorAll('[data-industry-carousel]').forEach((carousel) => {
    const slides = Array.from(carousel.querySelectorAll('.industry-slide'));
    const slideDots = Array.from(carousel.querySelectorAll('[data-industry-slide]'));
    let activeSlideIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
    let autoplayTimer;

    if (slides.length < 2) {
        return;
    }

    if (activeSlideIndex < 0) {
        activeSlideIndex = 0;
    }

    const showSlide = (requestedIndex) => {
        activeSlideIndex = (requestedIndex + slides.length) % slides.length;

        slides.forEach((slide, index) => {
            slide.classList.toggle('is-active', index === activeSlideIndex);
        });

        slideDots.forEach((dot, index) => {
            dot.setAttribute('aria-current', String(index === activeSlideIndex));
        });
    };

    const pauseAutoplay = () => {
        window.clearInterval(autoplayTimer);
        autoplayTimer = undefined;
    };

    const startAutoplay = () => {
        if (autoplayTimer || prefersReducedMotion.matches || document.hidden || carousel.matches(':hover') || carousel.contains(document.activeElement)) {
            return;
        }

        autoplayTimer = window.setInterval(() => showSlide(activeSlideIndex + 1), 5800);
    };

    const restartAutoplay = () => {
        pauseAutoplay();
        startAutoplay();
    };

    slideDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            restartAutoplay();
        });
    });

    carousel.addEventListener('mouseenter', pauseAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);
    carousel.addEventListener('focusin', pauseAutoplay);
    carousel.addEventListener('focusout', (event) => {
        if (!carousel.contains(event.relatedTarget)) {
            startAutoplay();
        }
    });
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            pauseAutoplay();
        } else {
            startAutoplay();
        }
    });
    prefersReducedMotion.addEventListener('change', () => {
        if (prefersReducedMotion.matches) {
            pauseAutoplay();
        } else {
            startAutoplay();
        }
    });

    startAutoplay();
});

const projectTrack = document.querySelector('.project-track');
const projectMarquee = projectTrack?.querySelector('.project-marquee');

const shiftProjectCarousel = (direction) => {
    if (projectTrack?.classList.contains('has-instagram-feed')) {
        const carouselAnimation = projectMarquee?.getAnimations()[0];
        const animationDuration = carouselAnimation?.effect?.getComputedTiming().duration;
        const projectCount = Number(projectTrack.dataset.projectCount);

        if (carouselAnimation && typeof animationDuration === 'number' && projectCount > 0) {
            const currentTime = Number(carouselAnimation.currentTime ?? 0);
            carouselAnimation.currentTime = ((currentTime + direction * animationDuration / projectCount) % animationDuration + animationDuration) % animationDuration;
        } else {
            const firstProject = projectTrack.querySelector('.project-card');
            projectTrack.scrollBy({ left: direction * (firstProject?.getBoundingClientRect().width ?? 0), behavior: 'smooth' });
        }

        return;
    }

    const projects = projectTrack?.querySelectorAll(':scope > .project-card');

    if (projects?.length && projectTrack) {
        if (direction > 0) {
            projectTrack.append(projects.item(0));
        } else {
            projectTrack.insertBefore(projects.item(projects.length - 1), projects.item(0));
        }
    }
};

document.querySelector('.slide-next')?.addEventListener('click', () => shiftProjectCarousel(1));
document.querySelector('.slide-prev')?.addEventListener('click', () => shiftProjectCarousel(-1));

const revealGroups = [
    '.about-section > *',
    '.services-copy',
    '.services-grid > *',
    '.industry-heading',
    '.industry-grid > *',
    '.work-intro',
    '.slider-controls',
    '.brand-strip > *',
    '.contact-section > *',
    '.site-footer > *',
];

if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const revealTargets = new Set();

    revealGroups.forEach((selector) => {
        document.querySelectorAll(selector).forEach((element, index) => {
            element.style.setProperty('--reveal-delay', `${Math.min(index, 4) * 65}ms`);
            revealTargets.add(element);
        });
    });

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -8% 0px',
    });

    revealTargets.forEach((element) => {
        element.classList.add('scroll-reveal');
        revealObserver.observe(element);
    });
}

const instagramLightbox = document.querySelector('.instagram-lightbox');
const instagramLightboxMedia = instagramLightbox?.querySelector('.instagram-lightbox-media');
const instagramLightboxCaption = instagramLightbox?.querySelector('.instagram-lightbox-caption');
const instagramLightboxLink = instagramLightbox?.querySelector('.instagram-lightbox-link');

document.querySelectorAll('.instagram-media-trigger').forEach((card) => {
    card.addEventListener('click', () => {
        if (!(instagramLightbox instanceof HTMLDialogElement) || !instagramLightboxMedia || !instagramLightboxCaption || !instagramLightboxLink) {
            return;
        }

        const mediaUrl = card.dataset.mediaUrl;
        const previewUrl = card.dataset.previewUrl;
        const permalink = card.dataset.permalink;
        const caption = card.dataset.caption ?? '';

        if (!mediaUrl || !previewUrl || !permalink) {
            return;
        }

        instagramLightboxMedia.replaceChildren();

        if (card.dataset.mediaType === 'VIDEO') {
            const video = document.createElement('video');
            video.controls = true;
            video.playsInline = true;
            video.autoplay = true;
            video.preload = 'metadata';
            video.poster = previewUrl;
            video.src = mediaUrl;
            video.setAttribute('aria-label', caption || 'Stagepass Instagram video');
            instagramLightboxMedia.append(video);
        } else {
            const image = document.createElement('img');
            image.src = mediaUrl;
            image.alt = caption || 'Stagepass Instagram post';
            instagramLightboxMedia.append(image);
        }

        instagramLightboxCaption.textContent = caption;
        instagramLightboxLink.href = permalink;
        instagramLightbox.showModal();
    });
});

instagramLightbox?.querySelector('.instagram-lightbox-close')?.addEventListener('click', () => {
    if (instagramLightbox instanceof HTMLDialogElement) {
        instagramLightbox.close();
    }
});

instagramLightbox?.addEventListener('click', (event) => {
    if (event.target === instagramLightbox && instagramLightbox instanceof HTMLDialogElement) {
        instagramLightbox.close();
    }
});

instagramLightbox?.addEventListener('close', () => {
    instagramLightboxMedia?.querySelector('video')?.pause();
    instagramLightboxMedia?.replaceChildren();
});

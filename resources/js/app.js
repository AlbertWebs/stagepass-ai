const menuToggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.main-nav');

const setNavigationOpen = (isOpen) => {
    if (!menuToggle || !navigation) {
        return;
    }

    navigation.classList.toggle('is-open', isOpen);
    menuToggle.setAttribute('aria-expanded', String(isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
    document.body.classList.toggle('navigation-open', isOpen);
};

menuToggle?.addEventListener('click', () => {
    setNavigationOpen(menuToggle.getAttribute('aria-expanded') !== 'true');
});

navigation?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        setNavigationOpen(false);
    });
});

document.querySelectorAll('.mobile-bottom-nav a').forEach((link) => {
    link.addEventListener('click', () => {
        setNavigationOpen(false);
    });
});

navigation?.querySelector('[data-quote-open]')?.addEventListener('click', () => {
    setNavigationOpen(false);
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && navigation?.classList.contains('is-open')) {
        setNavigationOpen(false);
        menuToggle?.focus();
    }
});

const reducedMotionPreference = window.matchMedia('(prefers-reduced-motion: reduce)');
const pageTransitionDuration = 240;

if (!reducedMotionPreference.matches) {
    document.documentElement.classList.add('page-transition-entering');
    document.documentElement.addEventListener('animationend', (event) => {
        if (event.animationName === 'page-enter') {
            document.documentElement.classList.remove('page-transition-entering');
        }
    });

    document.addEventListener('click', (event) => {
        if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
            return;
        }

        if (!(event.target instanceof Element)) {
            return;
        }

        const link = event.target.closest('a[href]');

        if (!(link instanceof HTMLAnchorElement) || link.hasAttribute('download') || (link.target && link.target !== '_self')) {
            return;
        }

        const destination = new URL(link.href, window.location.href);

        if (destination.origin !== window.location.origin || (destination.pathname === window.location.pathname && destination.search === window.location.search)) {
            return;
        }

        event.preventDefault();
        document.documentElement.classList.add('page-transition-leaving');
        window.setTimeout(() => window.location.assign(destination.href), pageTransitionDuration);
    });

    window.addEventListener('pageshow', (event) => {
        if (event.persisted) {
            document.documentElement.classList.remove('page-transition-leaving');
            document.documentElement.classList.add('page-transition-entering');
        }
    });
}

const scrollRevealTargets = document.querySelectorAll('[data-scroll-reveal]');

if (!reducedMotionPreference.matches && scrollRevealTargets.length > 0 && 'IntersectionObserver' in window) {
    document.documentElement.classList.add('has-scroll-motion');

    const scrollRevealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.08, rootMargin: '0px 0px -6% 0px' });

    scrollRevealTargets.forEach((target) => scrollRevealObserver.observe(target));
}

const aboutTypewriter = document.querySelector('[data-about-typewriter]');
const aboutTypewriterLines = Array.from(aboutTypewriter?.querySelectorAll('[data-typewriter-line]') ?? []);

if (aboutTypewriter instanceof HTMLElement && aboutTypewriterLines.length > 0 && !reducedMotionPreference.matches && 'IntersectionObserver' in window) {
    aboutTypewriter.classList.add('is-typewriter-pending');

    const aboutTypewriterObserver = new IntersectionObserver((entries, observer) => {
        if (!entries.some((entry) => entry.isIntersecting)) {
            return;
        }

        observer.disconnect();
        aboutTypewriter.classList.remove('is-typewriter-pending');
        aboutTypewriter.classList.add('is-typewriter-typing');
        aboutTypewriterLines.forEach((line) => {
            line.textContent = '';
        });

        const typeLine = (lineIndex) => {
            const line = aboutTypewriterLines[lineIndex];
            const characters = Array.from(line?.dataset.typewriterLine ?? '');

            if (!line || characters.length === 0) {
                aboutTypewriter.classList.remove('is-typewriter-typing');
                aboutTypewriter.classList.add('is-typewriter-complete');
                return;
            }

            line.classList.add('is-current');
            let characterIndex = 0;

            const typeNextCharacter = () => {
                characterIndex += 1;
                line.textContent = characters.slice(0, characterIndex).join('');

                if (characterIndex < characters.length) {
                    window.setTimeout(typeNextCharacter, 62);
                    return;
                }

                line.classList.remove('is-current');
                if (lineIndex + 1 < aboutTypewriterLines.length) {
                    window.setTimeout(() => typeLine(lineIndex + 1), 240);
                    return;
                }

                aboutTypewriter.classList.remove('is-typewriter-typing');
                aboutTypewriter.classList.add('is-typewriter-complete');
            };

            typeNextCharacter();
        };

        typeLine(0);
    }, { threshold: 0.35, rootMargin: '0px 0px -10% 0px' });

    aboutTypewriterObserver.observe(aboutTypewriter);
}

const quoteDialog = document.querySelector('#quote-dialog');
const quoteForm = quoteDialog?.querySelector('.quote-form');
const serviceDetailDialog = document.querySelector('#service-detail-dialog');
const serviceDetailButtons = document.querySelectorAll('[data-service-open]');

if (serviceDetailDialog instanceof HTMLDialogElement && serviceDetailButtons.length > 0) {
    const serviceDetailTitle = serviceDetailDialog.querySelector('#service-detail-title');
    const serviceDetailSummary = serviceDetailDialog.querySelector('#service-detail-summary');
    const serviceDetailDelivery = serviceDetailDialog.querySelector('#service-detail-delivery');
    const serviceDetailNumber = serviceDetailDialog.querySelector('[data-service-detail-number]');
    const serviceDetailCounter = serviceDetailDialog.querySelector('[data-service-detail-counter]');
    const serviceDetailClose = serviceDetailDialog.querySelector('[data-service-detail-close]');

    serviceDetailButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (!(button instanceof HTMLButtonElement) || !serviceDetailTitle || !serviceDetailSummary || !serviceDetailDelivery || !serviceDetailNumber || !serviceDetailCounter) {
                return;
            }

            const serviceNumber = String(index + 1).padStart(2, '0');
            const serviceTotal = String(serviceDetailButtons.length).padStart(2, '0');

            serviceDetailTitle.textContent = button.dataset.serviceTitle ?? '';
            serviceDetailSummary.textContent = button.dataset.serviceSummary ?? '';
            serviceDetailDelivery.textContent = button.dataset.serviceDelivery ?? '';
            serviceDetailNumber.textContent = serviceNumber;
            serviceDetailCounter.textContent = `${serviceNumber} / ${serviceTotal}`;
            serviceDetailDialog.showModal();
        });
    });

    serviceDetailClose?.addEventListener('click', () => {
        serviceDetailDialog.close();
    });

    serviceDetailDialog.addEventListener('click', (event) => {
        if (event.target === serviceDetailDialog) {
            serviceDetailDialog.close();
        }
    });
}

const industryDetailDialog = document.querySelector('#industry-detail-dialog');
const industryDetailButtons = document.querySelectorAll('[data-industry-open]');

if (industryDetailDialog instanceof HTMLDialogElement && industryDetailButtons.length > 0) {
    const industryDetailTitle = industryDetailDialog.querySelector('#industry-detail-title');
    const industryDetailOverview = industryDetailDialog.querySelector('#industry-detail-overview');
    const industryDetailFormats = industryDetailDialog.querySelector('#industry-detail-formats');
    const industryDetailNeeds = industryDetailDialog.querySelector('#industry-detail-needs');
    const industryDetailNumber = industryDetailDialog.querySelector('[data-industry-detail-number]');
    const industryDetailCounter = industryDetailDialog.querySelector('[data-industry-detail-counter]');
    const industryDetailClose = industryDetailDialog.querySelector('[data-industry-detail-close]');
    const closeIndustryDetailDialog = () => {
        if (!industryDetailDialog.open || industryDetailDialog.classList.contains('is-closing')) {
            return;
        }

        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            industryDetailDialog.close();

            return;
        }

        industryDetailDialog.classList.add('is-closing');
    };

    industryDetailButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (!(button instanceof HTMLButtonElement) || !industryDetailTitle || !industryDetailOverview || !industryDetailFormats || !industryDetailNeeds || !industryDetailNumber || !industryDetailCounter) {
                return;
            }

            industryDetailTitle.textContent = button.dataset.industryTitle ?? '';
            industryDetailOverview.textContent = button.dataset.industryOverview ?? '';
            industryDetailNeeds.textContent = button.dataset.industryNeeds ?? '';
            industryDetailNumber.textContent = button.dataset.industryNumber ?? '';
            industryDetailCounter.textContent = `${button.dataset.industryNumber ?? ''} / ${button.dataset.industryTotal ?? ''}`;

            const formatItems = (button.dataset.industryFormats ?? '')
                .split('||')
                .filter(Boolean)
                .map((format) => {
                    const formatItem = document.createElement('li');
                    formatItem.textContent = format;

                    return formatItem;
                });

            industryDetailFormats.replaceChildren(...formatItems);
            industryDetailDialog.classList.remove('is-closing');
            industryDetailDialog.showModal();
        });
    });

    industryDetailClose?.addEventListener('click', () => {
        closeIndustryDetailDialog();
    });

    industryDetailDialog.addEventListener('click', (event) => {
        if (event.target === industryDetailDialog) {
            closeIndustryDetailDialog();
        }
    });

    industryDetailDialog.addEventListener('cancel', (event) => {
        event.preventDefault();
        closeIndustryDetailDialog();
    });

    industryDetailDialog.addEventListener('animationend', (event) => {
        if (event.target === industryDetailDialog && event.animationName === 'industry-detail-exit') {
            industryDetailDialog.close();
        }
    });

    industryDetailDialog.addEventListener('close', () => {
        industryDetailDialog.classList.remove('is-closing');
    });
}

const closeQuoteDialog = () => {
    if (!(quoteDialog instanceof HTMLDialogElement) || !quoteDialog.open || quoteDialog.classList.contains('is-closing')) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        quoteDialog.close();

        return;
    }

    const quoteCloseButton = quoteDialog.querySelector('[data-quote-close]');
    const dialogRect = quoteDialog.getBoundingClientRect();
    const closeRect = quoteCloseButton?.getBoundingClientRect();

    if (closeRect) {
        const closeCenterX = closeRect.left + closeRect.width / 2;
        const closeCenterY = closeRect.top + closeRect.height / 2;
        const dialogCenterX = dialogRect.left + dialogRect.width / 2;
        const dialogCenterY = dialogRect.top + dialogRect.height / 2;
        const quotePanelRect = quoteDialog.querySelector('.quote-dialog-panel')?.getBoundingClientRect();

        quoteDialog.style.setProperty('--quote-collapse-x', `${closeCenterX - dialogCenterX}px`);
        quoteDialog.style.setProperty('--quote-collapse-y', `${closeCenterY - dialogCenterY}px`);

        if (quotePanelRect) {
            quoteDialog.style.setProperty('--quote-singularity-x', `${((closeCenterX - quotePanelRect.left) / quotePanelRect.width) * 100}%`);
            quoteDialog.style.setProperty('--quote-singularity-y', `${((closeCenterY - quotePanelRect.top) / quotePanelRect.height) * 100}%`);
        }
    }

    quoteDialog.classList.add('is-closing');
};

document.querySelectorAll('[data-quote-open]').forEach((button) => {
    button.addEventListener('click', () => {
        if (quoteDialog instanceof HTMLDialogElement && !quoteDialog.open) {
            quoteDialog.classList.remove('is-closing');
            quoteDialog.style.removeProperty('--quote-collapse-x');
            quoteDialog.style.removeProperty('--quote-collapse-y');
            quoteDialog.style.removeProperty('--quote-singularity-x');
            quoteDialog.style.removeProperty('--quote-singularity-y');
            quoteDialog.showModal();
        }
    });
});

quoteDialog?.querySelector('[data-quote-close]')?.addEventListener('click', () => {
    closeQuoteDialog();
});

quoteDialog?.addEventListener('click', (event) => {
    if (event.target === quoteDialog) {
        closeQuoteDialog();
    }
});

quoteDialog?.addEventListener('cancel', (event) => {
    event.preventDefault();
    closeQuoteDialog();
});

quoteDialog?.addEventListener('animationend', (event) => {
    if (event.target === quoteDialog && event.animationName === 'quote-dialog-exit' && quoteDialog instanceof HTMLDialogElement) {
        quoteDialog.close();
    }
});

quoteDialog?.addEventListener('close', () => {
    quoteDialog.classList.remove('is-closing');
    quoteDialog.style.removeProperty('--quote-collapse-x');
    quoteDialog.style.removeProperty('--quote-collapse-y');
    quoteDialog.style.removeProperty('--quote-singularity-x');
    quoteDialog.style.removeProperty('--quote-singularity-y');
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
const projectMarquees = [...(projectTrack?.querySelectorAll('.project-marquee') ?? [])];

const shiftProjectCarousel = (direction) => {
    if (projectTrack?.classList.contains('has-instagram-feed')) {
        projectMarquees.forEach((projectMarquee) => {
            const carouselAnimation = projectMarquee.getAnimations()[0];
            const animationDuration = carouselAnimation?.effect?.getComputedTiming().duration;
            const projectCount = Number(projectMarquee.closest('.project-lane')?.dataset.projectCount);

            if (carouselAnimation && typeof animationDuration === 'number' && projectCount > 0) {
                const currentTime = Number(carouselAnimation.currentTime ?? 0);
                carouselAnimation.currentTime = ((currentTime + direction * animationDuration / projectCount) % animationDuration + animationDuration) % animationDuration;
            } else {
                const projectLane = projectMarquee.closest('.project-lane');
                const firstProject = projectLane?.querySelector('.project-card');
                projectLane?.scrollBy({ left: direction * (firstProject?.getBoundingClientRect().width ?? 0), behavior: 'smooth' });
            }
        });

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

const aboutPhotoImage = document.querySelector('.about-photo-image');

if (aboutPhotoImage && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    let aboutPhotoFrame = 0;

    const updateAboutPhotoPosition = () => {
        aboutPhotoFrame = 0;

        const aboutPhotoBounds = aboutPhotoImage.parentElement?.getBoundingClientRect();

        if (!aboutPhotoBounds) {
            return;
        }

        const travelDistance = window.innerHeight + aboutPhotoBounds.height;
        const scrollProgress = Math.max(0, Math.min(1, (window.innerHeight - aboutPhotoBounds.top) / travelDistance));
        const verticalOffset = ((scrollProgress - 0.5) * 18).toFixed(2);

        aboutPhotoImage.style.setProperty('--about-photo-offset', `${verticalOffset}px`);
    };

    const scheduleAboutPhotoPosition = () => {
        if (aboutPhotoFrame === 0) {
            aboutPhotoFrame = window.requestAnimationFrame(updateAboutPhotoPosition);
        }
    };

    window.addEventListener('scroll', scheduleAboutPhotoPosition, { passive: true });
    window.addEventListener('resize', scheduleAboutPhotoPosition, { passive: true });
    updateAboutPhotoPosition();
}

const aboutEventCount = document.querySelector('[data-count-up]');
const aboutEventCountValue = aboutEventCount?.querySelector('[data-count-value]');

if (aboutEventCount && aboutEventCountValue && 'IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const eventCountTarget = Number(aboutEventCount.dataset.countTo);
    const eventCountDuration = 1400;

    aboutEventCountValue.textContent = '0';

    const eventCountObserver = new IntersectionObserver((entries, observer) => {
        const entry = entries.find((observedEntry) => observedEntry.isIntersecting);

        if (!entry) {
            return;
        }

        observer.disconnect();

        const animationStartedAt = performance.now();
        const updateEventCount = (currentTime) => {
            const progress = Math.min((currentTime - animationStartedAt) / eventCountDuration, 1);
            const easedProgress = 1 - Math.pow(1 - progress, 3);

            aboutEventCountValue.textContent = Math.round(eventCountTarget * easedProgress).toLocaleString('en-US');

            if (progress < 1) {
                window.requestAnimationFrame(updateEventCount);
            }
        };

        window.requestAnimationFrame(updateEventCount);
    }, { threshold: 0.6 });

    eventCountObserver.observe(aboutEventCount);
}

const instagramLightbox = document.querySelector('.instagram-lightbox');
const instagramLightboxMedia = instagramLightbox?.querySelector('.instagram-lightbox-media');
const instagramLightboxCaption = instagramLightbox?.querySelector('.instagram-lightbox-caption');
const instagramLightboxLink = instagramLightbox?.querySelector('.instagram-lightbox-link');
let instagramVideoFallbackTimer = null;

const createInstagramVideoEmbed = (permalink, caption) => {
    try {
        const postUrl = new URL(permalink);

        if (!['instagram.com', 'www.instagram.com'].includes(postUrl.hostname)) {
            return null;
        }

        const embed = document.createElement('iframe');
        const postPath = postUrl.pathname.replace(/\/+$/, '');

        embed.src = `${postUrl.origin}${postPath}/embed/?autoplay=1`;
        embed.title = caption || 'Instagram video';
        embed.allow = 'autoplay; encrypted-media; picture-in-picture; web-share';
        embed.allowFullscreen = true;
        embed.loading = 'eager';
        embed.referrerPolicy = 'strict-origin-when-cross-origin';
        embed.style.width = '100%';
        embed.style.height = '100%';
        embed.style.border = '0';
        embed.style.background = '#020711';

        return embed;
    } catch {
        return null;
    }
};

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

        window.clearTimeout(instagramVideoFallbackTimer);
        instagramLightboxMedia.replaceChildren();

        if (card.dataset.mediaType === 'VIDEO') {
            const video = document.createElement('video');
            const source = document.createElement('source');
            video.controls = true;
            video.playsInline = true;
            video.autoplay = true;
            video.muted = true;
            video.preload = 'metadata';
            video.poster = previewUrl;
            video.setAttribute('aria-label', caption || 'Stagepass Instagram video');
            source.src = mediaUrl;
            source.type = 'video/mp4';
            video.append(source);
            video.addEventListener('loadedmetadata', () => window.clearTimeout(instagramVideoFallbackTimer), { once: true });
            video.addEventListener('error', () => {
                const embed = createInstagramVideoEmbed(permalink, caption);
                window.clearTimeout(instagramVideoFallbackTimer);

                if (embed && video.isConnected) {
                    video.replaceWith(embed);
                }
            }, { once: true });
            instagramLightboxMedia.append(video);
            video.load();
            video.play().catch(() => {});
            instagramVideoFallbackTimer = window.setTimeout(() => {
                if (video.isConnected && video.readyState === HTMLMediaElement.HAVE_NOTHING) {
                    const embed = createInstagramVideoEmbed(permalink, caption);

                    if (embed) {
                        video.replaceWith(embed);
                    }
                }
            }, 8000);
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
    window.clearTimeout(instagramVideoFallbackTimer);
    instagramLightboxMedia?.querySelector('video')?.pause();
    instagramLightboxMedia?.replaceChildren();
});

const backToTop = document.querySelector('[data-back-to-top]');

if (backToTop) {
    let backToTopFrame = 0;

    const updateBackToTopVisibility = () => {
        backToTopFrame = 0;

        if (window.scrollY < 480) {
            backToTop.classList.remove('is-visible');
            return;
        }

        const buttonBounds = backToTop.getBoundingClientRect();
        const overlapsPageContent = [...document.querySelectorAll('h1, h2, h3, p, a, button, img, video, .project-card, .industry-card, .service-card, .contact-details')]
            .some((element) => {
                if (element === backToTop || backToTop.contains(element)) {
                    return false;
                }

                const style = window.getComputedStyle(element);
                const bounds = element.getBoundingClientRect();

                if (style.display === 'none' || style.visibility === 'hidden' || Number(style.opacity) < 0.05 || bounds.width === 0 || bounds.height === 0) {
                    return false;
                }

                return bounds.left < buttonBounds.right
                    && bounds.right > buttonBounds.left
                    && bounds.top < buttonBounds.bottom
                    && bounds.bottom > buttonBounds.top;
            });

        backToTop.classList.toggle('is-visible', !overlapsPageContent);
    };

    const scheduleBackToTopVisibilityUpdate = () => {
        if (backToTopFrame === 0) {
            backToTopFrame = window.requestAnimationFrame(updateBackToTopVisibility);
        }
    };

    window.addEventListener('scroll', scheduleBackToTopVisibilityUpdate, { passive: true });
    window.addEventListener('resize', scheduleBackToTopVisibilityUpdate, { passive: true });
    updateBackToTopVisibility();
}

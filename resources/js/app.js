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

const projectTrack = document.querySelector('.project-track');

document.querySelector('.slide-next')?.addEventListener('click', () => {
    const firstProject = projectTrack?.querySelector('.project-card');

    if (firstProject) {
        projectTrack.append(firstProject);
    }
});

document.querySelector('.slide-prev')?.addEventListener('click', () => {
    const projects = projectTrack?.querySelectorAll('.project-card');
    const lastProject = projects?.item(projects.length - 1);

    if (lastProject) {
        projectTrack.insertBefore(lastProject, projects.item(0));
    }
});

const revealGroups = [
    '.about-section > *',
    '.services-copy',
    '.services-grid > *',
    '.industry-heading',
    '.industry-grid > *',
    '.work-intro',
    '.project-track > .project-card',
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

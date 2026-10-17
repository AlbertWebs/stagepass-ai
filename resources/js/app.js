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

const revealSections = document.querySelectorAll('main > section:not(.hero), .site-footer');

if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.01,
        rootMargin: '0px 0px -4% 0px',
    });

    revealSections.forEach((section) => {
        section.classList.add('scroll-reveal');
        revealObserver.observe(section);
    });
}

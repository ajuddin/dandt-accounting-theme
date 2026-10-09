/**
 * Mobile nav toggle and scroll-reveal.
 *
 * No framework. Scroll-reveal uses IntersectionObserver rather than a
 * scroll listener, and is skipped entirely under prefers-reduced-motion.
 */
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('dandt-header');
    const toggle = document.getElementById('dandt-nav-toggle');

    toggle?.addEventListener('click', () => {
        const isOpen = header.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const reveals = document.querySelectorAll('.dandt-reveal');

    if (reduceMotion || !('IntersectionObserver' in window)) {
        reveals.forEach(el => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    reveals.forEach(el => observer.observe(el));
});

/**
 * Mobile nav toggle, scroll-reveal, and service-page heading anchors.
 *
 * No framework. Scroll-reveal uses IntersectionObserver rather than a
 * scroll listener, and is skipped entirely under prefers-reduced-motion.
 */
document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('dandt-header');
    const toggle = document.getElementById('dandt-nav-toggle');

    // Service pages: give each .entry-content h2 an id matching its own
    // text, so the jump nav in single-service.php can link to it without
    // the content needing to set ids itself (it's plain Gutenberg output).
    document.querySelectorAll('.entry-content h2').forEach(heading => {
        if (heading.id) return;
        heading.id = heading.textContent
            .toLowerCase()
            .replace(/['’]/g, '')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '');
    });

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

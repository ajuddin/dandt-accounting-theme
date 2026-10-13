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

    initPackageFinder();
    initContactBar();
});

/**
 * Sitewide floating contact bar (WhatsApp / call / book a consultation).
 * Dismissal is remembered in localStorage (not sessionStorage) so a
 * visitor who closes it on one page doesn't see it reappear on the next
 * page, or on a later visit.
 */
function initContactBar() {
    const widget = document.getElementById('dandt-contact-bar');
    const closeBtn = document.getElementById('dandt-contact-bar-close');
    if (!widget || !closeBtn) return;

    const STORAGE_KEY = 'dandt-contact-bar-dismissed';

    if (localStorage.getItem(STORAGE_KEY) === '1') {
        widget.classList.add('is-dismissed');
        return;
    }

    closeBtn.addEventListener('click', () => {
        widget.classList.add('is-dismissed');
        localStorage.setItem(STORAGE_KEY, '1');
    });
}

/**
 * Pricing page "find your package" tool. Pure routing, not a quote - there
 * are no published prices yet (see page-pricing.php), so this only ever
 * points to the right service page(s) for the visitor's situation and ends
 * at the consultation booking CTA, never a fabricated figure.
 */
function initPackageFinder() {
    const root = document.querySelector('[data-package-finder]');
    if (!root) return;

    const SERVICES = {
        'new-business-starter': { title: 'New Business Starter Package', blurb: 'Structure guidance, HMRC registrations and bookkeeping set up right from day one.', url: '/services/new-business-starter/' },
        'startup-accounting': { title: 'Startup Accounting', blurb: 'Ongoing support built around a new business finding its feet.', url: '/services/startup-accounting/' },
        'company-formation': { title: 'Company Formation', blurb: 'Limited company registration done properly, with the right structure from the start.', url: '/services/company-formation/' },
        'sole-trader-accounting': { title: 'Sole Trader Accounting', blurb: 'Self Assessment and bookkeeping built around sole trader income.', url: '/services/sole-trader-accounting/' },
        'limited-company-accounting': { title: 'Limited Company Accounting', blurb: 'Statutory accounts, Corporation Tax and director guidance.', url: '/services/limited-company-accounting/' },
        'self-assessment-tax-returns': { title: 'Self Assessment Tax Returns', blurb: 'Your return prepared and filed accurately, with your tax position explained first.', url: '/services/self-assessment-tax-returns/' },
        'corporation-tax': { title: 'Corporation Tax', blurb: 'Corporation Tax computations and CT600 returns, with reliefs identified.', url: '/services/corporation-tax/' },
        'year-end-accounts': { title: 'Year-End Accounts', blurb: 'Statutory accounts prepared and filed with Companies House on time.', url: '/services/year-end-accounts/' },
        'vat-returns': { title: 'VAT Returns', blurb: 'Quarterly VAT returns prepared and filed under Making Tax Digital.', url: '/services/vat-returns/' },
        'payroll': { title: 'Payroll', blurb: 'Accurate payroll and auto-enrolment, run on schedule.', url: '/services/payroll/' },
        'management-accounts': { title: 'Management Accounts', blurb: 'A current view of profit and cash, not just a once-a-year snapshot.', url: '/services/management-accounts/' },
        'tax-planning': { title: 'Tax Planning', blurb: 'Forward-looking guidance on salary, dividends and reliefs.', url: '/services/tax-planning/' },
        'switching-accountants': { title: 'Switching Accountants', blurb: 'A clean handover with no gap in your filing.', url: '/services/switching-accountants/' },
    };

    const stageStep = root.querySelector('[data-pf-step="structure"]');
    const extrasStep = root.querySelector('[data-pf-step="extras"]');
    const resultsStep = root.querySelector('[data-pf-results]');
    const resultsGrid = root.querySelector('[data-pf-results-grid]');

    function recommend(stage, structure, extras) {
        const slugs = [];
        if (stage === 'switching') {
            slugs.push('switching-accountants');
            if (structure === 'sole-trader') slugs.push('sole-trader-accounting');
            if (structure === 'limited-company') slugs.push('limited-company-accounting');
        } else if (stage === 'starting') {
            slugs.push('startup-accounting');
            if (structure === 'limited-company') slugs.push('company-formation', 'limited-company-accounting');
            else if (structure === 'sole-trader') slugs.push('sole-trader-accounting');
            else slugs.push('new-business-starter');
        } else if (stage === 'ongoing') {
            if (structure === 'limited-company') slugs.push('limited-company-accounting', 'corporation-tax', 'year-end-accounts');
            else slugs.push('sole-trader-accounting', 'self-assessment-tax-returns');
        }
        if (extras.has('vat')) slugs.push('vat-returns');
        if (extras.has('payroll')) slugs.push('payroll');
        if (extras.has('management')) slugs.push('management-accounts');
        if (extras.has('planning')) slugs.push('tax-planning');
        return [...new Set(slugs)];
    }

    function renderResults() {
        const stage = root.querySelector('input[name="pf-stage"]:checked')?.value;
        const structure = root.querySelector('input[name="pf-structure"]:checked')?.value;
        const extras = new Set(
            [...root.querySelectorAll('input[name="pf-extra"]:checked')].map(el => el.value)
        );

        stageStep.hidden = !stage;
        if (!stage) {
            extrasStep.hidden = true;
            resultsStep.hidden = true;
            return;
        }

        extrasStep.hidden = !structure;
        if (!structure) {
            resultsStep.hidden = true;
            return;
        }

        const slugs = recommend(stage, structure, extras);
        resultsGrid.innerHTML = slugs
            .filter(slug => SERVICES[slug])
            .map(slug => {
                const s = SERVICES[slug];
                return `<article class="dandt-pf-result-card">
                    <h4>${s.title}</h4>
                    <p>${s.blurb}</p>
                    <a href="${s.url}">Learn more &rarr;</a>
                </article>`;
            })
            .join('');
        resultsStep.hidden = false;
    }

    root.addEventListener('change', renderResults);
}

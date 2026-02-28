(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const reducedMotion =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const revealOnce = (section) => {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = Array.from(section.querySelectorAll('.sr-item'));
    items.forEach((el, i) => {
      el.style.transitionDelay = reducedMotion ? '0ms' : `${i * STAGGER_MS}ms`;
      el.classList.add('is-revealed');
    });
  };

  if (reducedMotion) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        const section = entry.target;
        revealOnce(section);
        io.unobserve(section); // UNA sola vez por sección
      }
    },
    {
      threshold: 0.15,
      rootMargin: '0px 0px -10% 0px',
    }
  );

  sections.forEach((section) => io.observe(section));
})();

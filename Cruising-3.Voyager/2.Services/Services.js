/* =========================================================
   Reveal only (one-time per section)
   - Uses: [data-sr-reveal] + .sr-item + .is-revealed
   - Stagger handled by CSS delays (--sr-delay)
========================================================= */
(() => {
  const sections = document.querySelectorAll('[data-sr-reveal]');
  if (!sections.length) return;

  const revealSection = (section) => {
    const items = section.querySelectorAll('.sr-item');
    items.forEach(el => el.classList.add('is-revealed'));
  };

  // Fallback if IntersectionObserver is not supported
  if (!('IntersectionObserver' in window)) {
    sections.forEach(revealSection);
    return;
  }

  const revealed = new WeakSet();

  const io = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;

      const section = entry.target;
      if (revealed.has(section)) continue;

      revealed.add(section);
      revealSection(section);

      // one-time per section
      io.unobserve(section);
    }
  }, {
    threshold: 0.22,
    rootMargin: '0px 0px -10% 0px'
  });

  sections.forEach(section => io.observe(section));
})();

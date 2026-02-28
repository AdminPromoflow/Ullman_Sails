/* =========================
   Services.js — Reveal only (IntersectionObserver + stagger + PRM)
   - Ejecuta UNA sola vez por sección (sin atributos extra)
========================= */
(() => {
  const STAGGER_MS = 70;

  const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
  if (!sections.length) return;

  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealSection = (section) => {
    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (!items.length) return;

    for (let i = 0; i < items.length; i++) {
      const delay = prefersReduced ? 0 : (i * STAGGER_MS);
      items[i].style.setProperty("--sr-delay", `${delay}ms`);
      items[i].classList.add("is-revealed");
    }
  };

  // Si PRM, revelamos de una (sin IO)
  if (prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const revealedOnce = new WeakSet();

  const io = new IntersectionObserver((entries) => {
    for (const entry of entries) {
      if (!entry.isIntersecting) continue;

      const section = entry.target;
      if (revealedOnce.has(section)) {
        io.unobserve(section);
        continue;
      }

      revealedOnce.add(section);
      revealSection(section);
      io.unobserve(section); // UNA sola vez por sección
    }
  }, {
    root: null,
    threshold: 0.18,
    rootMargin: "0px 0px -10% 0px"
  });

  sections.forEach((section) => io.observe(section));
})();

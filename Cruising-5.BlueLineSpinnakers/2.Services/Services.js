/* =========================
   2.Services/Services.js
   Reveal only (UNA sola vez por sección)
========================= */
(() => {
  const STAGGER_MS = 70;
  const SECTIONS_SELECTOR = "[data-sr-reveal]";
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealOnce = (section) => {
    if (!section || section.dataset.srDone === "1") return;
    section.dataset.srDone = "1";

    const items = Array.from(section.querySelectorAll(".sr-item"));
    for (let i = 0; i < items.length; i++) {
      const el = items[i];
      const delay = prefersReduced ? 0 : i * STAGGER_MS;
      el.style.setProperty("--sr-delay", `${delay}ms`);
      el.classList.add("is-revealed");
    }
  };

  const sections = Array.from(document.querySelectorAll(SECTIONS_SELECTOR));
  if (sections.length === 0) return;

  if (!("IntersectionObserver" in window)) {
    sections.forEach(revealOnce);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;
        revealOnce(entry.target);
        io.unobserve(entry.target);
      }
    },
    { threshold: 0.15 }
  );

  sections.forEach((s) => io.observe(s));
})();

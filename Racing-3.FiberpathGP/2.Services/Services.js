/* =========================
   2.Services/Services.js
   Reveal only (una sola vez por sección)
========================= */
(() => {
  const STAGGER_MS = 70;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  const prefersReduced =
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const revealSection = (section) => {
    if (section.dataset.srDone === "1") return; // solo una vez
    section.dataset.srDone = "1";

    const items = section.querySelectorAll(".sr-item");
    items.forEach((el, i) => {
      el.style.setProperty("--sr-delay", prefersReduced ? "0ms" : `${i * STAGGER_MS}ms`);
      el.classList.add("is-revealed");
    });
  };

  // Si no hay IO o si reduce-motion, mostramos sin animar (pero respetando una sola vez)
  if (!("IntersectionObserver" in window) || prefersReduced) {
    sections.forEach(revealSection);
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        revealSection(entry.target);
        io.unobserve(entry.target); // se ejecuta una sola vez por sección
      });
    },
    { threshold: 0.2 }
  );

  sections.forEach((sec) => io.observe(sec));
})();

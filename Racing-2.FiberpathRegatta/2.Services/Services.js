(() => {
  "use strict";

  const STAGGER_MS = 70;

  const prefersReducedMotion = window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  // Si el usuario prefiere reducir movimiento, revelamos todo sin delays
  if (prefersReducedMotion) {
    sections.forEach((section) => {
      section.classList.add("is-revealed");
      const items = section.querySelectorAll(".sr-item");
      items.forEach((el) => el.style.removeProperty("--sr-delay"));
    });
    return;
  }

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const section = entry.target;

      // Ejecutar UNA sola vez por sección
      if (section.dataset.srDone === "1") {
        io.unobserve(section);
        return;
      }
      section.dataset.srDone = "1";

      const items = section.querySelectorAll(".sr-item");
      items.forEach((el, i) => {
        el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
      });

      section.classList.add("is-revealed");
      io.unobserve(section);
    });
  }, {
    threshold: 0.18,
    rootMargin: "0px 0px -10% 0px"
  });

  sections.forEach((section) => io.observe(section));
})();

/* =========================================
   Reveal only — IntersectionObserver + stagger
   - Ejecuta UNA sola vez por sección
   - Stagger: 70ms
   - Respeta prefers-reduced-motion
========================================= */

(function () {
  const STAGGER_MS = 70;

  const reduceMotion = window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function revealSectionOnce(section) {
    if (!section || section.dataset.srDone === "1") return;

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (items.length === 0) {
      section.dataset.srDone = "1";
      return;
    }

    // Mark as done so it won't run again for this section
    section.dataset.srDone = "1";

    // Apply delays (only when motion is allowed)
    if (!reduceMotion) {
      items.forEach((el, i) => {
        el.style.transitionDelay = (i * STAGGER_MS) + "ms";
      });
    } else {
      items.forEach((el) => {
        el.style.transitionDelay = "0ms";
      });
    }

    // Reveal
    requestAnimationFrame(() => {
      items.forEach((el) => el.classList.add("is-revealed"));
    });
  }

  function initReveal() {
    const sections = document.querySelectorAll("[data-sr-reveal]");
    if (!sections.length) return;

    // Reduced motion: reveal immediately (still once)
    if (reduceMotion) {
      sections.forEach(revealSectionOnce);
      return;
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const section = entry.target;

        revealSectionOnce(section);

        // Ensure it runs only once per section
        io.unobserve(section);
      });
    }, {
      root: null,
      threshold: 0.18,
      rootMargin: "0px 0px -10% 0px"
    });

    sections.forEach((sec) => io.observe(sec));
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initReveal, { once: true });
  } else {
    initReveal();
  }
})();

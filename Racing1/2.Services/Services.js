(() => {
  "use strict";

  const STAGGER_MS = 70;

  const prefersReduced = () =>
    window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function revealSectionOnce(section) {
    if (!section || section.dataset.srDone === "1") return;

    const items = Array.from(section.querySelectorAll(".sr-item"));
    if (items.length === 0) {
      section.dataset.srDone = "1";
      return;
    }

    if (prefersReduced()) {
      // Show instantly, no animation
      items.forEach((el) => el.classList.add("is-revealed"));
      section.dataset.srDone = "1";
      return;
    }

    items.forEach((el, i) => {
      el.style.setProperty("--sr-delay", `${i * STAGGER_MS}ms`);
      el.classList.add("is-revealed");
    });

    section.dataset.srDone = "1";
  }

  function initReveal() {
    const sections = Array.from(document.querySelectorAll("[data-sr-reveal]"));
    if (sections.length === 0) return;

    // Fallback
    if (!("IntersectionObserver" in window)) {
      sections.forEach(revealSectionOnce);
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const section = entry.target;
          revealSectionOnce(section);
          io.unobserve(section); // run once per section
        });
      },
      { threshold: 0.2, rootMargin: "0px 0px -10% 0px" }
    );

    sections.forEach((section) => io.observe(section));
  }

  // Script is loaded with "defer", but this is safe anyway.
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initReveal, { once: true });
  } else {
    initReveal();
  }
})();

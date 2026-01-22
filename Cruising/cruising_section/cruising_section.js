// =========================
// Cruising Section — reveal + parallax por scroll (REAL scroll event)
// =========================
(() => {
  const section = document.querySelector(".cruising-section");
  if (!section) return;

  const img = section.querySelector(".cruising-image img");
  if (!img) return;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduceMotion) {
    section.classList.add("is-visible");
    return;
  }

  // ---- Reveal ----
  const revealIO = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          section.classList.add("is-visible");
          revealIO.disconnect();
        }
      });
    },
    { threshold: 0.2 }
  );
  revealIO.observe(section);

  // ---- Scroll parallax (solo se actualiza al hacer scroll/resize) ----
  let ticking = false;

  function clamp(val, min, max) {
    return Math.max(min, Math.min(max, val));
  }

  function updateParallax() {
    ticking = false;

    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight;

    // Si está fuera de pantalla, lo dejamos “neutral”
    if (rect.bottom < 0 || rect.top > vh) {
      img.style.transform = "translate3d(0, 0px, 0) scale(1.08)";
      return;
    }

    // Progreso 0..1 mientras atraviesa el viewport
    const progress = (vh - rect.top) / (vh + rect.height);
    const p = clamp(progress, 0, 1);

    // Movimiento visible y elegante:
    // (-30px .. +30px aprox)
    const y = (0.5 - p) * 60;

    // Puedes subir este número si lo quieres más fuerte: 60 -> 80/100
    img.style.transform = `translate3d(0, ${y.toFixed(2)}px, 0) scale(1.08)`;
  }

  function onScroll() {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(updateParallax);
  }

  // ✅ Evento scroll (lo que pediste)
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll);

  // Si el usuario entra ya scrolleado, se ajusta en el primer scroll.
  // (Si quieres que se aplique apenas cargue SIN scroll, dime y lo activamos en load)
})();

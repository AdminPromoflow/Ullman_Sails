/* =========================================================
   Series Section — Scroll Parallax (TEXT + IMG)
   - No cambia tu layout
   - Solo anima elementos con data-sr-parallax-*
   ========================================================= */
console.log("✅ series_section.js loaded");
(() => {
  const sections = Array.from(document.querySelectorAll(".series-section"));
  if (!sections.length) return;

  const clamp = (v, min, max) => Math.min(max, Math.max(min, v));
  const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
  if (reduceMotion) return;

  function updateSection(section) {
    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight || 1;

    // Si está muy lejos del viewport, no gastes recursos
    if (rect.top > vh * 1.25 || rect.bottom < -vh * 0.25) return;

    // Progreso 0->1 cuando el top pasa por el viewport (estilo hero)
    const end = vh * 0.9;
    const p = clamp((0 - rect.top) / end, 0, 1);

    const texts = Array.from(section.querySelectorAll("[data-sr-parallax-text]"));
    const imgs  = Array.from(section.querySelectorAll("[data-sr-parallax-img]"));

    // ✅ TEXT: baja + fade out (stagger suave)
    texts.forEach((el, i) => {
      const local = clamp(p + i * 0.045, 0, 1);
      const y = local * 70;                 // baja
      const op = clamp(1 - local * 1.15, 0, 1);
      el.style.transform = `translate3d(0, ${y}px, 0)`;
      el.style.opacity = op;
    });

    // ✅ IMG: parallax suave hacia arriba (más lento que scroll)
    const imgY = -p * 55; // 35 suave, 55 medio, 80 fuerte
    imgs.forEach((img) => {
      img.style.transform = `translate3d(0, ${imgY}px, 0)`;
    });
  }

  function updateAll() {
    sections.forEach(updateSection);
  }

  let raf = 0;
  function onScroll() {
    if (raf) return;
    raf = requestAnimationFrame(() => {
      raf = 0;
      updateAll();
    });
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll);
  updateAll();
})();

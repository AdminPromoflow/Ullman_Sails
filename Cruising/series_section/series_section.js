/* =========================================================
   Series Section — Elegant Center-Focus Parallax (subtle)
   - Moderno, suave, sin desaparecer agresivo
   - Controla todo con CSS vars: --sr-o y --sr-p
   ========================================================= */
(() => {
  try {
    const sections = Array.from(document.querySelectorAll(".series-section"));
    if (!sections.length) return;

    const clamp = (v, min, max) => Math.min(max, Math.max(min, v));
    const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
    if (reduceMotion) return;

    function update() {
      const vh = window.innerHeight || 1;
      const viewportCenter = vh / 2;

      // rango de influencia: más grande = más sutil
      const range = vh * 0.70;

      for (const section of sections) {
        const rect = section.getBoundingClientRect();

        // performance: si está lejos del viewport, no calcular
        if (rect.top > vh * 1.35 || rect.bottom < -vh * 0.35) continue;

        const sectionCenter = rect.top + (rect.height / 2);
        const delta = sectionCenter - viewportCenter;

        // offset -1..1 (dirección arriba/abajo)
        const o = clamp(delta / range, -1, 1);

        // intensidad 0..1 (qué tan lejos del centro)
        const p = clamp(Math.abs(o), 0, 1);

        section.style.setProperty("--sr-o", o.toFixed(4));
        section.style.setProperty("--sr-p", p.toFixed(4));
      }
    }

    let raf = 0;
    function onScroll() {
      if (raf) return;
      raf = requestAnimationFrame(() => {
        raf = 0;
        update();
      });
    }

    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
    update();
  } catch (e) {
    console.error("Series parallax error:", e);
  }
})();

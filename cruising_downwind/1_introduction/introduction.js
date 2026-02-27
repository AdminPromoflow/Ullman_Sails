/* ============================================================================
  Downwind Intro — Basic Parallax
  (no HTML changes)
============================================================================ */

(() => {
  const section = document.querySelector(".sailing-types-introduction");
  if (!section) return;

  const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;
  if (reduceMotion) return;

  let ticking = false;

  const clamp = (n, min, max) => Math.max(min, Math.min(max, n));

  const update = () => {
    ticking = false;

    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight || 0;

    // Progreso del scroll cuando la sección cruza el viewport:
    // 0 cuando entra, 1 cuando sale.
    const progress = (vh - rect.top) / (vh + rect.height);
    const t = clamp(progress, 0, 1);

    // Convierte a rango -1..1 para mover hacia arriba/abajo
    const r = (t * 2) - 1;

    // Ajusta "fuerzas" (px). Valores suaves:
    const bgShift    = r * 22;   // fondo se mueve lento
    const logoShift  = r * -12;  // logo se mueve contrario
    const titleShift = r * -10;
    const textShift  = r * -6;

    section.style.setProperty("--p-bg", `${bgShift}px`);
    section.style.setProperty("--p-logo", `${logoShift}px`);
    section.style.setProperty("--p-title", `${titleShift}px`);
    section.style.setProperty("--p-text", `${textShift}px`);
  };

  const onScroll = () => {
    if (ticking) return;
    ticking = true;
    requestAnimationFrame(update);
  };

  // Init + listeners
  update();
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll, { passive: true });
})();

// Cruising - Sail Types slider (arrows + dots) - smooth wrap + no dead clicks
(() => {
  const section = document.querySelector(".sail-types-section");
  if (!section) return;

  const container = section.querySelector(".sail-types-container");
  const scroller  = section.querySelector(".sail-types-scroller-container");
  const boxes     = Array.from(section.querySelectorAll(".sail-types-box"));
  const dots      = Array.from(section.querySelectorAll(".sail-types-dot"));
  const btnLeft   = section.querySelector(".sail-types-arrow-left");
  const btnRight  = section.querySelector(".sail-types-arrow-right");

  if (!container || !scroller || boxes.length === 0) return;

  let index = 0;
  let currentX = 0; // track del translate real aplicado (para duraciones dinámicas)

  const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;

  function getStep() {
    const box = boxes[0];
    const styles = window.getComputedStyle(box);
    const ml = parseFloat(styles.marginLeft) || 0;
    const mr = parseFloat(styles.marginRight) || 0;
    return box.offsetWidth + ml + mr;
  }

  function getMaxTranslate() {
    return Math.max(0, scroller.scrollWidth - container.clientWidth);
  }

  // translateX real (con clamp)
  function getTranslateX(i) {
    const raw = i * getStep();
    return Math.min(raw, getMaxTranslate());
  }

  function nearlyEqual(a, b) {
    return Math.abs(a - b) < 1; // tolerancia por decimales
  }

  function setActiveDot(i) {
    if (!dots.length) return;
    dots.forEach((d) => d.classList.remove("is-active"));
    if (dots[i]) dots[i].classList.add("is-active");
  }

  function setDynamicDuration(fromX, toX, isWrap) {
    if (reduceMotion) {
      scroller.style.transitionDuration = "0ms";
      return;
    }

    const dist = Math.abs(toX - fromX);
    let ms = Math.min(900, Math.max(350, (dist / 1000) * 600));
    if (isWrap) ms = Math.min(1100, ms + 200);

    scroller.style.transitionDuration = `${Math.round(ms)}ms`;
  }

  function applyTransform(i, animate = true, isWrap = false) {
    const toX = getTranslateX(i);
    const fromX = currentX;

    if (!animate) {
      scroller.classList.add("no-transition");
      scroller.style.transform = `translateX(${-toX}px)`;
      scroller.offsetWidth; // reflow
      scroller.classList.remove("no-transition");
      currentX = toX;
      return;
    }

    setDynamicDuration(fromX, toX, isWrap);
    scroller.style.transform = `translateX(${-toX}px)`;
    currentX = toX;
  }

  function goTo(i, { wrap = false } = {}) {
    const max = boxes.length - 1;

    let target = i;
    if (target < 0) target = max;
    if (target > max) target = 0;

    index = target;
    applyTransform(index, true, wrap);
    setActiveDot(index);
  }

  // Arrow Right: salta índices que no mueven y si ya estás al final real => wrap a 0
  if (btnRight) {
    btnRight.addEventListener("click", () => {
      const max = boxes.length - 1;
      const curX = getTranslateX(index);

      let next = index + 1;

      if (next > max) return goTo(0, { wrap: true });

      while (next <= max && nearlyEqual(getTranslateX(next), curX)) next++;

      if (next > max) goTo(0, { wrap: true });
      else goTo(next);
    });
  }

  // Arrow Left: salta índices que no mueven y si ya estás al inicio real => wrap al final
  if (btnLeft) {
    btnLeft.addEventListener("click", () => {
      const max = boxes.length - 1;
      const curX = getTranslateX(index);

      let prev = index - 1;

      if (prev < 0) return goTo(max, { wrap: true });

      while (prev >= 0 && nearlyEqual(getTranslateX(prev), curX)) prev--;

      if (prev < 0) goTo(max, { wrap: true });
      else goTo(prev);
    });
  }

  // Dots
  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const i = Number(dot.getAttribute("data-index"));
      if (!Number.isNaN(i)) goTo(i);
    });
  });

  // Resize
  window.addEventListener("resize", () => {
    applyTransform(index, false);
    setActiveDot(index);
  });

  // Init (sin animación)
  applyTransform(0, false);
  setActiveDot(0);
})();


// =========================
// Sail Types — Parallax (title + subtitle + images) by scroll
// =========================
(() => {
  const section = document.querySelector(".sail-types-section");
  if (!section) return;

  const title = section.querySelector("h2");
  const subtitle = section.querySelector(".sail-types-subtitle");
  const images = Array.from(section.querySelectorAll(".sail-types-box img"));

  const reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;

  // Si reduce motion: deja todo quieto
  if (reduceMotion) {
    if (title) title.style.transform = "";
    if (subtitle) subtitle.style.transform = "";
    images.forEach((img) => (img.style.transform = ""));
    return;
  }

  const clamp = (v, min, max) => Math.min(max, Math.max(min, v));
  let raf = 0;

  function update() {
    raf = 0;

    const rect = section.getBoundingClientRect();
    const vh = window.innerHeight || document.documentElement.clientHeight;

    // Solo anima cuando el bloque está cerca del viewport
    const inView = rect.bottom > -120 && rect.top < vh + 120;
    if (!inView) return;

    // Distancia del centro de la sección al centro del viewport
    const sectionCenter = rect.top + rect.height * 0.5;
    const viewportCenter = vh * 0.5;
    const delta = sectionCenter - viewportCenter;

    // Normaliza a [-1..1] (suave y estable)
    const denom = (vh * 0.5 + rect.height * 0.5) || 1;
    const n = clamp(delta / denom, -1, 1);

    // “Cerca del centro” => 1, lejos => 0
    const proximity = 1 - Math.abs(n);

    // Ajustes de profundidad (puedes subir/bajar estos números)
    const titleY = clamp(n * -26, -26, 26);
    const subY   = clamp(n * -16, -16, 16);

    const imgBaseY = clamp(n * 22, -22, 22);
    const imgBaseX = clamp(n * 8, -8, 8);

    // Escala muy suave (más cerca del centro = un pelín más grande)
    const scale = 1 + (proximity * .14);

    if (title) {
      title.style.transform = `translate3d(0, ${titleY.toFixed(2)}px, 0)`;
    }

    if (subtitle) {
      subtitle.style.transform = `translate3d(0, ${subY.toFixed(2)}px, 0)`;
    }

    // Imágenes: mismo parallax, pero con ligera variación por índice (depth)
    images.forEach((img, i) => {
      const depth = 0.82 + (i * 0.05); // 0.82.. (suave)
      const x = imgBaseX * depth;
      const y = imgBaseY * depth;

      img.style.transform =
        `translate3d(${x.toFixed(2)}px, ${y.toFixed(2)}px, 0) scale(${scale.toFixed(4)})`;
    });
  }

  function requestTick() {
    if (raf) return;
    raf = window.requestAnimationFrame(update);
  }

  window.addEventListener("scroll", requestTick, { passive: true });
  window.addEventListener("resize", requestTick);

  // Init
  update();
})();

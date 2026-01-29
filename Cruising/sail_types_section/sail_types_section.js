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
    dots.forEach((d) => d.classList.remove("is-active"));
    if (dots[i]) dots[i].classList.add("is-active");
  }

  function setDynamicDuration(fromX, toX, isWrap) {
    if (reduceMotion) {
      scroller.style.transitionDuration = "0ms";
      return;
    }

    const dist = Math.abs(toX - fromX);
    // duración según distancia (cap), y un poquito más si es wrap
    let ms = Math.min(900, Math.max(350, (dist / 1000) * 600));
    if (isWrap) ms = Math.min(1100, ms + 200);

    scroller.style.transitionDuration = `${Math.round(ms)}ms`;
  }

  function applyTransform(i, animate = true, isWrap = false) {
    const toX = getTranslateX(i);
    const fromX = getTranslateX(index);

    if (!animate) {
      scroller.classList.add("no-transition");
      scroller.style.transform = `translateX(${-toX}px)`;
      scroller.offsetWidth; // reflow
      scroller.classList.remove("no-transition");
      return;
    }

    setDynamicDuration(fromX, toX, isWrap);
    scroller.style.transform = `translateX(${-toX}px)`;
  }

  // goTo con control de wrap smooth
  function goTo(i, { wrap = false } = {}) {
    const max = boxes.length - 1;

    let target = i;
    if (target < 0) target = max;
    if (target > max) target = 0;

    // importante: animamos desde el index actual hacia target
    const prevIndex = index;
    index = target;

    applyTransform(index, true, wrap);
    setActiveDot(index);

    // si por alguna razón no cambió visualmente, al menos no dejes dots raros
    if (nearlyEqual(getTranslateX(prevIndex), getTranslateX(index))) {
      // mantiene coherencia; no hace nada extra
    }
  }

  // ---- Arrow Right: salta índices que no mueven y si ya estás al final real => wrap smooth a 0
  if (btnRight) {
    btnRight.addEventListener("click", () => {
      const max = boxes.length - 1;
      const curX = getTranslateX(index);

      let next = index + 1;

      // si se pasó, wrap directo
      if (next > max) return goTo(0, { wrap: true });

      // saltar índices que no cambian el translate (dead clicks)
      while (next <= max && nearlyEqual(getTranslateX(next), curX)) next++;

      // si no hay más movimiento real, wrap al inicio (smooth)
      if (next > max) goTo(0, { wrap: true });
      else goTo(next);
    });
  }

  // ---- Arrow Left: salta índices que no mueven y si ya estás al inicio real => wrap smooth al final
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
    scroller.style.transitionDuration = "0ms";
    scroller.classList.add("no-transition");
    scroller.style.transform = `translateX(${-getTranslateX(index)}px)`;
    scroller.offsetWidth;
    scroller.classList.remove("no-transition");
    setActiveDot(index);
  });

  // Init (sin animación)
  scroller.style.transitionDuration = "0ms";
  scroller.classList.add("no-transition");
  scroller.style.transform = `translateX(0px)`;
  scroller.offsetWidth;
  scroller.classList.remove("no-transition");
  setActiveDot(0);
})();

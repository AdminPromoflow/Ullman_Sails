/* =========================
   sail_types_section.js — COPY & PASTE
   (tu slider + Reveal only)
========================= */

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

  function getTranslateX(i) {
    const raw = i * getStep();
    return Math.min(raw, getMaxTranslate());
  }

  function nearlyEqual(a, b) {
    return Math.abs(a - b) < 1;
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
      scroller.offsetWidth;
      scroller.classList.remove("no-transition");
      return;
    }

    setDynamicDuration(fromX, toX, isWrap);
    scroller.style.transform = `translateX(${-toX}px)`;
  }

  function goTo(i, { wrap = false } = {}) {
    const max = boxes.length - 1;

    let target = i;
    if (target < 0) target = max;
    if (target > max) target = 0;

    const prevIndex = index;
    index = target;

    applyTransform(index, true, wrap);
    setActiveDot(index);

    if (nearlyEqual(getTranslateX(prevIndex), getTranslateX(index))) {
      // coherencia sin extras
    }
  }

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

  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const i = Number(dot.getAttribute("data-index"));
      if (!Number.isNaN(i)) goTo(i);
    });
  });

  window.addEventListener("resize", () => {
    scroller.style.transitionDuration = "0ms";
    scroller.classList.add("no-transition");
    scroller.style.transform = `translateX(${-getTranslateX(index)}px)`;
    scroller.offsetWidth;
    scroller.classList.remove("no-transition");
    setActiveDot(index);
  });

  scroller.style.transitionDuration = "0ms";
  scroller.classList.add("no-transition");
  scroller.style.transform = `translateX(0px)`;
  scroller.offsetWidth;
  scroller.classList.remove("no-transition");
  setActiveDot(0);
})();


// =========================
// Reveal only (IntersectionObserver + stagger 70ms + prefers-reduced-motion)
// - ejecuta UNA sola vez por sección
// =========================
(() => {
  const STAGGER_MS = 70;
  const reduce = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches;

  const sections = document.querySelectorAll("[data-sr-reveal]");
  if (!sections.length) return;

  function collectOrderedItems(section) {
    const ordered = [];

    const pushIf = (el) => {
      if (!el) return;
      if (!el.classList || !el.classList.contains("sr-item")) return;
      if (ordered.includes(el)) return;
      ordered.push(el);
    };

    // Orden (no lo diste): 1) título 2) subtítulo 3) flechas 4) boxes
    pushIf(section.querySelector(".sail-types-title"));
    pushIf(section.querySelector(".sail-types-subtitle"));
    section.querySelectorAll(".sail-types-arrow.sr-item").forEach(pushIf);
    section.querySelectorAll(".sail-types-box.sr-item").forEach(pushIf);

    // Fallback por si agregas más sr-items después
    section.querySelectorAll(".sr-item").forEach(pushIf);

    return ordered;
  }

  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const section = entry.target;

      // Una sola vez por sección
      if (section.dataset.srDone === "1") {
        io.unobserve(section);
        return;
      }
      section.dataset.srDone = "1";

      const items = collectOrderedItems(section);

      items.forEach((el, i) => {
        const delay = reduce ? 0 : i * STAGGER_MS;
        // delays por CSS var
        el.style.setProperty("--sr-delay", `${delay}ms`);
      });

      requestAnimationFrame(() => {
        items.forEach((el) => el.classList.add("is-revealed"));
      });

      io.unobserve(section);
    });
  }, { threshold: 0.22, rootMargin: "0px 0px -10% 0px" });

  sections.forEach((section) => {
    if (section.dataset.srDone === "1") return;
    io.observe(section);
  });
})();

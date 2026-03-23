// Slider.js
class HomeSlider {
  constructor(rootSelector = ".home-slider", options = {}) {
    this.root = document.querySelector(rootSelector);
    if (!this.root) return;

    this.track = this.root.querySelector("#homeSliderTrack");
    this.btnPrev = this.root.querySelector("#homeSliderPrev");
    this.btnNext = this.root.querySelector("#homeSliderNext");
    if (!this.track) return;

    this.intervalMs = options.intervalMs ?? 8000;
    this.reduceMotion =
      window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches ?? false;

    this.slides = Array.from(this.track.querySelectorAll(".home-slider__slide"));
    this.total = this.slides.length;

    this.hasClones =
      this.total >= 3 &&
      this.slides[0]?.dataset.clone === "last" &&
      this.slides[this.total - 1]?.dataset.clone === "first";

    this.index = this.hasClones ? 1 : 0;

    this.isAnimating = false;
    this.paused = false;
    this.timer = null;
    this.resizeTimer = null;

    this.updateMetrics();
    this.bind();

    // Initial position
    this.jumpTo(this.index, { animateCaption: true });

    // Autoplay
    if (!this.reduceMotion) this.start();
  }

  updateMetrics() {
    this.slideW = this.root.getBoundingClientRect().width || window.innerWidth;
  }

  getSlide(i) {
    return this.slides[i] ?? null;
  }

  getCaptionNodes(slide) {
    if (!slide) return [];
    return Array.from(slide.querySelectorAll(".home-slider__caption > *"));
  }

  resetCaptionStyles(slide) {
    const nodes = this.getCaptionNodes(slide);
    nodes.forEach((node) => {
      node.style.animation = "";
      node.style.opacity = "";
      node.style.transform = "";
    });
  }

  showCaptionInstant(slide) {
    const nodes = this.getCaptionNodes(slide);
    nodes.forEach((node) => {
      node.style.animation = "none";
      node.style.opacity = "1";
      node.style.transform = "translateY(0)";
    });
  }

  setTransition(on) {
    if (this.reduceMotion) {
      this.track.style.transition = "none";
      return;
    }

    this.track.style.transition = on
      ? "transform .9s cubic-bezier(.2,.9,.2,1)"
      : "none";
  }

  applyTransform() {
    this.track.style.transform = `translate3d(${-this.index * this.slideW}px, 0, 0)`;
  }

  setActive({ animate = true } = {}) {
    this.slides.forEach((slide) => {
      slide.classList.remove("is-active");
      this.resetCaptionStyles(slide);
    });

    const active = this.getSlide(this.index);
    if (!active) return;

    if (!animate) {
      this.showCaptionInstant(active);
    } else {
      void active.offsetWidth; // restart caption animation cleanly
    }

    active.classList.add("is-active");
  }

  jumpTo(i, { animateCaption = true } = {}) {
    this.index = i;
    this.setTransition(false);
    this.applyTransform();
    void this.track.offsetHeight; // force reflow
    this.setTransition(true);
    this.setActive({ animate: animateCaption });
    this.isAnimating = false;
  }

  goTo(i) {
    if (this.total < 2) return;

    if (this.reduceMotion) {
      if (this.hasClones) {
        if (i <= 0) i = this.total - 2;
        if (i >= this.total - 1) i = 1;
      } else {
        if (i < 0) i = this.total - 1;
        if (i > this.total - 1) i = 0;
      }

      this.index = i;
      this.setTransition(false);
      this.applyTransform();
      this.setActive({ animate: false });
      return;
    }

    if (this.isAnimating) return;
    this.isAnimating = true;

    this.index = i;

    const targetSlide = this.getSlide(this.index);
    const isCloneTarget = Boolean(targetSlide?.dataset.clone);

    this.setTransition(true);
    this.applyTransform();

    // Do not animate captions on clone slides
    this.setActive({ animate: !isCloneTarget });
  }

  next() {
    this.goTo(this.index + 1);
  }

  prev() {
    this.goTo(this.index - 1);
  }

  fixLoopIfNeeded() {
    if (!this.hasClones) return;

    // If we land on the cloned last slide, jump silently to the real last slide
    if (this.index === 0) {
      this.jumpTo(this.total - 2, { animateCaption: false });
      return;
    }

    // If we land on the cloned first slide, jump silently to the real first slide
    if (this.index === this.total - 1) {
      this.jumpTo(1, { animateCaption: false });
    }
  }

  bind() {
    this.btnNext?.addEventListener("click", () => this.next());
    this.btnPrev?.addEventListener("click", () => this.prev());

    this.track.addEventListener("transitionend", (e) => {
      if (e.target !== this.track) return;
      if (e.propertyName !== "transform") return;

      this.fixLoopIfNeeded();
      this.isAnimating = false;
    });

    // Pause on hover
    this.root.addEventListener("mouseenter", () => {
      this.paused = true;
    });

    this.root.addEventListener("mouseleave", () => {
      this.paused = false;
    });

    // Pause when any control inside the slider gets focus
    this.root.addEventListener("focusin", () => {
      this.paused = true;
    });

    this.root.addEventListener("focusout", (e) => {
      if (!this.root.contains(e.relatedTarget)) {
        this.paused = false;
      }
    });

    // Pause when tab is hidden
    document.addEventListener("visibilitychange", () => {
      this.paused = document.hidden;
    });

    // Resize
    window.addEventListener("resize", () => {
      clearTimeout(this.resizeTimer);
      this.resizeTimer = setTimeout(() => {
        this.updateMetrics();
        this.jumpTo(this.index, { animateCaption: false });
      }, 120);
    });

    // Keyboard support
    this.root.setAttribute("tabindex", "0");
    this.root.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") {
        e.preventDefault();
        this.next();
      }

      if (e.key === "ArrowLeft") {
        e.preventDefault();
        this.prev();
      }
    });
  }

  start() {
    this.stop();

    this.timer = setInterval(() => {
      if (!this.paused) this.next();
    }, this.intervalMs);
  }

  stop() {
    if (this.timer) clearInterval(this.timer);
    this.timer = null;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new HomeSlider(".home-slider", { intervalMs: 8000 });
});

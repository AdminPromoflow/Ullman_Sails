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

    this.slideData = this.slides.map((slide) => ({
      el: slide,
      isClone: Boolean(slide.dataset.clone),
    }));

    this.updateMetrics();
    this.bind();

    // Initial render
    this.render({
      useTransition: false,
      animateCaption: false,
    });

    // Autoplay
    if (!this.reduceMotion) this.start();
  }

  updateMetrics() {
    this.slideW = this.root.getBoundingClientRect().width || window.innerWidth;
  }

  setTransition(enabled) {
    this.track.style.transition =
      enabled && !this.reduceMotion
        ? "transform .9s cubic-bezier(.2,.9,.2,1)"
        : "none";
  }

  applyTransform() {
    this.track.style.transform = `translate3d(${-this.index * this.slideW}px, 0, 0)`;
  }

  clearSlides() {
    this.slideData.forEach(({ el }) => {
      el.classList.remove("is-active");
      el.dataset.animate = "false";
    });
  }

  render({ useTransition = true, animateCaption = true } = {}) {
    const current = this.slideData[this.index];
    if (!current) return;

    this.clearSlides();
    this.setTransition(useTransition);
    this.applyTransform();

    // Force reflow so CSS animation can restart cleanly
    void this.track.offsetHeight;

    current.el.dataset.animate =
      animateCaption && !this.reduceMotion ? "true" : "false";

    current.el.classList.add("is-active");
  }

  goTo(targetIndex) {
    if (this.total < 2 || this.isAnimating) return;

    if (this.reduceMotion) {
      if (this.hasClones) {
        if (targetIndex <= 0) targetIndex = this.total - 2;
        if (targetIndex >= this.total - 1) targetIndex = 1;
      } else {
        if (targetIndex < 0) targetIndex = this.total - 1;
        if (targetIndex > this.total - 1) targetIndex = 0;
      }

      this.index = targetIndex;
      this.render({
        useTransition: false,
        animateCaption: false,
      });
      return;
    }

    this.index = targetIndex;

    const targetSlide = this.slideData[this.index];
    const animateCaption = !targetSlide?.isClone;

    this.isAnimating = true;

    this.render({
      useTransition: true,
      animateCaption,
    });
  }

  next() {
    this.goTo(this.index + 1);
  }

  prev() {
    this.goTo(this.index - 1);
  }

  fixLoopIfNeeded() {
    if (!this.hasClones) {
      this.isAnimating = false;
      return;
    }

    // Jump from cloned last -> real last
    if (this.index === 0) {
      this.index = this.total - 2;
      this.render({
        useTransition: false,
        animateCaption: false,
      });
      this.isAnimating = false;
      return;
    }

    // Jump from cloned first -> real first
    if (this.index === this.total - 1) {
      this.index = 1;
      this.render({
        useTransition: false,
        animateCaption: false,
      });
      this.isAnimating = false;
      return;
    }

    this.isAnimating = false;
  }

  bind() {
    this.btnNext?.addEventListener("click", () => this.next());
    this.btnPrev?.addEventListener("click", () => this.prev());

    this.track.addEventListener("transitionend", (e) => {
      if (e.target !== this.track) return;
      if (e.propertyName !== "transform") return;
      this.fixLoopIfNeeded();
    });

    this.root.addEventListener("mouseenter", () => {
      this.paused = true;
    });

    this.root.addEventListener("mouseleave", () => {
      this.paused = false;
    });

    this.root.addEventListener("focusin", () => {
      this.paused = true;
    });

    this.root.addEventListener("focusout", (e) => {
      if (!this.root.contains(e.relatedTarget)) {
        this.paused = false;
      }
    });

    document.addEventListener("visibilitychange", () => {
      this.paused = document.hidden;
    });

    window.addEventListener("resize", () => {
      clearTimeout(this.resizeTimer);

      this.resizeTimer = setTimeout(() => {
        this.updateMetrics();
        this.render({
          useTransition: false,
          animateCaption: false,
        });
      }, 120);
    });

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

// Slider.js
class HomeSlider {
  constructor(rootSelector = ".home-slider", options = {}) {
    this.root = document.querySelector(rootSelector);
    if (!this.root) return;

    this.track   = this.root.querySelector("#homeSliderTrack");
    this.btnPrev = this.root.querySelector("#homeSliderPrev");
    this.btnNext = this.root.querySelector("#homeSliderNext");
    if (!this.track) return;

    this.intervalMs   = options.intervalMs ?? 8000;
    this.reduceMotion = window.matchMedia?.("(prefers-reduced-motion: reduce)")?.matches ?? false;

    this.slides = Array.from(this.track.querySelectorAll(".home-slider__slide"));
    this.total  = this.slides.length;

    this.hasClones =
      this.total >= 3 &&
      this.slides[0]?.dataset.clone === "last" &&
      this.slides[this.total - 1]?.dataset.clone === "first";

    this.index = this.hasClones ? 1 : 0;

    this.isAnimating = false;
    this.paused = false;
    this.timer = null;

    this.updateMetrics();
    this.bind();

    // Initial position without animation
    this.jumpTo(this.index);

    // Autoplay
    if (!this.reduceMotion) this.start();
  }

  updateMetrics() {
    this.slideW = this.root.getBoundingClientRect().width || window.innerWidth;
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

  setActive() {
    this.slides.forEach((slide) => slide.classList.remove("is-active"));

    const active = this.slides[this.index];
    if (!active) return;

    void active.offsetWidth; // Restart caption animations
    active.classList.add("is-active");
  }

  jumpTo(i) {
    this.index = i;
    this.setTransition(false);
    this.applyTransform();
    this.track.offsetHeight; // Reflow
    this.setTransition(true);
    this.setActive();
    this.isAnimating = false;
  }

  goTo(i) {
    if (this.total < 2) return;

    // Reduced motion: always move instantly
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
      this.setActive();
      this.isAnimating = false;
      return;
    }

    if (this.isAnimating) return;

    // If the target is clone 0 or clone 9, jump directly with no animation
    if (this.hasClones) {
      if (i <= 0) {
        this.jumpTo(this.total - 2); // Last real slide
        return;
      }

      if (i >= this.total - 1) {
        this.jumpTo(1); // First real slide
        return;
      }
    } else {
      if (i < 0) i = this.total - 1;
      if (i > this.total - 1) i = 0;
    }

    this.isAnimating = true;
    this.index = i;
    this.setTransition(true);
    this.applyTransform();
    this.setActive();
  }

  next() {
    this.goTo(this.index + 1);
  }

  prev() {
    this.goTo(this.index - 1);
  }

  bind() {
    this.btnNext?.addEventListener("click", () => this.next());
    this.btnPrev?.addEventListener("click", () => this.prev());

    this.track.addEventListener("transitionend", (e) => {
      if (e.propertyName !== "transform") return;
      this.isAnimating = false;
    });

    // Pause on hover / focus
    this.root.addEventListener("mouseenter", () => {
      this.paused = true;
    });

    this.root.addEventListener("mouseleave", () => {
      this.paused = false;
    });

    this.root.addEventListener("focusin", () => {
      this.paused = true;
    });

    this.root.addEventListener("focusout", () => {
      this.paused = false;
    });

    // Pause when the tab is hidden
    document.addEventListener("visibilitychange", () => {
      this.paused = document.hidden;
    });

    // Resize handler
    let resizeTimer = null;

    window.addEventListener("resize", () => {
      clearTimeout(resizeTimer);

      resizeTimer = setTimeout(() => {
        this.updateMetrics();
        this.jumpTo(this.index);
      }, 120);
    });

    // Keyboard support
    this.root.setAttribute("tabindex", "0");

    this.root.addEventListener("keydown", (e) => {
      if (e.key === "ArrowRight") this.next();
      if (e.key === "ArrowLeft") this.prev();
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

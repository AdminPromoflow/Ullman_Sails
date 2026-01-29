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

    this.currentIndex = this.hasClones ? 1 : 0;
    this.slideWidth   = 100;
    this.isAnimating  = false;
    this.autoplayTimer = null;

    this.init();
  }

  init() {
    this.setupEventListeners();
    this.goToSlide(this.currentIndex, false);
    this.startAutoplay();
  }

  setupEventListeners() {
    this.btnPrev?.addEventListener("click", () => this.prev());
    this.btnNext?.addEventListener("click", () => this.next());

    this.root.addEventListener("mouseenter", () => this.stopAutoplay());
    this.root.addEventListener("mouseleave", () => this.startAutoplay());

    document.addEventListener("visibilitychange", () => {
      document.hidden ? this.stopAutoplay() : this.startAutoplay();
    });
  }

  goToSlide(index, animate = true) {
    if (this.isAnimating || index === this.currentIndex) return;

    this.isAnimating = true;
    this.currentIndex = index;

    const offset = -index * this.slideWidth;
    const duration = animate && !this.reduceMotion ? "0.6s" : "0s";

    this.track.style.transition = `transform ${duration} cubic-bezier(0.25, 0.46, 0.45, 0.94)`;
    this.track.style.transform = `translateX(${offset}%)`;

    setTimeout(() => {
      this.handleInfiniteLoop();
      this.isAnimating = false;
    }, animate && !this.reduceMotion ? 600 : 0);
  }

  handleInfiniteLoop() {
    if (!this.hasClones) return;

    if (this.currentIndex === 0) {
      // Estamos en el clon del último slide
      this.track.style.transition = "none";
      this.currentIndex = this.total - 2; // Ir al último real
      this.track.style.transform = `translateX(${-this.currentIndex * this.slideWidth}%)`;
    } else if (this.currentIndex === this.total - 1) {
      // Estamos en el clon del primer slide
      this.track.style.transition = "none";
      this.currentIndex = 1; // Ir al primer real
      this.track.style.transform = `translateX(${-this.currentIndex * this.slideWidth}%)`;
    }
  }

  next() {
    const nextIndex = this.currentIndex + 1;
    this.goToSlide(nextIndex);
  }

  prev() {
    const prevIndex = this.currentIndex - 1;
    this.goToSlide(prevIndex);
  }

  startAutoplay() {
    this.stopAutoplay();
    if (!this.reduceMotion) {
      this.autoplayTimer = setInterval(() => this.next(), this.intervalMs);
    }
  }

  stopAutoplay() {
    if (this.autoplayTimer) {
      clearInterval(this.autoplayTimer);
      this.autoplayTimer = null;
    }
  }

  destroy() {
    this.stopAutoplay();
    this.btnPrev?.removeEventListener("click", this.prev);
    this.btnNext?.removeEventListener("click", this.next);
  }
}

// Inicializar cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", () => {
  new HomeSlider(".home-slider", {
    intervalMs: 8000
  });
});

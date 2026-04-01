// File: cruising_navigator/5_cloth_and_construction/cloth_and_construction.js

(() => {
  'use strict';

  const prefersReducedMotion =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function ensureDots(rotator, count) {
    const dotsWrap = rotator.querySelector('.nav-rotator__dots');
    if (!dotsWrap) return [];

    const existing = Array.from(dotsWrap.querySelectorAll('.nav-rotator__dot'));

    // Rebuild the dots if the quantity does not match the number of images.
    if (existing.length !== count) {
      dotsWrap.innerHTML = '';

      for (let i = 0; i < count; i++) {
        const dot = document.createElement('span');
        dot.className = 'nav-rotator__dot' + (i === 0 ? ' is-active' : '');
        dotsWrap.appendChild(dot);
      }
    }

    return Array.from(dotsWrap.querySelectorAll('.nav-rotator__dot'));
  }

  function initRotator(rotator) {
    // Prevent double initialisation.
    if (rotator.dataset.rotatorReady === '1') return;
    rotator.dataset.rotatorReady = '1';

    const interval = Number(rotator.getAttribute('data-interval')) || 3000;

    const images = Array.from(rotator.querySelectorAll('.nav-rotator__img'));
    const capSub = rotator.querySelector('.nav-rotator__capSub');

    if (!images.length || !capSub) return;

    const dots = ensureDots(rotator, images.length);

    let index = images.findIndex((img) => img.classList.contains('is-active'));
    if (index < 0) index = 0;

    let timer = null;
    let captionTimer = null;

    function syncState() {
      for (let i = 0; i < images.length; i++) {
        images[i].classList.toggle('is-active', i === index);
      }

      for (let i = 0; i < dots.length; i++) {
        dots[i].classList.toggle('is-active', i === index);
      }

      capSub.textContent = images[index].getAttribute('data-sub') || '';
    }

    function setActive(nextIndex) {
      const previousIndex = index;
      index = (nextIndex + images.length) % images.length;

      if (previousIndex === index) return;

      images[previousIndex]?.classList.remove('is-active');
      images[index]?.classList.add('is-active');

      dots[previousIndex]?.classList.remove('is-active');
      dots[index]?.classList.add('is-active');

      const nextLabel = images[index].getAttribute('data-sub') || '';

      if (captionTimer) {
        window.clearTimeout(captionTimer);
        captionTimer = null;
      }

      if (!prefersReducedMotion) {
        capSub.classList.add('is-fading');
      }

      captionTimer = window.setTimeout(() => {
        capSub.textContent = nextLabel;

        if (!prefersReducedMotion) {
          capSub.classList.remove('is-fading');
        }
      }, prefersReducedMotion ? 0 : 140);
    }

    function start() {
      if (timer || images.length <= 1) return;
      timer = window.setInterval(() => {
        setActive(index + 1);
      }, interval);
    }

    function stop() {
      if (!timer) return;
      window.clearInterval(timer);
      timer = null;
    }

    // Force the initial visible state.
    syncState();

    // Start automatic rotation.
    start();

    // Pause on hover/focus.
    rotator.addEventListener('mouseenter', stop);
    rotator.addEventListener('mouseleave', start);
    rotator.addEventListener('focusin', stop);
    rotator.addEventListener('focusout', start);

    // Optional: allow clicking the dots to jump to an image.
    dots.forEach((dot, dotIndex) => {
      dot.addEventListener('click', () => {
        stop();
        setActive(dotIndex);
        start();
      });
    });
  }

  function initAllRotators() {
    const rotators = document.querySelectorAll('.nav-rotator');
    rotators.forEach(initRotator);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAllRotators, { once: true });
  } else {
    initAllRotators();
  }
})();

/* =========================
   Reveal only
   - IntersectionObserver + stagger + prefers-reduced-motion
   - Executes once per section
========================= */
(() => {
  'use strict';

  const STAGGER_MS = 70;
  const prefersReducedMotion =
    window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function revealSection(section) {
    if (section.dataset.srDone === '1') return;
    section.dataset.srDone = '1';

    const items = Array.from(section.querySelectorAll('.sr-item'));

    for (let i = 0; i < items.length; i++) {
      items[i].style.setProperty(
        '--sr-delay',
        prefersReducedMotion ? '0ms' : `${i * STAGGER_MS}ms`
      );
    }

    requestAnimationFrame(() => {
      for (let i = 0; i < items.length; i++) {
        items[i].classList.add('is-revealed');
      }
    });
  }

  function initReveal() {
    const sections = Array.from(document.querySelectorAll('[data-sr-reveal]'));
    if (!sections.length) return;

    if (prefersReducedMotion) {
      sections.forEach(revealSection);
      return;
    }

    if (!('IntersectionObserver' in window)) {
      sections.forEach(revealSection);
      return;
    }

    const io = new IntersectionObserver((entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) continue;

        const section = entry.target;
        revealSection(section);
        io.unobserve(section);
      }
    }, { threshold: 0.18 });

    sections.forEach((section) => io.observe(section));
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReveal, { once: true });
  } else {
    initReveal();
  }
})();

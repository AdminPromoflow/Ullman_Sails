<?php
$sliderCss = __DIR__ . '/../home/1_slider/slider.css';
$sliderJs  = __DIR__ . '/../home/1_slider/slider.js';

$sliderCssTime = file_exists($sliderCss) ? filemtime($sliderCss) : time();
$sliderJsTime  = file_exists($sliderJs)  ? filemtime($sliderJs)  : time();
?>

<link rel="stylesheet" href="../home/1_slider/slider.css?v=<?= $sliderCssTime ?>">

<section class="home-slider" aria-label="Home slider">
  <div id="homeSliderTrack" class="home-slider__track">

    <!-- CLONE (last real) -->
    <article class="home-slider__slide bg-services is-caption-left" data-clone="last" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">SERVICES</h1>
        <h2 class="home-slider__subtitle">Professional services designed to meet your goals.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Services/index.php">Learn more</a>
      </div>
    </article>

    <!-- REAL 1 -->
    <article class="home-slider__slide bg-racing-1 is-caption-left">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">RACING SAILS</h1>
        <h2 class="home-slider__subtitle">Built for speed. Tuned for results.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Racing/index.php">Click here</a>
      </div>
    </article>

    <!-- REAL 2 -->
    <article class="home-slider__slide bg-racing-2">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">RACING SAILS</h1>
        <h2 class="home-slider__subtitle">Max performance, precise shape control.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Racing/index.php">Click here</a>
      </div>
    </article>

    <!-- REAL 3 -->
    <article class="home-slider__slide bg-cruising-1">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">CRUISING SAILS</h1>
        <h2 class="home-slider__subtitle">Comfort at sea. Confidence in every mile.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Cruising/index.php">Click here</a>
      </div>
    </article>

    <article class="home-slider__slide bg-cruising-2">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">CRUISING SAILS</h1>
        <h2 class="home-slider__subtitle">Trim fast, sail comfortably, enjoy every mile.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Cruising/index.php">Click here</a>
      </div>
    </article>

    <!-- REAL 4 -->
    <article class="home-slider__slide bg-covers">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">COVERS</h1>
        <h2 class="home-slider__subtitle">Protect your boat today</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Covers/index.php">Click here</a>
      </div>
    </article>

    <!-- REAL 5 -->
    <article class="home-slider__slide bg-services">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">SERVICES</h1>
        <h2 class="home-slider__subtitle">Professional services designed to meet your goals.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Services/index.php">Learn more</a>
      </div>
    </article>

    <!-- CLONE (first real) -->
    <article class="home-slider__slide bg-racing-1 is-caption-left" data-clone="first" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../home/1_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">RACING SAILS</h1>
        <h2 class="home-slider__subtitle">Built for speed. Tuned for results.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Racing/index.php">Click here</a>
      </div>
    </article>

  </div>

  <button id="homeSliderPrev" class="home-slider__arrow home-slider__arrow--left" type="button" aria-label="Previous slide">
    <img src="../home/1_slider/img/left.png" alt="">
  </button>

  <button id="homeSliderNext" class="home-slider__arrow home-slider__arrow--right" type="button" aria-label="Next slide">
    <img src="../home/1_slider/img/right.png" alt="">
  </button>
</section>

<script src="../home/1_slider/slider.js?v=<?= $sliderJsTime ?>" defer></script>

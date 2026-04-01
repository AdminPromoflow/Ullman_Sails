<?php
$sliderCss =  '../cruising_navigator/0_slider/slider.css';
$sliderJs  =  '../cruising_navigator/0_slider/slider.js';

$sliderCssTime = file_exists($sliderCss) ? filemtime($sliderCss) : time();
$sliderJsTime  = file_exists($sliderJs)  ? filemtime($sliderJs)  : time();
?>

<link rel="stylesheet" href="../cruising_navigator/0_slider/slider.css?v=<?= $sliderCssTime ?>">

<section class="home-slider" aria-label="Home slider">
  <div id="homeSliderTrack" class="home-slider__track">

    <!-- CLONE 2(last real) -->
    <article class="home-slider__slide bg-cruising-2 is-caption-left" data-clone="last" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../cruising_navigator/0_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">Navigator Series</h1>
        <h2 class="home-slider__subtitle">Built for everyday cruising.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Services/index.php">Learn more</a>
      </div>
    </article>

<!-- 1 -->
    <article class="home-slider__slide bg-cruising-1">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../cruising_navigator/0_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">Navigator Series</h1>
        <h2 class="home-slider__subtitle">Designed for coastal cruising and day sailing.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Covers/index.php">Click here</a>
      </div>
    </article>

    <!-- 2 -->
    <article class="home-slider__slide bg-cruising-2">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../cruising_navigator/0_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">Navigator Series</h1>
        <h2 class="home-slider__subtitle">Built for everyday cruising.</h2>
        <div class="home-slider__line" aria-hidden="true"></div>
        <a class="home-slider__btn" href="../Services/index.php">Learn more</a>
      </div>
    </article>

    <!-- CLONE 1(first real) -->
    <article class="home-slider__slide bg-cruising-1 is-caption-left" data-clone="first" aria-hidden="true">
      <div class="home-slider__caption">
        <div class="home-slider__kicker">
          <img src="../cruising_navigator/0_slider/img/ullman_sails.png" alt="">
        </div>
        <h1 class="home-slider__title">Navigator Series</h1>
        <h2 class="home-slider__subtitle">Designed for coastal cruising and day sailing.</h2>
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

<script src="../cruising_navigator/0_slider/slider.js?v=<?= $sliderJsTime ?>" defer></script>

<?php
declare(strict_types=1);

/* ---------------------------------------------
   Home Slider (Ullman Sails) — same pattern
---------------------------------------------- */

function slide_classes(array $slide): string {
  $classes = ['home-slider__slide', (string)$slide['bg']];
  if (!empty($slide['captionLeft'])) $classes[] = 'is-caption-left';
  if (!empty($slide['captionRight'])) $classes[] = 'is-caption-right';
  return implode(' ', $classes);
}

function render_caption(string $logoSrc, string $title, string $subtitle, string $ctaHref): void { ?>
  <div class="home-slider__caption">
    <div class="home-slider__kicker">
      <img
        src="<?= htmlspecialchars($logoSrc, ENT_QUOTES, 'UTF-8') ?>"
        alt="Ullman Sails logo"
        loading="lazy"
        decoding="async"
      >
    </div>

    <h1 class="home-slider__title"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
    <h2 class="home-slider__subtitle"><?= htmlspecialchars($subtitle, ENT_QUOTES, 'UTF-8') ?></h2>

    <div class="home-slider__line" aria-hidden="true"></div>

    <a class="home-slider__btn"
       href="<?= htmlspecialchars($ctaHref, ENT_QUOTES, 'UTF-8') ?>"
       aria-label="Scroll down">↓</a>
  </div>
<?php }

/* Assets */
$cssHref = '0_slider/slider.css?v=' . filemtime(__DIR__ . '/slider.css');
$jsSrc  = '0_slider/slider.js?v=' . filemtime(__DIR__ . '/slider.js');

/* UI assets */
$logoSrc = '../Home/1.Slider/img/ullman_sails.png';
$ctaHref = '#sailing-types-introduction';

/* Slides */
$slides = [
  [
    'bg'          => 'bg-racing-1',
    'captionLeft' => true,
    'title'       => 'Navigator Series',
    'subtitle'    => 'Designed for coastal cruising and day sailing.',
  ],
  [
    'bg'          => 'bg-services',
    'captionLeft' => false,
    'title'       => 'Navigator Series',
    'subtitle'    => 'Built for everyday cruising.',
  ],
];

$firstSlide = $slides[0];
$lastSlide  = $slides[count($slides) - 1];
?>

<link rel="stylesheet" href="<?= htmlspecialchars($cssHref, ENT_QUOTES, 'UTF-8') ?>">

<section class="home-slider" aria-label="Home slider" aria-roledescription="carousel">
  <div id="homeSliderTrack" class="home-slider__track">

    <article class="<?= htmlspecialchars(slide_classes($lastSlide), ENT_QUOTES, 'UTF-8') ?>"
             data-clone="last" aria-hidden="true">
      <?php render_caption($logoSrc, $lastSlide['title'], $lastSlide['subtitle'], $ctaHref); ?>
    </article>

    <?php foreach ($slides as $slide): ?>
      <article class="<?= htmlspecialchars(slide_classes($slide), ENT_QUOTES, 'UTF-8') ?>">
        <?php render_caption($logoSrc, $slide['title'], $slide['subtitle'], $ctaHref); ?>
      </article>
    <?php endforeach; ?>

    <article class="<?= htmlspecialchars(slide_classes($firstSlide), ENT_QUOTES, 'UTF-8') ?>"
             data-clone="first" aria-hidden="true">
      <?php render_caption($logoSrc, $firstSlide['title'], $firstSlide['subtitle'], $ctaHref); ?>
    </article>

  </div>

  <button id="homeSliderPrev"
          class="home-slider__arrow home-slider__arrow--left"
          type="button"
          aria-label="Previous slide">
    <img src="../Home/1.Slider/img/left.png" alt="" aria-hidden="true" loading="lazy" decoding="async">
  </button>

  <button id="homeSliderNext"
          class="home-slider__arrow home-slider__arrow--right"
          type="button"
          aria-label="Next slide">
    <img src="../Home/1.Slider/img/right.png" alt="" aria-hidden="true" loading="lazy" decoding="async">
  </button>
</section>

<script src="<?= htmlspecialchars($jsSrc, ENT_QUOTES, 'UTF-8') ?>" defer></script>

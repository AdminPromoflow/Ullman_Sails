<?php
/* =======================
   sail_types_section.php — COPY & PASTE
   (Solo data-attributes, NO mezclar aquí JS/CSS)
   ======================= */
declare(strict_types=1);

/* CSS + JS (filemtime) */
$cssFs = __DIR__ . '/../Cruising/sail_types_section/sail_types_section.css';
$jsFs  = __DIR__ . '/../Cruising/sail_types_section/sail_types_section.js';

$cssPublic = '../Cruising/sail_types_section/sail_types_section.css';
$jsPublic  = '../Cruising/sail_types_section/sail_types_section.js';

$cssV = is_file($cssFs) ? filemtime($cssFs) : null;
$jsV  = is_file($jsFs)  ? filemtime($jsFs)  : null;

/* Helper (evita "Cannot redeclare") */
if (!function_exists('with_v')) {
  function with_v(string $url, ?int $v): string {
    return $v ? ($url . '?v=' . $v) : $url;
  }
}

/* Arrows */
$arrowLeftFs   = __DIR__ . '/../Cruising/sail_types_section/img/arrow_left.png';
$arrowRightFs  = __DIR__ . '/../Cruising/sail_types_section/img/arrow_right.png';
$arrowLeftUrl  = '../Cruising/sail_types_section/img/arrow_left.png';
$arrowRightUrl = '../Cruising/sail_types_section/img/arrow_right.png';
$arrowLeftV    = is_file($arrowLeftFs)  ? filemtime($arrowLeftFs)  : null;
$arrowRightV   = is_file($arrowRightFs) ? filemtime($arrowRightFs) : null;

/* Slides */
$slides = [
  [
    'href'  => '../cruising_navigator/index.php',
    'imgFs' => __DIR__ . '/../Cruising/sail_types_section/img/Navigator.png',
    'imgUrl'=> '../Cruising/sail_types_section/img/Navigator.png',
    'alt'   => 'Navigator',
    'label' => 'Navigator Series',
  ],
  [
    'href'  => '../cruising_endurance/index.php',
    'imgFs' => __DIR__ . '/../Cruising/sail_types_section/img/Endurance.png',
    'imgUrl'=> '../Cruising/sail_types_section/img/Endurance.png',
    'alt'   => 'Endurance',
    'label' => 'Endurance Series',
  ],
  [
    'href'  => '../cruising_voyager/index.php',
    'imgFs' => __DIR__ . '/../Cruising/sail_types_section/img/Voyager.png',
    'imgUrl'=> '../Cruising/sail_types_section/img/Voyager.png',
    'alt'   => 'Voyager',
    'label' => 'Voyager Series',
  ],
  [
    'href'  => '../cruising_performance/index.php',
    'imgFs' => __DIR__ . '/../Cruising/sail_types_section/img/Performance.png',
    'imgUrl'=> '../Cruising/sail_types_section/img/Performance.png',
    'alt'   => 'Performance',
    'label' => 'Performance',
  ],
  [
    'href'  => '../cruising_downwind/index.php',
    'imgFs' => __DIR__ . '/../Cruising/sail_types_section/img/Downwind.png',
    'imgUrl'=> '../Cruising/sail_types_section/img/Downwind.png',
    'alt'   => 'Downwind',
    'label' => 'Downwind',
  ],
];
?>

<link rel="stylesheet" href="<?= htmlspecialchars(with_v($cssPublic, $cssV), ENT_QUOTES, 'UTF-8') ?>">
<script defer src="<?= htmlspecialchars(with_v($jsPublic, $jsV), ENT_QUOTES, 'UTF-8') ?>"></script>

<div class="sail-types-section">
  <h2 data-st-parallax-text>Discover Your <br>Perfect Sail</h2>

  <p class="sail-types-subtitle" data-st-parallax-text>
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-container">

    <button class="sail-types-arrow sail-types-arrow-left" type="button" aria-label="Previous">
      <img src="<?= htmlspecialchars(with_v($arrowLeftUrl, $arrowLeftV), ENT_QUOTES, 'UTF-8') ?>" alt="">
    </button>

    <button class="sail-types-arrow sail-types-arrow-right" type="button" aria-label="Next">
      <img src="<?= htmlspecialchars(with_v($arrowRightUrl, $arrowRightV), ENT_QUOTES, 'UTF-8') ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">
      <?php foreach ($slides as $i => $s): ?>
        <?php $imgV = is_file($s['imgFs']) ? filemtime($s['imgFs']) : null; ?>
        <a href="<?= htmlspecialchars($s['href'], ENT_QUOTES, 'UTF-8') ?>" class="sail-types-link">
          <div class="sail-types-box">
            <img
              data-st-parallax-img
              src="<?= htmlspecialchars(with_v($s['imgUrl'], $imgV), ENT_QUOTES, 'UTF-8') ?>"
              alt="<?= htmlspecialchars($s['alt'], ENT_QUOTES, 'UTF-8') ?>"
              loading="lazy"
              decoding="async"
            >
            <p class="sail-types-title" data-st-parallax-text>
              <?= htmlspecialchars($s['label'], ENT_QUOTES, 'UTF-8') ?>
            </p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="sail-types-dots" aria-label="Slider dots">
      <?php for ($i = 0; $i < count($slides); $i++): ?>
        <span class="sail-types-dot<?= $i === 0 ? ' is-active' : '' ?>" data-index="<?= $i ?>"></span>
      <?php endfor; ?>
    </div>

  </div>
</div>

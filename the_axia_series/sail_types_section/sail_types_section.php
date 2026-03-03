<?php
declare(strict_types=1);

/* CSS (filemtime) */
$cssFs = '../the_axia_series/sail_types_section/sail_types_section.css';
$cssPublic = '../the_axia_series/sail_types_section/sail_types_section.css';
$cssV = is_file($cssFs) ? filemtime($cssFs) : null;

/* Helper (evita "Cannot redeclare") */
if (!function_exists('with_v')) {
  function with_v(string $url, ?int $v): string {
    return $v ? ($url . '?v=' . $v) : $url;
  }
}

/* Solo 2 imágenes */
$cards = [
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
];
?>

<link rel="stylesheet" href="<?= htmlspecialchars(with_v($cssPublic, $cssV), ENT_QUOTES, 'UTF-8') ?>">

<div class="sail-types-section">
  <h2 data-st-parallax-text>Discover Your <br>Perfect Sail</h2>

  <p class="sail-types-subtitle" data-st-parallax-text>
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-axia-grid">

    <div class="image-axia-container">
      <img src="../the_axia_series/sail_types_section/img/cruising.jpg" alt="">
      <a href="#"><h4>Cruising</h4></a>
    </div>

    <div class="image-axia-container">
      <img src="../the_axia_series/sail_types_section/img/racing.jpg" alt="">
      <a href="#"><h4>Racing</h4></a>

    </div>

  </div>


</div>

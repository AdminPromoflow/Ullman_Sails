<?php
// Ajusta BASE si tu index.php está en otra ruta
$base = __DIR__;

// Rutas físicas (para filemtime)
$cssPath = $base . '/../Racing/sail_types_section/sail_types_section.css';
$jsPath  = $base . '/../Racing/sail_types_section/sail_types_section.js';

// URLs (las que van en <link> y <script>)
$cssUrl = '../Racing/sail_types_section/sail_types_section.css';
$jsUrl  = '../Racing/sail_types_section/sail_types_section.js';

// Versiones
$cssVer = file_exists($cssPath) ? filemtime($cssPath) : time();
$jsVer  = file_exists($jsPath)  ? filemtime($jsPath)  : time();

// Imágenes (versionadas)
$imgNavigatorTime   = filemtime('../Racing/sail_types_section/img/Navigator.png');
$imgEnduranceTime   = filemtime('../Racing/sail_types_section/img/Endurance.png');
$imgVoyagerTime     = filemtime('../Racing/sail_types_section/img/Voyager.png');


// Flechas (las guardamos para usar ya mismo)
$imgArrowLeftTime  = filemtime('../Racing/sail_types_section/img/arrow_left.png');
$imgArrowRightTime = filemtime('../Racing/sail_types_section/img/arrow_right.png');
?>

<link rel="stylesheet" href="<?= $cssUrl ?>?v=<?= $cssVer ?>">

<div class="sail-types-section">
  <h1 class="sail-types-title">Discover Your Perfect Sail</h1>
  <p class="sail-types-subtitle">
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-container">

    <!-- Flecha izquierda -->
    <button class="sail-types-arrow sail-types-arrow-left" type="button" aria-label="Previous">
      <img src="../Racing/sail_types_section/img/arrow_left.png?v=<?= $imgArrowLeftTime; ?>" alt="">
    </button>

    <!-- Flecha derecha -->
    <button class="sail-types-arrow sail-types-arrow-right" type="button" aria-label="Next">
      <img src="../Racing/sail_types_section/img/arrow_right.png?v=<?= $imgArrowRightTime; ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">
      <a href="../cruising_navigator/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Racing/sail_types_section/img/Navigator.png?v=<?= $imgNavigatorTime; ?>" alt="Navigator">
          <p>Navigator Series</p>
        </div>
      </a>

      <a href="../cruising_endurance/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Racing/sail_types_section/img/Endurance.png?v=<?= $imgEnduranceTime; ?>" alt="Endurance">
          <p>Endurance Series</p>
        </div>
      </a>

      <a href="../cruising_voyager/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Racing/sail_types_section/img/Voyager.png?v=<?= $imgVoyagerTime; ?>" alt="Voyager">
          <p>Voyager Series</p>
        </div>
      </a>




    <!-- Dots visibles -->
    <div class="sail-types-dots" aria-label="Slider dots">
      <span class="sail-types-dot is-active" data-index="0"></span>
      <span class="sail-types-dot" data-index="1"></span>
      <span class="sail-types-dot" data-index="2"></span>
    </div>

  </div>
</div>
</div>

<script defer src="<?= $jsUrl ?>?v=<?= $jsVer ?>"></script>

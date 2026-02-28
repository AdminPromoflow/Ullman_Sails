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
$imgNavigatorTime = filemtime('../Racing/sail_types_section/img/race.jpg');
$imgEnduranceTime = filemtime('../Racing/sail_types_section/img/fiberpath.jpg');
$imgVoyagerTime   = filemtime('../Racing/sail_types_section/img/red_line.jpg');

// Flechas
$imgArrowLeftTime  = filemtime('../Racing/sail_types_section/img/arrow_left.png');
$imgArrowRightTime = filemtime('../Racing/sail_types_section/img/arrow_right.png');
?>

<link rel="stylesheet" href="<?= $cssUrl ?>?v=<?= $cssVer ?>">

<div class="sail-types-section" data-sr-reveal>
  <h2 class="sail-types-title sr-item">Discover Your <br>Perfect Sail</h2>

  <p class="sail-types-subtitle sr-item">
    From everyday cruising to long-distance adventures, we have a sail type to match every journey.
  </p>

  <div class="sail-types-container">

    <!-- Flecha izquierda -->
    <button class="sail-types-arrow sail-types-arrow-left sr-item" type="button" aria-label="Previous">
      <img src="../Racing/sail_types_section/img/arrow_left.png?v=<?= $imgArrowLeftTime; ?>" alt="">
    </button>

    <!-- Flecha derecha -->
    <button class="sail-types-arrow sail-types-arrow-right sr-item" type="button" aria-label="Next">
      <img src="../Racing/sail_types_section/img/arrow_right.png?v=<?= $imgArrowRightTime; ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">
      <a href="../racing_race_series/index.php" class="sail-types-link">
        <div class="sail-types-box sr-item">
          <img src="../Racing/sail_types_section/img/race.jpg?v=<?= $imgNavigatorTime; ?>" alt="Race Series">
          <p>Race Series</p>
        </div>
      </a>

      <a href="../racing_fiberpath_series/index.php" class="sail-types-link">
        <div class="sail-types-box sr-item">
          <img src="../Racing/sail_types_section/img/fiberpath.jpg?v=<?= $imgEnduranceTime; ?>" alt="Fiberpath Series">
          <p>Fiberpath Series</p>
        </div>
      </a>

      <a href="../racing_red_line_series/index.php" class="sail-types-link">
        <div class="sail-types-box sr-item">
          <img src="../Racing/sail_types_section/img/red_line.jpg?v=<?= $imgVoyagerTime; ?>" alt="The Axia Series - Red Line">
          <p>The Axia Series - Red Line</p>
        </div>
      </a>
    </div>

    <!-- Dots -->
    <div class="sail-types-dots" aria-label="Slider dots">
      <span class="sail-types-dot is-active" data-index="0"></span>
      <span class="sail-types-dot" data-index="1"></span>
      <span class="sail-types-dot" data-index="2"></span>
    </div>

  </div>
</div>

<script defer src="<?= $jsUrl ?>?v=<?= $jsVer ?>"></script>

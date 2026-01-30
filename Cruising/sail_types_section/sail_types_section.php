<?php
/* CSS + JS */
$cssFile = __DIR__ . '/../Cruising/sail_types_section/sail_types_section.css';
$jsFile  = __DIR__ . '/../Cruising/sail_types_section/sail_types_section.js';

$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;

/* Images */
$imgNavigatorFile   = __DIR__ . '/../Cruising/sail_types_section/img/Navigator.png';
$imgEnduranceFile   = __DIR__ . '/../Cruising/sail_types_section/img/Endurance.png';
$imgVoyagerFile     = __DIR__ . '/../Cruising/sail_types_section/img/Voyager.png';
$imgPerformanceFile = __DIR__ . '/../Cruising/sail_types_section/img/Performance.png';
$imgDownwindFile    = __DIR__ . '/../Cruising/sail_types_section/img/Downwind.png';

$imgArrowLeftFile   = __DIR__ . '/../Cruising/sail_types_section/img/arrow_left.png';
$imgArrowRightFile  = __DIR__ . '/../Cruising/sail_types_section/img/arrow_right.png';

$imgNavigatorV   = is_file($imgNavigatorFile)   ? filemtime($imgNavigatorFile)   : null;
$imgEnduranceV   = is_file($imgEnduranceFile)   ? filemtime($imgEnduranceFile)   : null;
$imgVoyagerV     = is_file($imgVoyagerFile)     ? filemtime($imgVoyagerFile)     : null;
$imgPerformanceV = is_file($imgPerformanceFile) ? filemtime($imgPerformanceFile) : null;
$imgDownwindV    = is_file($imgDownwindFile)    ? filemtime($imgDownwindFile)    : null;

$imgArrowLeftV   = is_file($imgArrowLeftFile)   ? filemtime($imgArrowLeftFile)   : null;
$imgArrowRightV  = is_file($imgArrowRightFile)  ? filemtime($imgArrowRightFile)  : null;
?>

<link rel="stylesheet" href="../Cruising/sail_types_section/sail_types_section.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<script defer src="../Cruising/sail_types_section/sail_types_section.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>

<!-- Example image URLs (use these in <img src="...">) -->
<?php
$imgNavigatorUrl   = '../Cruising/sail_types_section/img/Navigator.png'   . ($imgNavigatorV   ? '?v='.$imgNavigatorV   : '');
$imgEnduranceUrl   = '../Cruising/sail_types_section/img/Endurance.png'   . ($imgEnduranceV   ? '?v='.$imgEnduranceV   : '');
$imgVoyagerUrl     = '../Cruising/sail_types_section/img/Voyager.png'     . ($imgVoyagerV     ? '?v='.$imgVoyagerV     : '');
$imgPerformanceUrl = '../Cruising/sail_types_section/img/Performance.png' . ($imgPerformanceV ? '?v='.$imgPerformanceV : '');
$imgDownwindUrl    = '../Cruising/sail_types_section/img/Downwind.png'    . ($imgDownwindV    ? '?v='.$imgDownwindV    : '');

$imgArrowLeftUrl   = '../Cruising/sail_types_section/img/arrow_left.png'  . ($imgArrowLeftV   ? '?v='.$imgArrowLeftV   : '');
$imgArrowRightUrl  = '../Cruising/sail_types_section/img/arrow_right.png' . ($imgArrowRightV  ? '?v='.$imgArrowRightV  : '');
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
      <img src="../Cruising/sail_types_section/img/arrow_left.png?v=<?= $imgArrowLeftTime; ?>" alt="">
    </button>

    <!-- Flecha derecha -->
    <button class="sail-types-arrow sail-types-arrow-right" type="button" aria-label="Next">
      <img src="../Cruising/sail_types_section/img/arrow_right.png?v=<?= $imgArrowRightTime; ?>" alt="">
    </button>

    <div class="sail-types-scroller-container">
      <a href="../cruising_navigator/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Cruising/sail_types_section/img/Navigator.png?v=<?= $imgNavigatorTime; ?>" alt="Navigator">
          <p>Navigator Series</p>
        </div>
      </a>

      <a href="../cruising_endurance/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Cruising/sail_types_section/img/Endurance.png?v=<?= $imgEnduranceTime; ?>" alt="Endurance">
          <p>Endurance Series</p>
        </div>
      </a>

      <a href="../cruising_voyager/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Cruising/sail_types_section/img/Voyager.png?v=<?= $imgVoyagerTime; ?>" alt="Voyager">
          <p>Voyager Series</p>
        </div>
      </a>

      <a href="../cruising_performance/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Cruising/sail_types_section/img/Performance.png?v=<?= $imgPerformanceTime; ?>" alt="Performance">
          <p>Performance</p>
        </div>
      </a>

      <a href="../cruising_downwind/index.php" class="sail-types-link">
        <div class="sail-types-box">
          <img src="../Cruising/sail_types_section/img/Downwind.png?v=<?= $imgDownwindTime; ?>" alt="Downwind">
          <p>Downwind</p>
        </div>
      </a>


    <!-- Dots visibles -->
    <div class="sail-types-dots" aria-label="Slider dots">
      <span class="sail-types-dot is-active" data-index="0"></span>
      <span class="sail-types-dot" data-index="1"></span>
      <span class="sail-types-dot" data-index="2"></span>
      <span class="sail-types-dot" data-index="3"></span>
      <span class="sail-types-dot" data-index="4"></span>
    </div>

  </div>
</div>
</div>

<script defer src="<?= $jsUrl ?>?v=<?= $jsVer ?>"></script>

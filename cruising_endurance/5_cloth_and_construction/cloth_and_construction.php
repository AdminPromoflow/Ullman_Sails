<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* Public paths */
$nsCssPublic = '5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section class="nav-specsheet" aria-label="Endurance cloth selection and construction">
  <h2 id="csp-title" class="csp-title">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">

      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="Endurance sail image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="5_cloth_and_construction/img/sail_1.png"
                 alt="Endurance Series sail view 1"
                 data-sub="MAINSAIL, THE ENDURANCE SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_2.png"
                 alt="Endurance Series sail view 2"
                 data-sub="HEADSAIL, THE ENDURANCE SERIES">

            <img class="nav-rotator__img"
                 src="5_cloth_and_construction/img/sail_3.png"
                 alt="Endurance Series sail view 3"
                 data-sub="JIB, THE ENDURANCE SERIES">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">THE ENDURANCE SERIES</span>
            <span class="nav-rotator__capSub" id="navCapSub">MAINSAIL, THE ENDURANCE SERIES</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">ENDURO DACRON</div>
            <div class="nav-specsheet__metaSub">CROSSCUT WOVEN POLYESTER</div>
          </div>

          <!-- Cloth options (as requested) -->
          <div class="nav-specsheet__list" role="list" aria-label="Cloth options">
            <div class="nav-specsheet__row" role="listitem">
              <div class="nav-specsheet__key">ENDURO DACRON</div>
              <div class="nav-specsheet__val">CROSSCUT WOVEN POLYESTER</div>
            </div>

            <div class="nav-specsheet__row" role="listitem">
              <div class="nav-specsheet__key">ENDURO DACRON</div>
              <div class="nav-specsheet__val">RADIAL WOVEN POLYESTER</div>
            </div>

            <div class="nav-specsheet__row" role="listitem">
              <div class="nav-specsheet__key">ENDURO LAMINATE</div>
              <div class="nav-specsheet__val">RADIAL TAFFETA</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Standard Components</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">STITCHING</div>
              <div class="nav-specsheet__val">MULTIPLE TRIPLE-STEP</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">RINGS</div>
              <div class="nav-specsheet__val">STAINLESS STEEL &amp; WEBBING LOAD STRAPS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">HIGH PERFORMANCE DURABLE THREAD</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">HEAVIER, STRONGER, REINFORCED</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">REINFORCED POCKETS &amp; BATTENS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">RADIAL PATCHES</div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>

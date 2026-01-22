<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$nsCssFs = __DIR__ . '/../cruising_navigator/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/../cruising_navigator/5_cloth_and_construction/cloth_and_construction.js';

/* Public paths */
$nsCssPublic = '../cruising_navigator/5_cloth_and_construction/cloth_and_construction.css';
$nsJsPublic  = '../cruising_navigator/5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $nsCssPublic ?>?v=<?= $nsCssV ?>">

<section class="nav-specsheet" aria-label="Voyager cloth selection and construction">
  <h2 id="csp-title" class="csp-title">Cloth Selection &amp; Construction</h2>

  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">

      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="Voyager sail image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_1.png"
                 alt="Voyager Series sail view 1"
                 data-sub="MAINSAIL, THE VOYAGER SERIES">

            <img class="nav-rotator__img"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_2.png"
                 alt="Voyager Series sail view 2"
                 data-sub="HEADSAIL, THE VOYAGER SERIES">

            <img class="nav-rotator__img"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_3.png"
                 alt="Voyager Series sail view 3"
                 data-sub="JIB, THE VOYAGER SERIES">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">THE VOYAGER SERIES</span>
            <span class="nav-rotator__capSub" id="navCapSub">MAINSAIL, THE VOYAGER SERIES</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">ULTRACRUISE</div>
            <div class="nav-specsheet__metaSub">RADIAL WOVEN ULTRA PE</div>
          </div>

          <h3 class="nav-specsheet__subtitle">Cloth Selection &amp; Construction</h3>

          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">ULTRACRUISE</div>
              <div class="nav-specsheet__val">RADIAL WOVEN ULTRA PE</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">VOYAGER DACRON</div>
              <div class="nav-specsheet__val">CROSSCUT WOVEN POLYESTER</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">VOYAGER FIBERPATH</div>
              <div class="nav-specsheet__val">FIBERPATH WITH TAFFETA</div>
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
              <div class="nav-specsheet__val">STAINLESS STEEL &amp; SPECTRA/DYNEEMA WEBBING</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">THREAD</div>
              <div class="nav-specsheet__val">UV RESISTANT THREAD ON ALL SEAMING &amp; U.V COVERS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">SLIDES</div>
              <div class="nav-specsheet__val">ADDITIONAL REINFORCEMENTS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">BATTEN POCKETS</div>
              <div class="nav-specsheet__val">REINFORCED POCKETS &amp; BATTENS</div>
            </div>

            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">PATCHES</div>
              <div class="nav-specsheet__val">OVERSIZED RADIAL PATCHES</div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<script defer src="<?= $nsJsPublic ?>?v=<?= $nsJsV ?>"></script>

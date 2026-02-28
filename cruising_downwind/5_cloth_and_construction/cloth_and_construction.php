<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$cssFile = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$jsFile  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* Versions */
$cssVersion = is_file($cssFile) ? filemtime($cssFile) : null;
$jsVersion  = is_file($jsFile)  ? filemtime($jsFile)  : null;

/* Images (filesystem for filemtime) */
$imgSail1File = __DIR__ . '/../cruising_navigator/5_cloth_and_construction/img/sail_1.png';
$imgSail2File = __DIR__ . '/../cruising_navigator/5_cloth_and_construction/img/sail_2.png';
$imgSail3File = __DIR__ . '/../cruising_navigator/5_cloth_and_construction/img/sail_3.png';

$imgSail1V = is_file($imgSail1File) ? filemtime($imgSail1File) : null;
$imgSail2V = is_file($imgSail2File) ? filemtime($imgSail2File) : null;
$imgSail3V = is_file($imgSail3File) ? filemtime($imgSail3File) : null;
?>

<link rel="stylesheet" href="5_cloth_and_construction/cloth_and_construction.css<?= $cssVersion ? '?v='.$cssVersion : '' ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Downwind cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <!-- =========================
       1) CODE SAILS (3 images)
  ========================== -->
  <div class="nav-specsheet__wrap sr-item">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="Code sails image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_1.png<?= $imgSail1V ? '?v='.$imgSail1V : '' ?>"
                 alt="Axia Code 50 sail view"
                 data-sub="AXIA CODE 50 — 50–60% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_2.png<?= $imgSail2V ? '?v='.$imgSail2V : '' ?>"
                 alt="Axia Code 60 sail view"
                 data-sub="AXIA CODE 60 — 60–70% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_3.png<?= $imgSail3V ? '?v='.$imgSail3V : '' ?>"
                 alt="Axia Code 70 sail view"
                 data-sub="AXIA CODE 70 — 70–83% MID-GIRTH">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CODE SAILS</span>
            <span class="nav-rotator__capSub">AXIA CODE 50 — 50–60% MID-GIRTH</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">CODE SAILS</div>
            <div class="nav-specsheet__metaSub">CLOTH SELECTION</div>
          </div>

          <h3 class="nav-specsheet__subtitle">Cloth Selection</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CLOTH</div>
              <div class="nav-specsheet__val">CODE ZERO LAMINATE</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CLOTH</div>
              <div class="nav-specsheet__val">NYLON &amp; POLYESTER SPINNAKER CLOTH</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">RADIAL</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">CABLED LUFF</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">ACTIVE LUFF</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">V TRIM STRIPES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">SOFT CLEW</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">CUSTOM GRAPHICS</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- =========================
       2) CLASSIC SPINNAKERS (2 images)
  ========================== -->
  <div class="nav-specsheet__wrap sr-item">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator" aria-label="Classic spinnakers image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_1.png<?= $imgSail1V ? '?v='.$imgSail1V : '' ?>"
                 alt="Axia Asymm sail view"
                 data-sub="AXIA ASYMM — 80%+ MID-GIRTH">

            <img class="nav-rotator__img"
                 src="../cruising_navigator/5_cloth_and_construction/img/sail_2.png<?= $imgSail2V ? '?v='.$imgSail2V : '' ?>"
                 alt="Axia Symm sail view"
                 data-sub="AXIA SYMM — SYMMETRICAL DOWNWIND">
          </div>

          <figcaption class="nav-rotator__caption">
            <span class="nav-rotator__capTitle">CLASSIC SPINNAKERS</span>
            <span class="nav-rotator__capSub">AXIA ASYMM — 80%+ MID-GIRTH</span>

            <div class="nav-rotator__dots" aria-hidden="true">
              <span class="nav-rotator__dot is-active"></span>
              <span class="nav-rotator__dot"></span>
            </div>
          </figcaption>
        </figure>

        <div class="nav-specsheet__text">
          <div class="nav-specsheet__meta">
            <div class="nav-specsheet__metaTop">CLASSIC SPINNAKERS</div>
            <div class="nav-specsheet__metaSub">CLOTH SELECTION</div>
          </div>

          <h3 class="nav-specsheet__subtitle">Cloth Selection</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CLOTH</div>
              <div class="nav-specsheet__val">NYLON SPINNAKER CLOTH</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Construction</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">RADIAL</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">CABLED LUFF</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">CONSTRUCTION</div>
              <div class="nav-specsheet__val">ACTIVE LUFF</div>
            </div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">V TRIM STRIPES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">SOFT CLEW</div>
            </div>
            <div class="nav-specsheet__row">
              <div class="nav-specsheet__key">UPGRADES</div>
              <div class="nav-specsheet__val">CUSTOM GRAPHICS</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<script defer src="5_cloth_and_construction/cloth_and_construction.js<?= $jsVersion ? '?v='.$jsVersion : '' ?>"></script>

<?php
declare(strict_types=1);

/* =========================
   Filesystem paths (filemtime)
========================= */
$nsCssFs = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.css';
$nsJsFs  = __DIR__ . '/5_cloth_and_construction/cloth_and_construction.js';

/* =========================
   Public paths (IMPORTANT)
   (porque estás usando ../cruising_downwind/)
========================= */
$basePublic = '../cruising_downwind/5_cloth_and_construction';

$nsCssPublic = $basePublic . '/cloth_and_construction.css';
$nsJsPublic  = $basePublic . '/cloth_and_construction.js';

/* Versions */
$nsCssV = is_file($nsCssFs) ? filemtime($nsCssFs) : time();
$nsJsV  = is_file($nsJsFs)  ? filemtime($nsJsFs)  : time();

/* Images (filesystem + public) */
$img1Fs = __DIR__ . '/5_cloth_and_construction/img/sail_1.png';
$img2Fs = __DIR__ . '/5_cloth_and_construction/img/sail_2.png';
$img3Fs = __DIR__ . '/5_cloth_and_construction/img/sail_3.png';

$img1V = is_file($img1Fs) ? filemtime($img1Fs) : null;
$img2V = is_file($img2Fs) ? filemtime($img2Fs) : null;
$img3V = is_file($img3Fs) ? filemtime($img3Fs) : null;

$img1Url = $basePublic . '/img/sail_1.png';
$img2Url = $basePublic . '/img/sail_2.png';
$img3Url = $basePublic . '/img/sail_3.png';

/* Helper */
if (!function_exists('with_v')) {
  function with_v(string $url, ?int $v): string {
    return $v ? ($url . '?v=' . $v) : $url;
  }
}
?>

<link rel="stylesheet" href="<?= htmlspecialchars($nsCssPublic, ENT_QUOTES) ?>?v=<?= (int)$nsCssV ?>">

<section class="nav-specsheet" data-sr-reveal aria-label="Downwind cloth selection and construction">
  <h2 id="csp-title" class="csp-title sr-item">Cloth Selection &amp; Construction</h2>

  <!-- =========================
       1) CODE SAILS (3 images)
  ========================== -->
  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Code sails image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="<?= htmlspecialchars(with_v($img1Url, $img1V), ENT_QUOTES) ?>"
                 alt="Axia Code 50 sail view"
                 data-sub="AXIA CODE 50 — 50–60% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars(with_v($img2Url, $img2V), ENT_QUOTES) ?>"
                 alt="Axia Code 60 sail view"
                 data-sub="AXIA CODE 60 — 60–70% MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars(with_v($img3Url, $img3V), ENT_QUOTES) ?>"
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

        <div class="nav-specsheet__text sr-item">
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
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">RADIAL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CABLED LUFF</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">ACTIVE LUFF</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">V TRIM STRIPES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SOFT CLEW</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- =========================
       2) CLASSIC SPINNAKERS (2 images)
  ========================== -->
  <div class="nav-specsheet__wrap">
    <div class="nav-specsheet__panel">
      <div class="nav-specsheet__grid">

        <figure class="nav-rotator sr-item" aria-label="Classic spinnakers image rotator" data-interval="3000">
          <div class="nav-rotator__frame">
            <img class="nav-rotator__img is-active"
                 src="<?= htmlspecialchars(with_v($img1Url, $img1V), ENT_QUOTES) ?>"
                 alt="Axia Asymm sail view"
                 data-sub="AXIA ASYMM — 80%+ MID-GIRTH">

            <img class="nav-rotator__img"
                 src="<?= htmlspecialchars(with_v($img2Url, $img2V), ENT_QUOTES) ?>"
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

        <div class="nav-specsheet__text sr-item">
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
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">RADIAL</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CABLED LUFF</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">ACTIVE LUFF</div></div>
          </div>

          <h3 class="nav-specsheet__subtitle">Upgrades</h3>
          <div class="nav-specsheet__list">
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">V TRIM STRIPES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM DRAFT STRIPES AND NUMBERS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TOP-DOWN FURLING SETUP</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">TORSIONAL LUFF CABLES</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">FURLING CLEW VELCRO TABS</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">SOFT CLEW</div></div>
            <div class="nav-specsheet__row"><div class="nav-specsheet__key"></div><div class="nav-specsheet__val">CUSTOM GRAPHICS</div></div>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<!-- ✅ AQUÍ estaba el bug: comillas y ?v mal pegados -->
<script defer src="<?= htmlspecialchars($nsJsPublic, ENT_QUOTES) ?>?v=<?= (int)$nsJsV ?>"></script>

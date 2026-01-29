<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/8_gore_tenara/introduction.css.css');
$introJsVersion  = filemtime(__DIR__ . '/8_gore_tenara/introduction.css.js');
?>

<link
  rel="stylesheet"
  href="8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
>
  <div class="sailing-content">
    <h1 class="au-title" id="navigator-title">Gore® Tenara® thread</h1>

    <p>
Performance Series finishing can include Gore® Tenara® thread to boost longevity. It resists UV degradation and helps seams stay dependable through long passages and harsh sun.    </p>

    <p>
      Tenara on seams & UV covers: Gore® Tenara® thread is specified on all seams and UV covers, reinforcing the areas most exposed to sunlight, chafe and repeated handling over time.
    </p>

    <p>
      100% Tenara thread: Built with 100% Gore® Tenara® thread for maximum durability, maintaining seam integrity and consistent finish quality when sailing in high-UV, high-mileage conditions.
    </p>


  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.css.js?v=<?= $introJsVersion ?>"
></script>

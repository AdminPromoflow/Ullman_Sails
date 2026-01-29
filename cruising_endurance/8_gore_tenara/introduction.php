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
    <!-- Brand mark: provide meaningful alt text for accessibility -->


    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 class="au-title" id="navigator-title">Gore® Tenara®</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p>Endurance Series sails can be upgraded with Gore® Tenara® thread throughout the entire sail, strengthening seam durability for long offshore use and long-term reliability.</p>
    <p>Tenara is hydrophobic and unaffected by UV degradation, helping seams stay stable under harsh sunlight and reducing stitch breakdown over extended passages.</p>
    <p>It is resistant to saltwater, extreme weather, chemicals and acid rain, designed to keep stitching dependable through relentless exposure in demanding offshore conditions.</p>
    <p>Because stitching is critical, Ullman Sails strongly endorses Gore® Tenara® to hold your sail together long-term, protecting the load-bearing seams that keep structure intact.</p>




  </div>
</section>

<script
  defer
  src="8_gore_tenara/introduction.css.js?v=<?= $introJsVersion ?>"
></script>

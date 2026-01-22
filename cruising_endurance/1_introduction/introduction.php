<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/../cruising_navigator/1_introduction/introduction.css');
$introJsVersion  = filemtime(__DIR__ . '/../cruising_navigator/1_introduction/introduction.js');
?>

<link
  rel="stylesheet"
  href="../cruising_navigator/1_introduction/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
>
  <div class="sailing-content">
    <!-- Brand mark: provide meaningful alt text for accessibility -->
    <div class="img-title-sailing-content">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <!-- The main heading for this section; referenced by aria-labelledby -->
    <h1 id="navigator-title">Endurance Series</h1>

    <!-- Keep the intro copy as a single paragraph for clean semantics -->
    <p>
      Endurance Series sails are Ullman’s most durable cruising option for offshore and passagemaking. Custom-designed and reinforced for long-distance exposure, they deliver dependable bluewater strength and control.
    </p>
  </div>
</section>

<script
  defer
  src="../cruising_navigator/1_introduction/introduction.js?v=<?= $introJsVersion ?>"
></script>

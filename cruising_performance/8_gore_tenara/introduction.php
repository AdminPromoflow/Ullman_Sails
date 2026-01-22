<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/../cruising_endurance/8_gore_tenara/introduction.css.css');
$introJsVersion  = filemtime(__DIR__ . '/../cruising_endurance/8_gore_tenara/introduction.css.js');
?>

<link
  rel="stylesheet"
  href="../cruising_endurance/8_gore_tenara/introduction.css?v=<?= $introCssVersion ?>"
>

<section
  class="sailing-types-introduction"
  id="sailing-types-introduction"
  aria-labelledby="navigator-title"
>
  <div class="sailing-content">
    <h1 class="au-title" id="navigator-title">Gore&reg; Tenara&reg;</h1>

    <p>
      Built for offshore passages, high latitudes and demanding cruising, Ullman&rsquo;s Performance Series targets sustained speed, structural integrity and long service life&mdash;ideal for serious passagemakers and superyachts that need dependable performance in harsh conditions.
    </p>

    <p>
      Precision shaping: Maintains designed shape under load for steadier trim.
    </p>

    <p>
      UltraLam &amp; FiberPath: High-end composites balance low-stretch control and strength.
    </p>

    <p>
      3D design: Uses 3D tools and testing to refine shape and service life.
    </p>

    <p>
      Reinforced build: Triple-step seams and heavy reinforcements resist fatigue.
    </p>

    <p>
      Cruising options: Reefs, luff systems and furling/UV upgrades aid control.
    </p>
  </div>
</section>

<script
  defer
  src="../cruising_endurance/8_gore_tenara/introduction.css.js?v=<?= $introJsVersion ?>"
></script>

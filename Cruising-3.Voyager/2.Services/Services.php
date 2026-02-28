<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>">

<section class="text" data-sr-reveal>
  <a class="link_a sr-item" style="--sr-delay:0ms" href="../Cruising/index.php">&lt; Cruising Sails</a>

  <h1 class="sr-item" style="--sr-delay:70ms">Voyager Series</h1>

  <p class="sr-item" style="--sr-delay:140ms">
    Voyager Series sails exclusively use high-end materials and are custom-built for your yacht. The combination of exceptional design, construction, and materials means these sails will hold their optimal shape over a wider wind range and keep performing longer—no matter the conditions.
  </p>

  <p class="sr-item" style="--sr-delay:210ms">
    The Voyager Series offers premium cruising sails for luxury yachts and high-performance cruisers. Using the latest sailmaking technology and materials, combined with proven construction methods and design, Ullman Sails delivers a superior product. The finishing details on Voyager Series sails are upgraded from the Ullman Endurance Series. These construction enhancements make the sail stronger and extend its service life.
  </p>

  <h2 class="sr-item" style="--sr-delay:280ms">Cloth Selection and Performance</h2>
  <ul class="sr-item" style="--sr-delay:350ms">
    <li><strong>FiberPath Enduro:</strong> This high-performance, durable custom string laminate was developed from state-of-the-art grand prix racing technology.</li>
    <li><strong>UltraCruise:</strong> UltraCruise sails utilize premium brand-name cloth to build a sail with the greatest durability and longevity achievable.</li>
    <li><strong>Carbon/Dyneema Tri-Radial Laminate:</strong> These sails are an ideal option when considering a high-end, lightweight performance cruising sail.</li>
  </ul>

  <p class="sr-item" style="--sr-delay:420ms">
    <strong>Gore® Tenara® Thread:</strong> Voyager Series sails come standard with Gore® Tenara® thread used on all seams and UV covers. This thread is hydrophobic and completely unaffected by UV degradation, salt water, extreme weather, chemicals, acid rain, and more. Voyager Series sails can be further upgraded to use 100% Gore® Tenara® thread throughout all stitching.
  </p>

  <h2 class="sr-item" style="--sr-delay:490ms">Strength in the Details</h2>
  <ul class="sr-item" style="--sr-delay:560ms">
    <li>Radial-point style patching with inside layer for FiberPath products</li>
    <li>Gore® Tenara® thread on all seams and UV covers</li>
    <li>Reinforcing patches for hanks and slides</li>
    <li>Stainless steel rings with Spectra/Dyneema backup webbing</li>
    <li>Multiple rows of triple-step stitching on every seam</li>
    <li>Additional reinforcements at each hank or slide</li>
    <li>Aluminum headboards with stainless steel liners</li>
    <li>Draft stripes</li>
    <li>Telltales</li>
    <li>Reinforced batten pockets</li>
    <li>Vinylester battens</li>
    <li>Hanks or slides</li>
  </ul>

  <h2 class="sr-item" style="--sr-delay:630ms">Available Upgrades</h2>
  <ul class="sr-item" style="--sr-delay:700ms">
    <li>100% Gore® Tenara® thread stitching</li>
    <li>Leather finishing on corners</li>
    <li>Anti-mildew treatment</li>
    <li>Additional reefs for mainsails</li>
    <li>Foam luff for headsails</li>
    <li>UV covers/treatments for furling sails</li>
    <li>Sail numbers</li>
    <li>Full-length battens</li>
  </ul>

  <div class="Container_bottom sr-item" style="--sr-delay:770ms">
    <a class="link_quote" href="../New_Sail_Quote/index.php">
      <div class="button_quote button_quote1">
        <h3>New Sail Quote</h3>
      </div>
    </a>

    <a class="link_quote" href="../New_Repair_Quote/index.php">
      <div class="button_quote button_quote2">
        <h3>Sail Repair Quote</h3>
      </div>
    </a>

    <a class="link_quote" href="../ContactUs/index.php">
      <div class="buttonTitle">
        <h3>Contact us</h3>
      </div>
    </a>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>

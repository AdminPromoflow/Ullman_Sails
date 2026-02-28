<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<section class="text" data-sr-reveal>
  <a class="link_a sr-item" href="../Cruising/index.php">&lt; Cruising Sails</a>

  <h1 class="sr-item">Performance</h1>

  <p class="sr-item">The Ullman Sails Performance Series is the pinnacle of high-latitude equipment for serious offshore explorers and adventurers. These sails have proven to withstand winds over 60 knots, sub-zero temperatures, and high UV environments across tens of thousands of miles. Engineered in collaboration with five-time circumnavigator and Brand Ambassador Skip Novak, Head of Technical Development Brad Stephens, and the Ullman Sails South Africa loft team in Cape Town, these sails are the reliable solution for the world’s most extreme sailors, where there is zero margin for error.</p>

  <p class="sr-item">The Performance Series represents top-tier gear for high-latitude sailing professionals and adventurers.</p>

  <h2 class="sr-item">Engineering for Extreme Environments</h2>
  <p class="sr-item">All Performance Series sails are custom projects, meticulously constructed and designed for maximum durability and safety. Extreme cold, high winds, and rough seas demand complete trust in your equipment. These sails help crews better manage high winds and sub-zero conditions where mistakes compound quickly, and physical and mental responsiveness may be reduced.</p>

  <p class="sr-item">High winds can cause significant heeling, risking the mainsail being dragged into the water. Necessary sail changes in these conditions are inherently risky. The Performance Series offers solutions that reduce or eliminate many challenges posed by extreme environments—preparing you for the unknown.</p>

  <h2 class="sr-item">Performance Series Sail Options</h2>
  <ul class="sr-item">
    <li><strong>FiberPath Performance:</strong> The sails of choice for Skip Novak, featuring higher denier fibers, increased fiber density, and heavier sail film and taffeta.</li>
    <li><strong>Performance Radial:</strong> Radial construction using premium woven Spectra/Dyneema cloth with a polyester rip-stop weave, offering high tear strength compared to other woven polyesters.</li>
    <li><strong>Performance XC:</strong> Crosscut sails built with heavy-duty, high-weight woven Dacron. Preferred by the Barba Performance team for Arctic exploration as far north as 81° latitude.</li>
  </ul>

  <h2 class="sr-item">Performance Series Sail Design</h2>
  <p class="sr-item">Performance Series sails are designed differently. Our Advanced Design Team collaborates with Skip Novak and the Head of Technical Development to meet high standards. High-clew headsails improve visibility, reefing points rise at the leech to keep the boom clear of the water, and strategic fiber placements provide enhanced durability. These features improve handling and enhance crew safety.</p>

  <h2 class="sr-item">Standard Specifications</h2>
  <p class="sr-item">All Performance Series sails are built to our highest standards, with customization options available to match your specific needs. Finishing details are upgraded from the Voyager Series.</p>
  <ul class="sr-item">
    <li>Four reefs with webbing handles, reef blocks, and low-friction rings</li>
    <li>Color-coded mainsail luff reefs for accuracy</li>
    <li>Mainsail luff furling reef system</li>
    <li>Gore® Tenara® thread on all seams and UV covers</li>
    <li>Covered seams for enhanced UV and chafe protection</li>
    <li>Multi-layer batten pockets with external webbing</li>
    <li>Double leech and foot tapes</li>
    <li>Dual overhead leechlines</li>
    <li>External stainless steel rings with webbing</li>
    <li>Rope luff pads for headsails</li>
    <li>Spectra/Dyneema webbings</li>
    <li>Extra-wide seams with triple-step stitching</li>
    <li>UV covers standard</li>
  </ul>

  <h2 class="sr-item">Available Upgrades</h2>
  <ul class="sr-item">
    <li>Upgraded luff systems</li>
    <li>Foot slides</li>
    <li>Full-length battens (recommended for slab reefing)</li>
    <li>Anti-mildew treatment</li>
    <li>100% Gore® Tenara® thread</li>
    <li>Leather corner reinforcements</li>
  </ul>

  <div class="Container_bottom sr-item">
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

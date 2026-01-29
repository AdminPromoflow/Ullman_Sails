<?php
$cssTime = filemtime('../Racing/cruising_section/cruising_section.css');
$jsTime  = filemtime('../Racing/cruising_section/cruising_section.js');
?>

<link rel="stylesheet" href="../Racing/cruising_section/cruising_section.css?v=<?= $cssTime ?>">

<section class="cruising-section" aria-labelledby="cruising-title">
  <p class="cruising-label">Essential</p>

  <h2 id="cruising-title" class="cruising-title">Racing sails</h2>

  <p class="cruising-subtitle">
    When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...
  </p>

  <ul class="cruising-icons" role="list">
    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_race_series/index.php">
        <img src="../Racing/cruising_section/img/navigator.png" alt="Navigator Icon">
        <h3 class="series">Race</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_fiberpath_series/index.php">
        <img src="../Racing/cruising_section/img/Endurance.png" alt="Endurance Icon">
        <h3 class="series">FiberPath</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_red_line_series/index.php">
        <img src="../Racing/cruising_section/img/voyager.png" alt="Voyager Icon">
        <h3 class="series">The Axia Series - Red Line</h3>
      </a>
    </li>
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="../Racing/cruising_section/img/cruising_section.jpg" alt="Racing Sails">
    </div>
  </figure>
</section>

<script src="../Racing/cruising_section/cruising_section.js?v=<?= $jsTime ?>" defer></script>

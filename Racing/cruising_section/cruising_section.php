<?php
$cssTime = filemtime('../Racing/cruising_section/cruising_section.css');
$jsTime  = filemtime('../Racing/cruising_section/cruising_section.js');

$img1Time = filemtime('../Racing/cruising_section/img/navigator.png');
$img2Time = filemtime('../Racing/cruising_section/img/Endurance.png');
$img3Time = filemtime('../Racing/cruising_section/img/voyager.png');
$img4Time = filemtime('../Racing/cruising_section/img/racing_section.jpg');
?>

<link rel="stylesheet" href="../Racing/cruising_section/cruising_section.css?v=<?= $cssTime ?>">

<section class="cruising-section" aria-labelledby="cruising-title">
  <div class="img-title-sailing-content">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <h2 id="cruising-title" class="cruising-title">Racing Sails</h2>

  <p class="cruising-subtitle">
    When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...
  </p>

  <ul class="cruising-icons" role="list">
    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_race_series/index.php">
        <img src="../Racing/cruising_section/img/navigator.png?v=<?= $img1Time ?>" alt="Navigator Icon">
        <h3 class="series">Race</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_fiberpath_series/index.php">
        <img src="../Racing/cruising_section/img/Endurance.png?v=<?= $img2Time ?>" alt="Endurance Icon">
        <h3 class="series">FiberPath</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../racing_red_line_series/index.php">
        <img src="../Racing/cruising_section/img/voyager.png?v=<?= $img3Time ?>" alt="Voyager Icon">
        <h3 class="series">The Axia Series - Red Line</h3>
      </a>
    </li>
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="../Racing/cruising_section/img/racing_section.jpg?v=<?= $img4Time ?>" alt="Racing Sails">
    </div>
  </figure>
</section>

<script src="../Racing/cruising_section/cruising_section.js?v=<?= $jsTime ?>" defer></script>

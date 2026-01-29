<?php
$cssTime = filemtime('../Cruising/cruising_section/cruising_section.css');
$jsTime  = filemtime('../Cruising/cruising_section/cruising_section.js');
?>

<link rel="stylesheet" href="../Cruising/cruising_section/cruising_section.css?v=<?= $cssTime ?>">

<section class="cruising-section" aria-labelledby="cruising-title">
  <p class="cruising-label">Essential</p>

  <h2 id="cruising-title" class="cruising-title">Cruising sails</h2>

  <p class="cruising-subtitle">
    When it comes to cruising sails, durability and ease of use are key. The Navigator Series, Endurance Series,
    Voyager Series, and Expedition Series are all popular choices for cruisers, each with their own unique
    features and benefits...
  </p>

  <ul class="cruising-icons" role="list">
    <li class="cruising-icon">
      <a class="cruising-link" href="../cruising_navigator/index.php">
        <img src="../Cruising/cruising_section/img/navigator.png" alt="Navigator Icon">
        <h3 class="series">Navigator</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../cruising_endurance/index.php">
        <img src="../Cruising/cruising_section/img/Endurance.png" alt="Endurance Icon">
        <h3 class="series">Endurance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../cruising_voyager/index.php">
        <img src="../Cruising/cruising_section/img/voyager.png" alt="Voyager Icon">
        <h3 class="series">Voyager</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../cruising_performance/index.php">
        <img src="../Cruising/cruising_section/img/performance.png" alt="Performance Icon">
        <h3 class="series">Performance</h3>
      </a>
    </li>

    <li class="cruising-icon">
      <a class="cruising-link" href="../cruising_downwind/index.php">
        <img src="../Cruising/cruising_section/img/downwind.png" alt="Downwind Icon">
        <h3 class="series">Downwind</h3>
      </a>
    </li>
  </ul>

  <figure class="cruising-image">
    <div class="cruising-image-inner">
      <img src="../Cruising/cruising_section/img/cruising_section.jpg" alt="Cruising Sails">
    </div>
  </figure>
</section>

<script src="../Cruising/cruising_section/cruising_section.js?v=<?= $jsTime ?>" defer></script>

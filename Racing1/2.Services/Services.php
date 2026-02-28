<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<section class="text" data-sr-reveal>
  <a class="link_a sr-item" href="../SailTypes/index.php">&lt; Sail types</a>

  <h1 class="sr-item">Racing Sails <br> </h1>
  <br><br><br>

  <p class="sr-item">
    Racing sails are optimized for both upwind and downwind sailing. Upwind racing sails, such as the Pannelled Race Series and Fiberpath Regatta, are designed to generate maximum lift and minimize drag. These sails are typically made from high-tech materials like carbon or aramid fibers, which offer superior shape retention and performance in a wide range of wind conditions. Downwind racing sails like the "Red Line Spinnaker" are designed to capture as much wind as possible and provide maximum downwind speed. These sails are typically made from lightweight materials like nylon or polyester, which offer stability and ease of handling.
  </p>

  <p class="sr-item">
    When it comes to racing sails, speed is everything. There are several different types of racing sails available, including the Pannelled Race Series, Fiberpath Regatta, and Fiberpath GP. These sails are designed for maximum speed and performance in a wide range of wind conditions. The "Red Line Spinnaker" is a popular choice for downwind racing, as it is designed to capture as much wind as possible and provide maximum speed. Racing sails are typically made from high-tech materials like carbon or aramid fibers, which offer superior shape retention and performance. Choose racing sails to ensure your boat is optimized for speed and performance on the water. <br><br>
  </p>

  <div class="box-container-racing">
    <a class="sr-item" href="../Racing-1.PannelledRaceSeries/index.php">
      <div class="box-services pictureCruising1">
        <div class="wrap-box-services">
          <h3>Pannelled Race Series</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a class="sr-item" href="../Racing-2.FiberpathRegatta/index.php">
      <div class="box-services pictureCruising2">
        <div class="wrap-box-services">
          <h3>Fiberpath Regatta</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a class="sr-item" href="../Racing-3.FiberpathGP/index.php">
      <div class="box-services pictureCruising3">
        <div class="wrap-box-services">
          <h3>Fiberpath GP</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>

    <a class="sr-item" href="../Racing-4.RedLineSpinnakers/index.php">
      <div class="box-services pictureCruising4">
        <div class="wrap-box-services">
          <h3>Red Line Spinnaker</h3>
          <h4>See more</h4>
        </div>
      </div>
    </a>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>

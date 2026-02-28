<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<!-- === CONTENIDO DE LA PÁGINA === -->
<section class="text" data-sr-reveal>
  <!-- Enlace de regreso a Racing Sails -->
  <a class="link_a sr-item" href="../Racing/index.php">&lt; Racing Sails</a>

  <!-- Título de la página -->
  <h1 class="sr-item">Fiberpath Regatta</h1>

  <!-- Contenido informativo -->
  <p class="sr-item">Sailcloth is the material used to make the sails of a boat. It is typically made from a woven fabric that is designed to be lightweight, strong, and durable, while also having properties that allow it to perform well in the wind.</p>

  <p class="sr-item">FiberPath Regatta is a type of sailcloth material that is known for its high performance and durability. It is made from a blend of high-strength fibers, including carbon, aramid, and Dyneema. These fibers are woven together in a specific pattern to create a strong and lightweight fabric.</p>

  <p class="sr-item">One of the key benefits of FiberPath Regatta is its low stretch properties. This means that the sail will maintain its shape and performance characteristics even when under heavy load. This makes it an ideal choice for racing sails, where speed and agility are critical to success. FiberPath Regatta is also highly resistant to UV damage, which is important for sails that are frequently exposed to sunlight. The material is typically available in a range of weights and configurations to suit different types of sails and boats.</p>

  <p class="sr-item">In addition to FiberPath Regatta, there are many other types of sailcloth materials available on the market. These include laminated sailcloth, woven Dacron, and Mylar film. Each type of material has its own unique properties and advantages, and the choice of material will depend on a variety of factors, such as the type of boat, the sailing conditions, and the sailor's preferences and budget.</p>

  <!-- Botones de acción -->
  <div class="Container_bottom">
    <a class="link_quote sr-item" href="../New_Sail_Quote/index.php">
      <div class="button_quote button_quote1">
        <h3>New Sail Quote</h3>
      </div>
    </a>

    <a class="link_quote sr-item" href="../New_Repair_Quote/index.php">
      <div class="button_quote button_quote2">
        <h3>Sail Repair Quote</h3>
      </div>
    </a>

    <a class="link_quote sr-item" href="../ContactUs/index.php">
      <div class="buttonTitle">
        <h3>Contact us</h3>
      </div>
    </a>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>

<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<!-- === Contenido de la sección de producto === -->
<section class="text" data-sr-reveal>
  <!-- Enlace de regreso -->
  <a class="link_a sr-item" href="../Racing/index.php">&lt; Racing Sails</a>

  <!-- Título del producto -->
  <h1 class="sr-item">Fiberpath GP</h1>

  <!-- Descripción del producto -->
  <p class="sr-item">FiberPath GP is a type of high-performance sailcloth material that is designed for use in cruising sails. It is typically made from a blend of high-strength fibers, including carbon, aramid, and Dyneema, which are woven together to create a strong and lightweight fabric.</p>

  <p class="sr-item">One of the key features of FiberPath GP is its low stretch properties. This allows the sail to hold its shape and maintain its performance characteristics even under heavy load. This is particularly important for cruising sails that need to perform well in a variety of wind conditions.</p>

  <p class="sr-item">FiberPath GP is also highly resistant to UV damage, which is important for sails that are frequently exposed to sunlight. This helps to extend the life of the sail and maintain its performance over time.</p>

  <p class="sr-item">Compared to other high-performance sailcloth materials, such as laminated sailcloth or Mylar film, FiberPath GP is typically more affordable and is designed with cruising sailors in mind. It offers a good balance of durability, performance, and value that make it a popular choice for many cruising sailors around the world.</p>

  <p class="sr-item">The specific construction and panel layout of the sail will depend on the sailmaker's design and the intended use of the sail. In general, cruising sails made from FiberPath GP are designed to be reliable and easy to handle, while still providing good performance and speed on the water.</p>

  <!-- Botones de acción -->
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

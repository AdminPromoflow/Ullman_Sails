<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<section class="text" data-sr-reveal>
  <!-- Enlace para regresar -->
  <a class="link_a sr-item" href="../Racing/index.php">&lt; Racing Sails</a>

  <!-- Título de la página -->
  <h1 class="sr-item">Panelled Race Series</h1>

  <!-- Contenido informativo -->
  <p class="sr-item">Panelled race sails are a type of sail construction commonly used in racing. This method involves stitching together several panels of sailcloth to form a larger sail shape. The panels are usually cut from different parts of the sailcloth to optimise strength, stretch, and weight, resulting in a sail that is both strong and lightweight.</p>

  <p class="sr-item">These sails are often made from high-performance materials, such as FibrePath Regatta, laminated sailcloth, or Mylar film. These fabrics are selected for their strength, low stretch, and resistance to UV damage. The specific construction and layout depend on the sailmaker’s design and the sail’s intended use.</p>

  <p class="sr-item">Panelled race sails are popular across many racing classes because they offer excellent performance at a relatively affordable cost. They’re typically used on boats ranging from small dinghies to larger keelboats, providing maximum speed and efficiency in various wind conditions.</p>

  <p class="sr-item">There are also many other types of sail constructions available, including fully battened, partially battened, and furling sails. The right choice depends on the boat type, sailing conditions, and the sailor’s preferences and budget.</p>

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
        <h3>Contact Us</h3>
      </div>
    </a>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>

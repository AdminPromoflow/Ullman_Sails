<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>" >

<section class="text" data-sr-reveal>
  <a class="link_a sr-item" href="../Racing/index.php">&lt; Racing Sails</a>
  <h1 class="sr-item">Red Line Spinnakers</h1>

  <p class="sr-item">Ullman Sails Red Line Spinnakers are designed to be fast, stable, and easy to fly on the racecourse. Every sail in our Red Line Series is optimised for smoother aerodynamic flow that generates power and performance, resulting in greater boat speed.</p>

  <p class="sr-item">Red Line racing spinnakers are available in a selection of high-quality, brand-name performance spinnaker fabrics. Ullman Sails works directly with you to determine which cloth and weight best match your racing style and performance expectations.</p>

  <p class="sr-item">Our complete range of racing spinnakers covers all apparent wind angles and conditions. Each coded spinnaker is developed for optimal performance within the parameters of the sail’s intended use. Ullman Sails can help you determine the best selection for your inventory.</p>

  <h2 class="sr-item">Red Line Asymmetrical Series</h2>
  <p class="sr-item">Ullman Sails has become the leader in asymmetrical spinnaker development, dating back to early testing and success in one-design classes like the Melges 24, J/105, J/120, and skiffs. Today, one-design remains the foundation of our sail development programme for boats of all sizes.</p>

  <img class="sr-item" src="../Racing-4.RedLineSpinnakers/2.Services/Image/ullman-sails-racing-spinnakers-181x300.jpg" alt="Red Line Spinnaker Image">

  <h2 class="sr-item">Code Zero</h2>
  <p class="sr-item">The Code Zero has been used for over 20 years as an asymmetrical spinnaker that functions like a genoa. Designed with a mid-girth greater than 75% of the foot length, this sail is ideal for upwind and close-reach sailing.</p>

  <h2 class="sr-item">Red Line Symmetrical Series</h2>
  <p class="sr-item">Ullman Sails’ symmetrical racing spinnakers are specifically designed to maximise projected sail area, delivering enhanced performance and boat speed on the racecourse. Each sail is tailored to your boat's specifications and desired performance outcomes, making Ullman Red Line spinnakers an excellent addition to your downwind racing inventory.</p>

  <h2 class="sr-item">Standard Specifications</h2>
  <ul>
    <li class="sr-item">Radial construction</li>
    <li class="sr-item">Low-stretch Dacron leech tape</li>
    <li class="sr-item">Sail numbers</li>
    <li class="sr-item">Polyester leech and foot cords</li>
    <li class="sr-item">Luff cords</li>
    <li class="sr-item">Stainless steel rings</li>
  </ul>

  <h2 class="sr-item">Available Upgrades</h2>
  <ul>
    <li class="sr-item">Custom graphics</li>
    <li class="sr-item">Retriever patch</li>
    <li class="sr-item">Glued-only seams</li>
    <li class="sr-item">Standard V trim stripes</li>
    <li class="sr-item">Glow-in-the-dark V trim stripes</li>
  </ul>

  <div class="bottom sr-item">
    <p class="sr-item">Use our customiser to create your perfect personalised sail.</p>
    <img class="sr-item" src="../Racing-4.RedLineSpinnakers/2.Services/Image/Exam_redline.jpg" alt="Custom Spinnaker Example">
    <a class="sr-item" href="../Racing-4.RedLineSpinnakers-Customize/index.php">
      <button class="boton">Spinnaker Customiser</button>
    </a>
  </div>

  <div class="Container_bottom sr-item">
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
        <h3>Contact Us</h3>
      </div>
    </a>
  </div>
</section>

<script defer src="2.Services/Services.js?v=<?= $introJsVersion ?>"></script>

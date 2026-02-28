<?php
// Asset versioning for cache-busting (changes the URL whenever the file changes)
$introCssVersion = filemtime(__DIR__ . '/2.Services/Services.css');
$introJsVersion  = filemtime(__DIR__ . '/2.Services/Services.js');
?>

<link rel="stylesheet" href="2.Services/Services.css?v=<?= $introCssVersion ?>">


<section class="text" data-sr-reveal>
  <a class="link_a sr-item" href="../Cruising/index.php">&lt; Cruising Sails</a>

  <h1 class="sr-item">Blue Line Spinnakers</h1>

  <p class="sr-item">The Ullman Blue Line series is the ultimate complement to your cruising inventory. We design our cruising spinnakers to be easy to trim in a wide variety of conditions. We also offer systems such as the ATN spinnaker sock to make hoisting and dousing easy. Blue Line spinnakers add speed and performance to your adventures while making cruising safe and enjoyable for everyone on board.</p>

  <h2 class="sr-item">Cruising AP Spinnaker</h2>
  <p class="sr-item">Our standard Blue Line asymmetrical spinnakers are built at 165% so that they are large enough to get your boat moving, but sized to keep you under control. Most AP spinnakers are made with 1.5oz nylon for strength and durability – the optimal choice for you to keep your spinnaker hoisted in a wide range of wind conditions. We also offer different weight cloths to match your cruising style and goals.</p>

  <h2 class="sr-item">Cruising Mini Spinnaker</h2>
  <p class="sr-item">Our Blue Line Mini is sized smaller than our AP spinnaker at 145%. This sail is designed to take out sailing anytime and is an excellent option for singlehanded cruisers or novice spinnaker trimmers. Designed with a narrow sail shape, the Mini is less likely to become overpowered and is easier to handle whether hoisting solo or dousing with an ATN spinnaker sock. Like the AP, the Mini is made out of 1.5oz high quality nylon.</p>

  <h2 class="sr-item">Sail Cloth Selection and Construction</h2>
  <p class="sr-item">Our Blue Line spinnakers are made with high-quality cruising nylon so your sail is softer and easier to handle than a standard racing spinnaker. We also use a heavier weight of nylon to ensure you have a durable sail that will last for years on the water. Each sail is designed using a tri-radial panel layout and reinforced with triple-step seams and radial corner patches to make the sail stronger and hold its performance shape longer.</p>

  <h2 class="sr-item">Standard Specifications</h2>
  <ul class="sr-item">
    <li>Radial construction</li>
    <li>Triple-step stitching on every seam</li>
    <li>Radial patches</li>
    <li>Nylon or Dacron leech tapes</li>
    <li>High-tenacity luff lines for larger sails</li>
    <li>Stainless steel rings</li>
  </ul>

  <h2 class="sr-item">Available Upgrades</h2>
  <ul class="sr-item">
    <li>Custom graphics</li>
    <li>Retriever patch</li>
  </ul>

  <div class="bottom sr-item">
    <p>Use our tool to create your perfect personalized sail.</p>
    <img src="../Cruising-5.BlueLineSpinnakers/2.Services/Image/ExampBlueLineSpinnakers.jpg" alt="Spinnaker Example">
    <a href="../Cuising-6.BlueLineSpinnakers-Customize/index.php">
      <button class="boton">Spinnaker Customizer</button>
    </a>
  </div>

  <h2 class="sr-item">Sail Handling and Sail Accessories</h2>
  <p class="sr-item">Our sailmakers will customize your sail with the appropriate hardware and finishing details to fit your furling or other handling systems. We also provide or can assist with:</p>
  <ul class="sr-item">
    <li>Furling systems and installation</li>
    <li>Spinnaker sleeves/socks</li>
    <li>Spinnaker tackers</li>
  </ul>

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

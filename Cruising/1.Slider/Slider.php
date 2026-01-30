<?php
$introCssFile = __DIR__ . '/Cruising/1.Slider/Slider.css';

$introCssVersion = is_file($introCssFile) ? filemtime($introCssFile) : null;
?>

<link rel="stylesheet" href="Cruising/1.Slider/Slider.css<?= $introCssVersion ? '?v='.$introCssVersion : '' ?>">


<section id="slideHome" class="slideHome">
  <div class="gradientSlideHome">


  </div>
</section>

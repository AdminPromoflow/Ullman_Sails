<?php
$cssVer = file_exists(__DIR__ . '/../home/3_covers/covers.css')
  ? filemtime(__DIR__ . '/../home/3_covers/covers.css')
  : '';

$jsVer = file_exists(__DIR__ . '/../home/3_covers/covers.js')
  ? filemtime(__DIR__ . '/../home/3_covers/covers.js')
  : '';
?>

<link rel="stylesheet" href="../home/3_covers/covers.css<?= $cssVer ? '?v=' . $cssVer : '' ?>">

<section class="covers" aria-labelledby="covers-title">
  <div class="section_covers">
    <div class="img-title-sailing-content">
      <img
        src="../cruising_navigator/1_introduction/img/ullman_sails.png"
        alt="Ullman Sails"
        decoding="async"
        width="240"
        height="72"
      >
    </div>

    <h1 id="covers-title">Covers</h1>

    <div class="covers_button">
      <a href="../Covers/index.php" class="covers_link">
        <h3>See more</h3>
      </a>
    </div>
  </div>
</section>

<script defer src="../home/3_covers/covers.js<?= $jsVer ? '?v=' . $jsVer : '' ?>"></script>

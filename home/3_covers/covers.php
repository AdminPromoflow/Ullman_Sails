<?php $cssVer = file_exists(__DIR__ . '/../home/3_covers/covers.css') ? filemtime(__DIR__ . '/../home/3_covers/covers.css') : ''; ?>
<link rel="stylesheet" href="../home/3_covers/covers.css<?= $cssVer ? '?v=' . $cssVer : '' ?>">

<section class="covers">
    <div class="section_covers">
      <h1>Covers</h1>
      <a href="../Covers/index.php" class="covers_link">
      <span class="covers_button">See more</span>
      </a>
    </div>
</section>

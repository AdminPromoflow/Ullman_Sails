<?php
declare(strict_types=1);

/* ---------------------------------------------
   Page arrows — same pattern (versioned assets)
---------------------------------------------- */

function asset_v(string $fsPath): int {
  return is_file($fsPath) ? filemtime($fsPath) : time();
}

$cssFs = __DIR__ . '/../general/arrows_up_down/arrows_up_down.css';
$jsFs  = __DIR__ . '/../general/arrows_up_down/arrows_up_down.js';

$imgUpFs   = __DIR__ . '/../general/arrows_up_down/img/arrow_up.png';
$imgDownFs = __DIR__ . '/../general/arrows_up_down/img/arrow_down.png';

$cssV = asset_v($cssFs);
$jsV  = asset_v($jsFs);
$upV  = asset_v($imgUpFs);
$dnV  = asset_v($imgDownFs);
?>

<link rel="stylesheet" href="../general/arrows_up_down/arrows_up_down.css?v=<?= $cssV ?>">

<button id="arrow_up_page" class="page_arrow page_arrow--up" type="button" aria-label="Scroll up">
  <img src="../general/arrows_up_down/img/arrow_up.png?v=<?= $upV ?>" alt="" aria-hidden="true" decoding="async">
</button>

<button id="arrow_down_page" class="page_arrow page_arrow--down" type="button" aria-label="Scroll down">
  <img src="../general/arrows_up_down/img/arrow_down.png?v=<?= $dnV ?>" alt="" aria-hidden="true" decoding="async">
</button>

<script src="../general/arrows_up_down/arrows_up_down.js?v=<?= $jsV ?>" defer></script>

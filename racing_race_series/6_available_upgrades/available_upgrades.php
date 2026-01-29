<?php
declare(strict_types=1);

function esc(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function versioned_asset(string $publicPath, string $fsPath): string {
  if (!is_file($fsPath)) {
    return $publicPath;
  }
  $v = filemtime($fsPath);
  $sep = str_contains($publicPath, '?') ? '&' : '?';
  return $publicPath . $sep . 'v=' . $v;
}

/* Public + filesystem paths */
$cssPublic = '6_available_upgrades/available_upgrades.css';
$cssFs     = __DIR__ . '/6_available_upgrades/available_upgrades.css';
$cssHref   = versioned_asset($cssPublic, $cssFs);

$upgrades = [
  [
    'title' => 'Race Dacron cloth',
    'text'  => 'Crosscut or radial woven polyester for crisp shape and reliable club-race durability afloat.',
  ],
  [
    'title' => 'Race Laminate cloth',
    'text'  => 'Laminate and non-woven textile builds for lighter weight and sharper response in trim fast.',
  ],
  [
    'title' => 'Luff systems',
    'text'  => 'Upgrade luff hardware for smoother hoists better load sharing and cleaner entry sail shape.',
  ],
  [
    'title' => 'Telltale windows',
    'text'  => 'Add telltale windows for quicker reads of flow and easier, more consistent trimming set-up.',
  ],
  [
    'title' => 'Glowfast draft stripes',
    'text'  => 'Glowfast luminous tape draft stripes improve night visibility and trim reference marks too.',
  ],
  [
    'title' => 'Lite Skin finishing',
    'text'  => 'Lite Skin finishing boosts durability and adds a stealth look with minimal weight gain too.',
  ],
  [
    'title' => 'Carbon & aramid laminates',
    'text'  => ' Carbon/aramid laminate options deliver low stretch, stable shape and fast acceleration too.',
  ],
  [
    'title' => 'High-performance battens',
    'text'  => 'High-performance battens and receptacles improve stability, leech control and response too.',
  ],
  [
    'title' => 'Corner reinforcements',
    'text'  => ' Extra corner patches or webbed rings spread loads and resist distortion at high loads well.',
  ],
  [
    'title' => 'Carbon battens',
    'text'  => 'Carbon battens reduce weight aloft and increase stiffness for a sharper stable profile now.',
  ],

];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline">The Race Series</p>
      <h2 id="au-title" class="au-title">Available Options and Upgrades</h2>
      <p class="au-subtitle">
        Radial-built club/class race sails: broad trim range, responsive handling, durable upgrades.
      </p>
    </header>

    <div class="au-list" role="list">
      <?php foreach ($upgrades as $i => $item): ?>
        <?php $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT); ?>

        <article class="au-row" role="listitem">
          <div class="au-num" aria-hidden="true"><?= esc($num) ?></div>

          <div class="au-body">
            <h3 class="au-row-title"><?= esc((string)$item['title']) ?></h3>
            <p class="au-row-text"><?= esc((string)$item['text']) ?></p>
          </div>
        </article>

        <?php if ($i < $total - 1): ?>
          <hr class="au-divider" aria-hidden="true">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

  </div>
</section>

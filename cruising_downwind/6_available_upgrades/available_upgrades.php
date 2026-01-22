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
$cssPublic = '../cruising_navigator/6_available_upgrades/available_upgrades.css';
$cssFs     = __DIR__ . '/../cruising_navigator/6_available_upgrades/available_upgrades.css';
$cssHref   = versioned_asset($cssPublic, $cssFs);

$upgrades = [
  [
    'title' => 'Custom graphics',
    'text'  => 'Personalise Blue Line or Axia Blue Line with your artwork for a distinctive, easy-to-spot sail.',
  ],
  [
    'title' => 'Retriever patch (DOWNWIND)',
    'text'  => 'Add a Blue Line retriever patch to gather the sail quickly on the drop, making recoveries safer and easier.',
  ],
];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline">Downwind Series</p>
      <h2 id="au-title" class="au-title">Available Options and Upgrades</h2>
      <p class="au-subtitle">
        Enhance performance, durability, and ease of use with tailored options for your sail and sailing style.
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

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
    'title' => 'V trim stripes (standard / glow option)',
    'text'  => 'Clear reference angles for repeatable, fast, stable trim modes; available in standard or glow-in-the-dark for low-light sailing.',
  ],
  [
    'title' => 'Custom draft stripes & numbers',
    'text'  => 'Easy sail ID and readable trim targets at speed.',
  ],
  [
    'title' => 'Top-down furling set-up',
    'text'  => 'Cleaner deployment and recovery for both code sails and spinnakers.',
  ],
  [
    'title' => 'Retriever (take-down) patches ',
    'text'  => 'Reinforced retrieval zones to reduce wear during fast douses and pack-downs.',
  ],
  [
    'title' => 'Torsional luff cables',
    'text'  => 'Better torque transfer for steadier luff control and cleaner furling.',
  ],
  [
    'title' => 'Furling clew Velcro tabs',
    'text'  => 'Clew control during furling for tidy on-board stowage.',
  ],
  [
    'title' => 'Soft clew',
    'text'  => 'Reduced point loads, easier handling, and smoother flying shapes.',
  ],
  [
    'title' => 'Custom graphics',
    'text'  => 'Personal branding without compromising performance.',
  ],
  [
    'title' => 'Glued-only seams (if specified)',
    'text'  => 'Adhesive-only seam construction available by request where the build spec prioritises minimal stitch lines and a clean finish.',
  ],



];

$total = count($upgrades);
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<section class="available_upgrades" aria-labelledby="au-title">
  <div class="au-wrap">

    <header class="au-header">
      <p class="au-tagline">The Axia Series - Red Line</p>
      <h2 id="au-title" class="au-title">Available Options and Upgrades</h2>
      <p class="au-subtitle">
        Downwind racing codes and spinnakers: quick launch, clean rotation, and Active Luff furling options.
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

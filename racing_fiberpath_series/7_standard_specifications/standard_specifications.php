<?php
declare(strict_types=1);

/* Filesystem paths (for filemtime) */
$ssCssFs = __DIR__ . '/7_standard_specifications/standard_specifications.css';

/* Public path */
$ssCssPublic = '7_standard_specifications/standard_specifications.css';

/* Version */
$ssCssV = is_file($ssCssFs) ? filemtime($ssCssFs) : time();

/**
 * Standard specification items.
 * Using an array keeps the markup DRY and reduces maintenance errors.
 */
$ss_features = [
  'Stitching',
  'Rings',
  'Thread ',
  'Slides',
  'Batten pockets',
  'Patches',
  'Construction adhesive',
  'Sail numbers',
  'Draft stripes',
  'Telltales',
];
?>

<link rel="stylesheet" href="<?= $ssCssPublic ?>?v=<?= $ssCssV ?>">

<section class="standard_specifications" aria-labelledby="ss-title">
  <div class="ss-wrap">

    <header class="ss-header">
      <h2 id="ss-title" class="ss-title">Standard Specifications</h2>
      <p class="ss-subtitle">Triple-step seams, Dyneema rings, UV thread, reinforcements, trim aids—race durable & repeatable.</p>
    </header>

    <div class="ss-grid">

      <figure class="ss-figure">
        <div class="ss-image">
          <img
            src="7_standard_specifications/img/standard_specifications.jpg"
            alt="Navigator sail standard specifications"
            loading="lazy"
            decoding="async"
          >
        </div>
      </figure>

      <ol class="ss-list">
        <?php foreach ($ss_features as $i => $feature): ?>
          <?php
            $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            $safe_feature = htmlspecialchars((string)$feature, ENT_QUOTES, 'UTF-8');
          ?>
          <li class="ss-row">
            <span class="ss-num" aria-hidden="true"><?= $num ?></span>
            <div class="ss-main">
              <h3 class="ss-row-title"><?= $safe_feature ?></h3>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

    </div>

  </div>
</section>

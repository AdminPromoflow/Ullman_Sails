<?php
declare(strict_types=1);

// =========================
// Strength in the Details — items + shared SVG
// =========================
$dac_cube_svg = <<<SVG
<svg class="dac-cube" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
  <polygon points="12,2 22,7 12,12 2,7" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="2,7 12,12 12,22 2,17" fill="#ffffff" stroke="#0f2140" stroke-width="1.4"></polygon>
  <polygon points="22,7 12,12 12,22 22,17" fill="#0f2140" stroke="#0f2140" stroke-width="1.4"></polygon>
</svg>
SVG;

$sid_items = [
  [
    'title' => 'Nylon spinnaker cloth',
    'text'  => 'Uses cruising nylon spinnaker cloth for strength and long service life; Blue Line commonly uses 1.5oz nylon, while Axia Blue Line specifies nylon cloth too.',
  ],
  [
    'title' => 'Radial construction',
    'text'  => 'Built with radial construction (tri-radial layouts and radial patches) to align loads, hold shape longer, and reduce distortion as the sail works downwind.',
  ],
  [
    'title' => 'Cruising durability focus',
    'text'  => 'Positioned as durable cruising downwind sails, focusing on strength, longevity and reliable performance across changing conditions rather than race-only edge.',
  ],
  [
    'title' => 'Handling aids and furling',
    'text'  => 'Supports easier hoists and drops with handling systems such as spinnaker socks, and integrates furling options like top-down setups and torsional luff cables.',
  ],
  [
    'title' => 'Custom graphics',
    'text'  => 'Offers custom graphics as an upgrade, letting owners personalise the sail’s look for easy identification while keeping cruising-focused materials and construction.',
  ],
];

// Filesystem paths (for filemtime)
$sidCssFs = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsFs  = __DIR__ . '/4_durability_and_reinforcement/durability_and_reinforcement.js';

// Public paths
$sidCssPublic = '4_durability_and_reinforcement/durability_and_reinforcement.css';
$sidJsPublic  = '4_durability_and_reinforcement/durability_and_reinforcement.js';

// Versions
$sidCssV = is_file($sidCssFs) ? filemtime($sidCssFs) : time();
$sidJsV  = is_file($sidJsFs)  ? filemtime($sidJsFs)  : time();
?>

<link rel="stylesheet" href="<?= $sidCssPublic ?>?v=<?= $sidCssV ?>">

<section class="strength-in-the-details" aria-labelledby="sid-title">
  <div class="sid-wrap">

    <header class="sid-header">
      <p class="sid-tagline">Blue Line & Axia Blue Line</p>
      <h2 id="sid-title" class="sid-title">Durability and Handling</h2>
      <p class="sid-intro">
        Both Blue Line and Axia Blue Line emphasise durability for downwind cruising, pairing robust nylon cloth with radial builds, plus handling options and custom upgrades to suit your rig.
      </p>
    </header>

    <hr class="sid-divider" aria-hidden="true">

    <div class="sid-grid">
      <?php foreach ($sid_items as $item): ?>
        <article class="sid-item">
          <div class="sid-media" aria-hidden="true">
            <div class="sid-media-inner">
              <?= $dac_cube_svg ?>
            </div>
          </div>

          <div class="sid-content">
            <h3 class="sid-item-title"><?= htmlspecialchars((string)$item['title'], ENT_QUOTES, 'UTF-8') ?></h3>
            <p class="sid-item-text"><?= htmlspecialchars((string)$item['text'], ENT_QUOTES, 'UTF-8') ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<script defer src="<?= $sidJsPublic ?>?v=<?= $sidJsV ?>" type="text/javascript"></script>

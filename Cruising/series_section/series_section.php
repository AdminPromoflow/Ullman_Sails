<?php
declare(strict_types=1);

function esc(string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function versioned_asset(string $publicPath, string $fsPath): string {
  if (!is_file($fsPath)) {
    return $publicPath; // fallback limpio: sin v=
  }
  $v = filemtime($fsPath);
  $sep = str_contains($publicPath, '?') ? '&' : '?';
  return $publicPath . $sep . 'v=' . $v;
}

// Assets (public + filesystem)
$assetsPublicBase = '../Cruising/series_section';
$assetsFsBase     = __DIR__ . '/../Cruising/series_section';

$cssHref = versioned_asset(
  $assetsPublicBase . '/series_section.css',
  $assetsFsBase . '/series_section.css'
);

$jsSrc = versioned_asset(
  $assetsPublicBase . '/series_section.js',
  $assetsFsBase . '/series_section.js'
);

// Data
$series = [
  [
    'key'     => 'navigator',
    'title'   => 'Navigator Series',
    'code'    => 'NAVIGATOR',
    'tagline' => 'Built for Everyday Cruising',
    'img'     => '../Cruising/sail_types_section/img/Navigator.png',
    'alt'     => 'Navigator Series cruising sails',
    'href'    => '../Cruising-1.Navigator/index.php',
    'body'    => [
      'The Navigator Series is designed for reliable, all-round cruising. A balanced build helps maintain shape and deliver consistent handling across a wide range of conditions.',
      'Practical construction and thoughtful detailing make it a dependable choice for regular sailing and long seasons.',
    ],
    'clothName' => 'NAVIGATOR DACRON',
    'clothText' => 'A proven Dacron option focused on durability, easy care, and long-term cruising performance.',
    'reversed'  => false,
  ],
  [
    'key'     => 'endurance',
    'title'   => 'Endurance Series',
    'code'    => 'ENDURANCE',
    'tagline' => 'Built for Longer Seasons & Heavy Use',
    'img'     => '../Cruising/sail_types_section/img/Endurance.png',
    'alt'     => 'Endurance Series cruising sails',
    'href'    => '../Cruising-2.Endurance/index.php',
    'body'    => [
      'The Endurance Series is designed for cruisers who sail often and want extra longevity. Reinforcements are focused on high-load areas to reduce wear over time.',
      'A tougher build approach helps the sail hold shape longer, cope with repeated hoists, and stay dependable in a wider range of real-world conditions.',
    ],
    'clothName' => 'ENDURANCE DACRON',
    'clothText' => 'A more robust Dacron option aimed at durability and long-term cruising reliability, with practical details and a clean, hard-wearing finish.',
    'reversed'  => true,
  ],
  [
    'key'     => 'voyager',
    'title'   => 'Voyager Series',
    'code'    => 'VOYAGER',
    'tagline' => 'Built for Smooth Handling & Versatility',
    'img'     => '../Cruising/sail_types_section/img/Voyager.png',
    'alt'     => 'Voyager Series cruising sails',
    'href'    => '../Cruising-3.Voyager/index.php',
    'body'    => [
      'The Voyager Series is aimed at comfortable cruising with a focus on balanced handling and dependable shape.',
      'Designed to feel easy on the winches and predictable across changing conditions.',
    ],
    'clothName' => 'VOYAGER DACRON',
    'clothText' => 'A cruising-focused cloth choice for reliable performance and everyday durability.',
    'reversed'  => false,
  ],
  [
    'key'     => 'expedition',
    'title'   => 'Expedition Series',
    'code'    => 'EXPEDITION',
    'tagline' => 'Built for Distance & Demanding Conditions',
    'img'     => '../Cruising/sail_types_section/img/Performance.png',
    'alt'     => 'Expedition Series cruising sails',
    'href'    => '../Cruising-4.Expedition/index.php',
    'body'    => [
      'The Expedition Series is built for sailors planning longer passages and wanting a stronger, confidence-inspiring build.',
      'Extra structure and reinforcement help keep the sail stable and reliable when conditions build.',
    ],
    'clothName' => 'EXPEDITION CLOTH',
    'clothText' => 'A tougher specification aimed at durability and shape retention for extended cruising.',
    'reversed'  => true,
  ],
  [
    'key'     => 'blueline',
    'title'   => 'Blue Line Spinnakers',
    'code'    => 'BLUE LINE',
    'tagline' => 'Built for Downwind Enjoyment',
    'img'     => '../Cruising/sail_types_section/img/Downwind.png',
    'alt'     => 'Blue Line Spinnakers downwind sails',
    'href'    => '../Cruising-5.BlueLineSpinnakers/index.php',
    'body'    => [
      'Blue Line Spinnakers are designed to make downwind sailing more fun, stable, and efficient—ideal for cruising programs.',
      'A focus on easy trimming and dependable flying shape helps keep the experience smooth and enjoyable.',
    ],
    'clothName' => 'SPINNAKER CLOTH',
    'clothText' => 'A purpose-built cloth selection for downwind sails, balancing stability, strength, and handling.',
    'reversed'  => false,
  ],
];
?>

<link rel="stylesheet" href="<?= esc($cssHref) ?>">

<div class="series-list">
  <?php foreach ($series as $s): ?>
    <?php $titleId = 'series-title-' . $s['key']; ?>
    <section class="series-section<?= $s['reversed'] ? ' is-reversed' : '' ?>" aria-labelledby="<?= esc($titleId) ?>">
      <header class="series-header">
        <p class="series-subtitle">EXPLORE</p>
        <h2 id="<?= esc($titleId) ?>" class="series-title"><?= esc($s['title']) ?></h2>
      </header>

      <div class="series-container">
        <figure class="series-image">
          <img
            src="<?= esc($s['img']) ?>"
            alt="<?= esc($s['alt']) ?>"
            loading="lazy"
            decoding="async"
          />
          <!-- <a class="view-brochure" href="<?= esc($s['href']) ?>">View Brochure</a> -->
        </figure>

        <div class="series-text">
          <h3 class="series-code"><?= esc($s['code']) ?></h3>
          <p class="series-tagline"><?= esc($s['tagline']) ?></p>

          <?php foreach ($s['body'] as $p): ?>
            <p><?= esc($p) ?></p>
          <?php endforeach; ?>

          <hr class="series-divider" aria-hidden="true">

          <h4 class="series-cloth">Cloth <em>Selection</em></h4>
          <p><strong><?= esc($s['clothName']) ?></strong></p>
          <p><?= esc($s['clothText']) ?></p>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
</div>

<script src="<?= esc($jsSrc) ?>" defer></script>

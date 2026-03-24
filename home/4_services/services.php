<?php $cssVer = file_exists(__DIR__ . '/../home/4_services/services.css') ? filemtime(__DIR__ . '/../home/4_services/services.css') : ''; ?>
<?php $jsVer = file_exists(__DIR__ . '/../home/4_services/services.js') ? filemtime(__DIR__ . '/../home/4_services/services.js') : ''; ?>

<link rel="stylesheet" href="../home/4_services/services.css<?= $cssVer ? '?v=' . $cssVer : '' ?>">

<section class="events-section" aria-labelledby="sail_types_title">
  <div class="events-shell">

    <header class="events-header">
      <div class="img-title-sailing-content">
        <img
          src="../cruising_navigator/1_introduction/img/ullman_sails.png"
          alt="Ullman Sails"
          decoding="async"
          width="240"
          height="72"
        >
      </div>

      <h1 id="sail_types_title" class="sail_types_title">Services</h1>
    </header>

    <div class="events-list">

      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="../home/4_services/img/services.jpg"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title">All Sails Repair</h3>
          <p class="event-card__subtitle">Restore freshness and comfort to your sails and canvas.</p>

          <p class="event-card__text">
            Bring new life to tired sails and fabric covers with a careful service designed to
            improve freshness, appearance and everyday comfort on board.
          </p>
        </div>

        <div class="event-card__action">
          <a href="#" class="st-btn st-btn-dark">See more</a>
        </div>
      </article>




      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="../home/4_services/img/cleaning.jpg"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title">Sail and Canvas Cleaning</h3>
          <p class="event-card__subtitle">Professional cleaning for a cleaner finish and longer life.</p>

          <p class="event-card__text">
            Our cleaning service helps remove built-up dirt, marks and salt residue while preserving
            the look, feel and long-term performance of your sails and canvas.
          </p>
        </div>

        <div class="event-card__action">
          <a href="#" class="st-btn st-btn-dark">See more</a>
        </div>
      </article>






      <article class="event-card">
        <div class="event-card__media" aria-hidden="true">
          <div class="event-card__placeholder">
            <img
              class="event-card__image"
              src="../home/4_services/img/covers.jpg"
              alt=""
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <div class="event-card__content">
          <h3 class="event-card__title">Canvas Repair</h3>
          <p class="event-card__subtitle">Reliable repair work to bring damaged canvas back into shape.</p>

          <p class="event-card__text">
            From worn seams to damaged panels, we carry out dependable repair work that helps restore
            strength, function and a neat finish to your canvas.
          </p>
        </div>

        <div class="event-card__action">
          <a href="#" class="st-btn st-btn-dark">See more</a>
        </div>
      </article>


    </div>
  </div>
</section>

<script defer src="../home/4_services/services.js<?= $jsVer ? '?v=' . $jsVer : '' ?>"></script>

<?php
$cssTime = filemtime('../Home/5.Video/video.css');
$jsTime = filemtime('../Home/5.Video/video.js');
?>

<link rel="stylesheet" href="../Home/5.Video/video.css?v=<?= $cssTime ?>">
<section class="contactus-hero" aria-labelledby="contactus-main-heading">
  <!-- Left side -->
  <div class="contactus-hero__media">


    <div class="contactus-video-card">
      <video
        class="contactus-video"
        autoplay
        muted
        loop
        playsinline
        preload="auto"
        poster="../home/5.Video/img/contactus-poster.jpg"
      >
        <source src="../Home/5.Video/videoUpdated.mp4" type="video/mp4">
      </video>
    </div>
  </div>

  <!-- Right side -->
  <div class="contactus-hero__content">
    <div class="contactus-hero__content-inner">
      <div class="contactus-hero__brand contactus-hero__brand--right">
        <div class="img-title-sailing-content">
          <img
            src="../cruising_navigator/1_introduction/img/ullman_sails.png"
            alt="Ullman Sails"
            decoding="async"
            width="240"
            height="72"
          >
        </div>

        <h1 id="contactus-title-right" class="contactus-side-title">Contact us</h1>
      </div>


      <div class="contactus-hero__actions">
        <a href="../ContactUs/index.php" class="contactus-btn contactus-btn--primary">Contact us</a>
        <a href="../New_Sail_Quote/index.php" class="contactus-btn contactus-btn--secondary">New Sail Quote</a>
        <a href="../New_Repair_Quote/index.php" class="contactus-btn contactus-btn--secondary">New Repair Quote</a>
      </div>

    </div>
  </div>
</section>

<script src="../Home/5.Video/video.js?v=<?= $jsTime ?>" type="text/javascript"></script>

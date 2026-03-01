
<?php
$cssTime = filemtime('../Covers/new_sail_quote/new_sail_quote.css');
$jsTime  = filemtime('../Covers/new_sail_quote/new_sail_quote.js');

?>
<link rel="stylesheet" href="../Covers/new_sail_quote/new_sail_quote.css?v=<?= $cssTime ?>">

<div class="Container_bottom">
  <a class="link_quote" href="../ContactUs/index.php">
    <div class="button_quote button_quote2">
      <h3>Contact Us</h3>
    </div>
  </a>
</div>

<script src="../Covers/new_sail_quote/new_sail_quote.js?v=<?= $jsTime ?>" defer></script>

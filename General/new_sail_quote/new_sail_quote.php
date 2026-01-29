
<?php
$cssTime = filemtime('../General/new_sail_quote/new_sail_quote.css');
$jsTime  = filemtime('../General/new_sail_quote/new_sail_quote.js');

?>
<link rel="stylesheet" href="../General/new_sail_quote/new_sail_quote.css?v=<?= $cssTime ?>">

<div class="Container_bottom">
  <a class="link_quote" href="../New_Sail_Quote/index.php">
    <div class="button_quote button_quote2">
      <h3>New Sail Quote</h3>
    </div>
  </a>
</div>

<script src="../General/new_sail_quote/new_sail_quote.js?v=<?= $jsTime ?>" defer></script>

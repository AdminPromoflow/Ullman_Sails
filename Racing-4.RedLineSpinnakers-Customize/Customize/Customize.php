<?php
$customizeCss = '../Racing-4.RedLineSpinnakers-Customize/Customize/customize.css';
$customizeJs = '../Racing-4.RedLineSpinnakers-Customize/Customize/customize.js';

$svgPath = '../Racing-4.RedLineSpinnakers-Customize/Customize/svg/';

function assetVersion($filePath) {
  return file_exists($filePath) ? filemtime($filePath) : time();
}
?>

<link
  rel="stylesheet"
  href="<?php echo $customizeCss; ?>?v=<?php echo assetVersion($customizeCss); ?>"
>

<section class="customize" id="customize">

  <div class="customize-selects">

    <div class="select-group">
      <label for="sailType">Sail Type</label>

      <select id="sailType">
        <option value="raceAsym">Race: Axia Asym</option>
        <option value="raceSymm">Race: Axia Symm</option>
      </select>
    </div>

    <div class="select-group">
      <label for="clothWeight">Cloth Weight</label>

      <select id="clothWeight"></select>
    </div>

  </div>

  <div class="colours" id="availableColours"></div>

  <div id="contentDownload">

    <div class="sail-option active" id="raceAsym">
      <?php include $svgPath . 'Axia_Asym.php'; ?>
    </div>

    <div class="sail-option" id="raceSymm">
      <?php include $svgPath . 'Axia_symm.php'; ?>
    </div>

  </div>

  <div class="buttonTitle" id="downloadPDF">
    <h3 class="openContactUs">Download PDF</h3>
  </div>

</section>

<script src="<?php echo $customizeJs; ?>?v=<?php echo assetVersion($customizeJs); ?>"></script>

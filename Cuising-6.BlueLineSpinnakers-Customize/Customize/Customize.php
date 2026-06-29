<?php
$customizeCss = '../Cuising-6.BlueLineSpinnakers-Customize/Customize/customize.css';
$customizeJs = '../Cuising-6.BlueLineSpinnakers-Customize/Customize/customize.js';

$svgPath = '../Cuising-6.BlueLineSpinnakers-Customize/Customize/svg/';

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
        <option value="asymetric">Cruise: Axia Asym</option>
        <option value="symetric">Cruise: Axia Code 50</option>
        <option value="design3">Cruise: Axia Code 60</option>
        <option value="design4">Cruise: Axia Code 70</option>
        <option value="design5">Cruise: Axia Symm</option>
      </select>
    </div>

    <div class="select-group">
      <label for="clothWeight">Cloth Weight</label>

      <select id="clothWeight"></select>
    </div>

  </div>

  <div class="colours" id="availableColours"></div>

  <div id="contentDownload">

    <div class="sail-option active" id="asymetric">
      <?php include $svgPath . 'Axia_Asym.php'; ?>
    </div>

    <div class="sail-option" id="symetric">
      <?php include $svgPath . 'Axia_Code_50.php'; ?>
    </div>

    <div class="sail-option" id="design3">
      <?php include $svgPath . 'Axia_Code_60.php'; ?>
    </div>

    <div class="sail-option" id="design4">
      <?php include $svgPath . 'Axia_Code_70.php'; ?>
    </div>

    <div class="sail-option" id="design5">
      <?php include $svgPath . 'Axia_symm.php'; ?>
    </div>

  </div>

  <div class="buttonTitle" id="downloadPDF">
    <h3 class="openContactUs">Download PDF</h3>
  </div>

</section>

<script src="<?php echo $customizeJs; ?>?v=<?php echo assetVersion($customizeJs); ?>"></script>

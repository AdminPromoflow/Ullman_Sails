<?php
$baseDir = __DIR__;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Ullman Sails</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      background-color: #F8F8FA;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      color: #111C42;
      overflow-x: hidden;
    }

    p {
      font-size: 0.9em;
      line-height: 1.6;
    }

    h2 {
      color: #111C42;
      font-size: 2em;
    }

    h3 {
      color: #F2F2F2;
      font-size: 1.6em;
      font-weight: 500;
    }

    h4 {
      color: #111C42;
      font-size: 1em;
      font-weight: 500;
    }

    button {
      padding: 15px;
      border: none;
      background-color: #111C42;
      color: #F2F2F2;
      font-weight: 700;
      font-family: inherit;
      cursor: pointer;
      transition: background-color 0.25s ease, color 0.25s ease;
    }

    button:hover {
      background-color: #F2F2F2;
      color: #111C42;
    }

    header {
      padding: 50px;
      background-color: aquamarine;
      text-align: center;
    }

    nav {
      display: flex;
      flex-direction: row;
      background-color: #111C42;
    }

    nav a {
      padding: 14px 20px;
      color: #ffffff;
      text-decoration: none;
    }

    .searchHide,
    .searchContent {
      width: 100%;
    }
  </style>
</head>
<body>

  <?php include $baseDir . "/../General/Menu/Menu.php"; ?>

  <div id="searchHide" class="searchHide">
    <?php include $baseDir . "/1.Slider/Slider.php"; ?>
    <?php include $baseDir . "/../Covers-9.WheelLeathering/navigation/navigation.php"; ?>
    <?php include $baseDir . "/2.Services/Services.php"; ?>
  </div>

  <?php include $baseDir . "/../General/Charging/charging.php"; ?>

  <div id="searchContent" class="searchContent"></div>

  <?php include $baseDir . "/../General/Footer/Footer.php"; ?>

</body>
</html>

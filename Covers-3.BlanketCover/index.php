<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Ullman Sails</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style media="screen">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #F8F8FA;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      line-height: 1.5;
      color: #111C42;
    }

    p {
      font-size: 0.9em;
    }

    h2 {
      font-size: 2em;
      color: #111C42;
    }

    h3 {
      font-size: 1.6em;
      font-weight: 500;
      color: #F2F2F2;
    }

    h4 {
      font-size: 1em;
      font-weight: 500;
      color: #111C42;
    }

    button {
      padding: 15px;
      border: none;
      cursor: pointer;
      font-weight: bold;
      background-color: #111C42;
      color: #F2F2F2;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    button:hover {
      background-color: #F2F2F2;
      color: #111C42;
    }

    header {
      padding: 50px;
      text-align: center;
      background-color: aquamarine;
    }

    nav {
      display: flex;
      flex-direction: row;
      background-color: transparent;
    }

    nav a {
      padding: 14px 20px;
      text-decoration: none;
      color: #FFFFFF;
    }

    .searchHide,
    .searchContent {
      width: 100%;
    }
  </style>
</head>

<body>
  <?php include "../general/menu/menu.php"; ?>

  <div id="searchHide" class="searchHide">
    <?php include "1.Slider/Slider.php"; ?>
    <?php include "../Covers-3.BlanketCover/navigation/navigation.php"; ?>
    <?php include "Covers-3.BlanketCover/2.Services/Services.php"; ?>
  </div>

  <?php include "../general/charging/charging.php"; ?>

  <div id="searchContent" class="searchContent"></div>

  <?php include "../general/footer/Footer.php"; ?>
</body>
</html>

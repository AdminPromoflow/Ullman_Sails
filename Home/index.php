<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../home/style.css?v=<?= file_exists('../home/style.css') ? filemtime('home/style.css') : time() ?>">

  </head>
  <body id="container_accessories_home">


    <div id="searchHide" class="searchHide">
    <?php include "../general/menu/menu.php" ?>
    <?php include "../general/arrows_up_down/arrows_up_down.php" ?>
    <?php include "../home/1_slider/slider.php" ?>
    <?php include "../general/new_sail_quote/new_sail_quote.php" ?>


    <?php include "../home/navigation/navigation.php" ?>
    <?php include "../home/2_sail_types/sail_types.php" ?>
    <?php include "../home/3_covers/covers.php" ?>

    
    <?php include "5.Video/Video.php" ?>
    <?php include "4.News/News.php" ?>
    </div>
    <?php include "../General/Charging/charging.php"; ?>

    <div id="searchContent" class="searchContent">
    </div>

    <?php include "../General/Footer/Footer.php" ?>

    <script defer src="../home/app.js?v=<?= file_exists('home/app.js') ? filemtime('../home/app.js') : time() ?>"></script>


  </body>

</html>

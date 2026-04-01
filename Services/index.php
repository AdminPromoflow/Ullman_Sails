<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ullman Sails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>

    <style media="screen">
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background-color:#F8F8FA;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
    }

    </style>

    <?php include "../General/Menu/Menu.php" ?>
    <div id="searchHide" class="searchHide">
    <?php include "../Services/1.slider/slider.php" ?>
    <?php include "../general/new_sail_quote/new_sail_quote.php" ?>
    <?php include "../Services/navigation/navigation.php" ?>
    <?php include "2.Services/Services.php" ?>
    </div>
    <?php include "../General/Charging/charging.php"; ?>
    <div id="searchContent" class="searchContent">
    </div>
    <?php include "../General/Footer/Footer.php" ?>
    <script type="text/javascript">
    // Función para manejar el scroll suave y respuesta rápida
        let isScrolling = false;
        let velocity = 0;
        let previousY = 0;

        function handleScroll() {
        if (!isScrolling) {
          requestAnimationFrame(() => {
            const currentY = window.scrollY;
            const deltaY = currentY - previousY;

            // Agregar aceleración
            velocity += deltaY * 0.05;
            // Aplicar desaceleración gradual
            velocity *= 0.0;

            window.scrollBy(0, velocity);

            previousY = currentY;
            isScrolling = false;
          });
        }
        }
    </script>
  </body>
</html>

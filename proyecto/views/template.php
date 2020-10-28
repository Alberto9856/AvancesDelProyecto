<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="views/css/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="views/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="views/css/misestilos.css">
    </head>
    <body>
        <div class="container">
            <div class="row" >
                <div class="col" >
                  <p id="titulo">Get Your Ticket !</p>
                  <audio src="views/musica/AmonAmarthTwilightoftheThunder.mp3" autoplay loop></audio>
                </div>
            </div>
            <div class="row" style="border: 1px solid #393E46; margin-bottom: 10px;" id="barraNav">
                <?php
                    include "modules/navegacion.php";
                 ?>
            </div>
             <div class="" style="background-color:#325A73; height: 1200px; border: 10px solid #393E46;">
                <section>
                    <?php
                       $controlador = new Controlador();
                       $controlador -> enlacesPaginasController();
                    ?>
                </section>
             </div>
        </div>
    </body>
</html>

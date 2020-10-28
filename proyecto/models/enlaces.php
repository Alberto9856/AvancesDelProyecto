<?php
    class Paginas{
      public function enlacesPaginasModel($enlace){
         if ($enlace == "registro"       ||
             $enlace == "ingresar"       ||
             $enlace == "reservar"       ||
             $enlace == "carrito" ||
             $enlace == "salir"          ||
             $enlace == "about") {
             $module =  "views/modules/".$enlace.".php";
         }else if ($enlace == "falloIngreso") {
             $module =  "views/modules/ingresar.php";
         }else if ($enlace == "comprarBoleto") {
             $module =  "views/modules/reservar.php";
         }else {
             $module =  "views/modules/about.php";
         }
         return $module;
      }
    }
 ?>

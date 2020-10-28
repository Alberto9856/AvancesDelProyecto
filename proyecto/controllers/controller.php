<?php
  class Controlador{
      public function getTemplate(){
        include "views/template.php";
      }
      public function enlacesPaginasController(){
        if(isset( $_GET['action'])){
					$enlace = $_GET['action'];
				}
				else{
					$enlace = "index";
				}
				$respuesta = Paginas::enlacesPaginasModel($enlace);
				include $respuesta;
      }
      public function registroUsuarioController(){
        if (isset($_POST["emailRegistro"])) {
            $datosController = array("email"  => $_POST["emailRegistro"],
                                     "password" => $_POST["passwordRegistro"]);
  							$respuesta = Modelo::registroUsuarioModel($datosController,"usuario");
  							if ($respuesta == "success") {
  								//aqui se recarga la pagina desde cero, desde el index
  								//tambien de esta manera
  								// se evita re-ingresar datos que ya estan en los textBox
  								 header("location:index.php?action=ingresar");
  							}else {
  								header("location:index.php");
  							}
  				}
  		}
      public function ingresoUsuarioController(){
          if (isset($_POST["emailIngreso"])) {
              $datosController = array("email"  => $_POST["emailIngreso"],
                                       "password" => $_POST["passwordIngreso"]);
              $respuesta = Modelo::ingresoUsuarioModel($datosController,"usuario");
              //podemos escribir "usuario" como propiedad, ya que asi viene de la base d edatos
              if ($respuesta["email"]  == $_POST["emailIngreso"]  &&
                  $respuesta["password"] == $_POST["passwordIngreso"]) {
                  session_start();
                  $_SESSION["validar"] = true;
                  $_SESSION["email"] = $_POST["emailIngreso"];
                  $idUsuario = Modelo::getIdUsuarioModel("usuario",$_SESSION["email"]);
                  $_SESSION["idUsuario"] = $idUsuario["idUsuario"];
                  // echo "<br>si";
                  // echo "<br>emailFro: ".$_POST["emailIngreso"];
                  // echo "<br>passFro: ".$_POST["passwordIngreso"];
                  // echo "<br>emailBack: ".$respuesta["email"];
                  // echo "<br>passBack: ".$respuesta["password"];
                  header("location:index.php?action=reservar");
              }else{
                  header("location:index.php?action=falloIngreso");
                  // echo "<br>No";
                  // echo "<br>emailFro: ".$_POST["emailIngreso"];
                  // echo "<br>passFro: ".$_POST["passwordIngreso"];
                  // echo "<br>emailBack: ".$respuesta["email"];
                  // echo "<br>passBack: ".$respuesta["password"];

              }

          }
      }
      public function verBoletosController(){
          if ($_GET["action"] != "comprarBoleto") {//agregue esto porque cuando llamaba al heaer de abajo, antes de su llamada llamaba a todas las blusas, y eso probocaba el error, era un echo antes del header(cabecera)
            $respuesta = Modelo::verBoletosModel("banda");
            foreach ($respuesta as $row => $item) {
                echo '
                      <tr>
                        <th scope="row">'.$item['idBanda'].'</th>
                        <td>'.$item['nombreBanda'].'</td>
                        <td>'.$item['descripcion'].'</td>
                        <td><a class="btn btn-warning" href="index.php?action=comprarBoleto&idBanda='.$item['idBanda'].'">Reservar</a> <!-- esto recarga toda la pagina y de esta manera ya no entra en este if se sigue para abajo y abajo ya se recarga la pagina con action = blusas --></td>
                      </tr>
                ';
            }
          }
      }
      public function agregarBoletoControler(){
          if (isset($_GET["idBanda"])) {
              $datosController = array("usuario"   => $_SESSION["idUsuario"],
                                       "idBanda" => $_GET["idBanda"]);
              $respuesta = Modelo::agregarBoletoModel("comprasusuario",$datosController);
              if ($respuesta == "success") {
                  header("location:index.php?action=reservar");
              } else{
                echo "error";
              }
          }
      }
      public function verCarritoController(){
          // if ($_GET["action"] != "comprarBoleto") {//agregue esto porque cuando llamaba al heaer de abajo, antes de su llamada llamaba a todas las blusas, y eso probocaba el error, era un echo antes del header(cabecera)
            $respuesta = Modelo::verCarritoModel("comprasusuario",$_SESSION["idUsuario"]);
            foreach ($respuesta as $row => $item) {
                echo '
                      <tr>
                        <th scope="row"></th>
                        <td>'.$item['nombreBanda'].'</td>
                        <td>'.$item['descripcion'].'</td>
                        <td><a class="btn btn-warning" href="">'.$item['cantidad'].' Boletos</a> <!-- esto recarga toda la pagina y de esta manera ya no entra en este if se sigue para abajo y abajo ya se recarga la pagina con action = blusas --></td>
                      </tr>
                ';
            }
          // }
      }
  }
 ?>

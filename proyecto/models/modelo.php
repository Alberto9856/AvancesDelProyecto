<?php
require_once "conexion.php";

    class Modelo extends Conexion{
          public function registroUsuarioModel($datosModel,$tabla){
              $stmt = Conexion::conectar()->prepare("INSERT INTO
                      $tabla(email,password)
                      VALUES(:email,:password)
                      ");
                      //parece que los dos puntos de abajo no son tan necesarios
              $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
              $stmt -> bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
              if ($stmt->execute()) {
                 return "success";
              }else {
                return "error";
              }
              $stmt -> close();
          }
          public function ingresoUsuarioModel($datosModel,$tabla){
              $stmt = Conexion::conectar()->prepare("SELECT email,password
                       from $tabla
                       WHERE email = :email");
              $stmt -> bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
              $stmt -> execute();
              return $stmt -> fetch();// aqui se obtiene una fila
              $stmt -> close();
          }
          public function verBoletosModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT idBanda,nombreBanda,descripcion,cantidadBoletos
                    from $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
        }
        public function getIdUsuarioModel($tabla,$datosModel){
          $stmt = Conexion::conectar()->prepare("SELECT idUsuario
                  from $tabla WHERE email = :email");
          $stmt -> bindParam(":email",$datosModel,PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt -> fetch();
          $stmt -> close();
      }
        public function agregarBoletoModel($tabla,$datosModel){
            $stmt = Conexion::conectar()->prepare(
                    "INSERT INTO $tabla(usuario,idBanda)
                     VALUES(:usuario,:idBanda)");
            $stmt -> bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_INT);
            $stmt -> bindParam(":idBanda",$datosModel["idBanda"],PDO::PARAM_INT);
            if ($stmt -> execute()) {
                return "success";
                echo "suc";
            } else {
                return "false";
                echo "nosuc";
            }
        }
        public function verCarritoModel($tabla,$datosModel){
          $stmt = Conexion::conectar()->prepare(
                 "SELECT idBanda,nombreBanda,descripcion,count(idBanda) as cantidad from
                 (SELECT b.idBanda,b.nombreBanda,b.descripcion
                  FROM banda b,comprasusuario cu
                  where cu.usuario = :idUsuario and cu.idBanda = b.idBanda) as tabla1
                  group by nombreBanda");
          $stmt -> bindParam(":idUsuario",$datosModel,PDO::PARAM_INT);
          $stmt -> execute();
          return $stmt -> fetchAll();
          $stmt -> close();
      }
    }
 ?>

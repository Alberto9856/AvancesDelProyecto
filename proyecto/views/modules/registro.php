<div class="about">
    <img id="fondoAbout" src="views/imagenes/c1.jpg" alt="">
    <div class="info">

<p class="display-4">Registrate</p>


<div class="form1" style="width: 400px; margin: auto; border:1px solid #393E46;">
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Correo Electronico</label>
            <input type="email" name="emailRegistro" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introdusca un email validol" required>
            <small id="emailHelp" class="form-text text-muted">Tu correo sera usado com usuario</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" name="passwordRegistro"class="form-control" id="exampleInputPassword1" placeholder="Introdusca una contraseña segura" required>
        </div>
        <!-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <input type="submit" class="btn btn-dark" value="Registrarse">
  </form>
</div>
</div>
</div>
<?php
    $controlador = new Controlador();
    $controlador -> registroUsuarioController();
 ?>

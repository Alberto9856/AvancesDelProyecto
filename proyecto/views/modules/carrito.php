<?php
	 session_start();
	 if (!$_SESSION["validar"]) {
	 	  header("location:index.php?action=ingresar");
			exit();
	 }
 ?>

 <div class="about">
     <img id="fondoAbout" src="views/imagenes/c1.jpg" alt="">
     <div class="info">

 <p class="display-4">Carrito</p>

<div class="">
		<table class="table table-striped table-dark">
			<thead>
				<tr>
					<th scope="col">-</th>
					<th scope="col">Banda</th>
					<th scope="col">Fecha y Establecimiento</th>
					<th scope="col">Reservaste</th>
				</tr>
			</thead>
			<tbody>
					<?php
						  $controlador = new Controlador();
						  $controlador -> verCarritoController();
					 ?>
			  </tbody>
			</table>
	</div>
		</div>
			</div>

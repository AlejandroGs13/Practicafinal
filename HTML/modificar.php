<!DOCTYPE html>
<html>
<head>
	
    <meta charset="utf-8">
	<title>Agenda</title>
	<link rel="stylesheet" type="text/css" href="../../css/materialize.min.css" media="screen,projection">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<header>
		
		<nav>
		    <div class="nav-wrapper #004d40 teal darken-4">
		      <a href="../index.html" class="brand-logo">Agenda</a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="../index.html">Agregar</a></li>
		        <li><a href="consultar.php">Consultar</a></li>
		        <li><a href="eliminar.html">Eliminar</a></li>
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		      	<li><a href="../index.html">Agregar</a></li>
		        <li><a href="consultar.php">Consultar</a></li>
		        <li><a href="eliminar.html">Eliminar</a></li>
		      </ul>
		    </div>
		 </nav>
	</header>

	<div class="container">
		<div class="card-panel #dcedc8 light-green lighten-4">
		<br>
			<div class="row">
				<div class="col s5 push-m4">
					<h4><i class="material-icons left">build</i>
					Modificar contacto</h4>
				</div>

			</div>
			<center>
	    	<?php
				echo $_GET["name"];
				?>
			</center>	
		    <br>
	    <form  method="post" name="frm">
		        	<div class="input-field">
		          		<i class="material-icons prefix">account_circle</i>
		          		<input id="icon_prefix" type="text" class="validate" name="nombre">
		          		<label for="icon_prefix">Nombre:</label>
		       		</div>

		       		<div class="input-field">
		          		<i class="material-icons prefix">phone</i>
		          		<input id="icon_prefix" type="text" class="validate" name="telefono">
		          		<label for="icon_prefix">Telefono:</label>
		       		</div>

		       		<div class="input-field">
		          		<i class="material-icons prefix">store</i>
		          		<input id="icon_prefix" type="text" class="validate" name="domicilio">
		          		<label for="icon_prefix">Domicilio:</label>
		       		</div>
			        
			        <div class="input-field">
		          		<i class="material-icons prefix">contact_mail</i>
		          		<input id="icon_prefix" type="text" class="validate" name="correo">
		          		<label for="icon_prefix">Correo:</label>
		       		</div>
			       
			        <div class="input-field">
		          		<i class="material-icons prefix">face</i>
		          		<input id="icon_prefix" type="text" class="validate" name="fb">
		          		<label for="icon_prefix">Facebook:</label>
		       		</div>

			        <div class="row">
			        <div class="col s4 push-s5" type="submit" value="Guardar datos">
			         	<input type="submit" value="Modificar Contacto" name="Modifica">
			        </div>
			        </div>
		    </form>
		    <?php
		    if (isset($_REQUEST['Modifica'])){
		    	$nombre = $_POST['nombre'];
				$domicilio = $_POST['domicilio'];
				$telefono = $_POST['telefono'];
				$face = $_POST['fb'];
				$id = $_GET["contacto"];
				$correo = $_POST['correo'];
		    	$conectar = mysqli_connect("localhost","Cain","ghahfah16");
				mysqli_select_db($conectar,"Agenda");
				$modificar="update Contactos set nombre='".$nombre."', telefono= '".$telefono."', domicilio= '".$domicilio."', correo= '".$correo."', face= '".$face."' where ID='".$id."';";
				$resultado=mysqli_query($conectar,$modificar);

				if ($resultado) {
						header('location:consultar.php');
					}else {
						echo "No se pudo modificar el registro de la base de datos <br>";
					}
				}
		    ?>
		    </div>
	</div>
	<footer class="page-footer #1b5e20 green darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Programacion web</h5>
                <p class="grey-text text-lighten-4">David Alejandro García Sánchez 14630117</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Text
            </div>
          </div>
        </footer>
       
	<script src="../../js/jquery-3.2.0.min.js"></script>
	<script src="../../js/materialize.min.js"></script>
	<script>
    	$( document ).ready(function(){
    		$(".button-collapse").sideNav();
    	});
    </script>
     
</body>
</html>
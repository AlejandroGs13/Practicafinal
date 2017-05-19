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
		        
		      </ul>
		      <ul class="side-nav" id="mobile-demo">
		      	<li><a href="../index.html">Agregar</a></li>
		        <li><a href="consultar.php">Consultar</a></li>
		      </ul>
		    </div>
		 </nav>
	</header>

	<div class="container">
		<div class="card-panel #dcedc8 light-green lighten-4">
		<br>
			<div class="row">
				<div class="col s5 push-m4">
					<h4><i class="material-icons left">contacts</i>
					Contactos</h4>
				</div>
			</div>
	    	
		    <br>
	    </div>
	


  <ul class="collection" action="multiplicarInputs">
  		<div id="contac">
  			<?php
  			$arr = array();
			$conectar = mysqli_connect("localhost","Cain","ghahfah16");
			mysqli_select_db($conectar,"Agenda");
			$consulta="Select * From Contactos;";
			$resultado=mysqli_query($conectar,$consulta);
			$registros=mysqli_num_rows($resultado);
			for ($i=0; $i < $registros ; $i++) {
				$row = mysqli_fetch_assoc($resultado); 
				//$elemento=mysql_result($resultado, $i,"nombre");
				$elemento = $row['ID'];
				
				array_push($arr,$elemento);
				$elemento = $row['nombre'];
				
				array_push($arr,$elemento);
				//$elemento=mysql_result($resultado, $i,"telefono");
				$elemento = $row['telefono'];
				
				array_push($arr,$elemento);
				//$elemento=mysql_result($resultado, $i,"domicilio");
				
				$elemento = $row['domicilio'];
				array_push($arr,$elemento);
				//$elemento=mysql_result($resultado, $i,"correo");
				$elemento = $row['correo'];
				array_push($arr,$elemento);
				//$elemento=mysql_result($resultado, $i,"face");
				$elemento = $row['face'];
				array_push($arr,$elemento);

					
					
				}

				mysqli_close($conectar);
				
  			?>

  	<script type="text/javascript">
  		var arrayJS=<?php echo json_encode($arr);?>;	
	    var div='';
        for (var i=1;i<arrayJS.length;i+=6){ 
	           var cont=i+1;
	           div+="<li class='collection-item avatar'><img src='../Image/con.png' alt='' class='circle'><span class='title'>"+arrayJS[i]+"</span><p>"+arrayJS[i+1]+"<br>"+arrayJS[i+2]+"<br>"+arrayJS[i+3]+"<br>"+arrayJS[i+4]+"<br><center><a href='../PHP/eliminar.php?id="+arrayJS[i-1]+"' class='waves-effect waves-light btn #c62828 red darken-3'>Eliminar</a></center></p><a href='modificar.php?contacto="+arrayJS[i-1]+"&name="+arrayJS[i]+"' class='secondary-content'><i class='material-icons'>build</i></a></li>";
	      }

	      document.getElementById("contac").innerHTML=div;
	</script>
  		</div>
  </ul>
            
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

<!DOCTYPE html>
<html lang="es">

<head>
<title>Sunlight</title>
<link rel="stylesheet" href="styles.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<header style="background: white">
    	<div class="clearfix"> <!--Dejar espacio entre cajas-->
        	<div class="crop"> <!--Cortar la imagen para encajar-->
          	<a href="index.php">
          		<img src="img/logo_tra.png" title="Home" alt="Sunlight">
        		</a>
      		</div>

        	<div class="box2"> <!--Menú de la parte derecha superior-->
          	<a class="menu" href="#" onclick="document.getElementById('id01').style.display='block'">Ingreso</a>
            <a class="menu" href="ayuda.php">Ayuda</a>
          	<div id="id01" class="modal">
  			 		  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  					  <form class="modal-content" method="post"> <!--Parte para que salga el formulario como pop-up-->
    					  <div class="container">
      				    <h1>Acceso de administrador</h1> <hr>
      					  <label for="email"><b>Usuario</b></label>
      					  <input type="text" placeholder="Ingrese su usuario" name="user" required>
							    <label for="text"><b>Contrase&#241a</b></label>
      					  <input type="password" placeholder="Ingrese su contrase&#241a" name="psw" required> <br><br>
							    <div class="clearfix">
       						  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        					  <button type="submit" class="signupbtn">Ingresar</button>
      					  </div>
             <?php require_once('conexion.php'); // requerir por unica vez el archivo donde esta las variables y la funcion conectarBD() 
                $conectar=conectarBD();  // hacer la conexion  a la base de datos
                session_start();
                
              ?>
    					  </div>
  					  </form>
              
              <!--Verificar el user y el password-->
             
              <?php
                $username = $_POST['user']; 
                $pass = $_POST['psw']; 
                $SQL="SELECT administrador, contraseña FROM semaforosolar";
                $queryl=pg_query($SQL);
                $compara=pg_fetch_array($queryl);

                if($compara["administrador"]==$username && $compara["contraseña"]==$pass){
                  $_SESSION['administrador'] = $username;
                  $_SESSION['pass'] = $pass;
                  header("Location:admin.php");
                }
              ?>
			      </div>
          </div>

				  <!--Script para que cuando se clickee por fuera del formulario, se cierre-->
				  <script>
				    var modal = document.getElementById('id01');
				    window.onclick = function(event) {
  					 if (event.target == modal) {
   						 modal.style.display = "none";
  					 }
				    }
				  </script>
				
      </div>    
  </header>

    <!--slideshow-->
	<div class="slideshow-container">
		<div class="mySlides fade"> <!--primero-->
  			<a href="#section1"><img src="img/banner1.jpg" style="width:100%; filter: grayscale(50%)">
  			<a href="#section1"><div class="text">Cuidate a ti mismo/a y a tu familia</div></a>
		</div>

		<div class="mySlides fade"> <!--segundo-->
  			<a href="#section2"><img src="img/banner2.jpg" style="width:100%; filter: grayscale(50%)">
  			<div class="text">Informaci&#243n personalizada para cada tipo de piel</div></a>
		</div>

		<div class="mySlides fade"> <!--tercero-->
  			<img src="img/banner3.jpg" style="width:100%; filter: grayscale(50%)">
  			<div class="text">Proyecto Unicaucano</div>
		</div>
	</div>

	<div style="text-align:center"> <!--puntos debajo del banner-->
  		<span class="dot"></span> 
  		<span class="dot"></span> 
  		<span class="dot"></span> 
	</div>

	<!--script para mover las imagenes y los puntos-->
	<script> 
		var slideIndex = 0;
		showSlides();

		function showSlides() {
  			var i;
  			var slides = document.getElementsByClassName("mySlides");
  			var dots = document.getElementsByClassName("dot");
  			for (i = 0; i < slides.length; i++) {
    			slides[i].style.display = "none";  
  			}
  			slideIndex++;
  			if (slideIndex > slides.length) {slideIndex = 1}    
  				for (i = 0; i < dots.length; i++) {
    				dots[i].className = dots[i].className.replace(" active", "");
  				}
  				slides[slideIndex-1].style.display = "block";  
  				dots[slideIndex-1].className += " active";
  				setTimeout(showSlides, 4000); // Cambia de imagen cada 4 segundos
		}
	</script>

	<div class="box" style="width: 50%;" id="section1"> <!--Información del proyecto-->
		<img src="img/logo-effect.png" width="100%" height="100%">
	</div>

	<div class="box" style="width: 50%">
		<h1>
			&#161 Peligro, rayos UV afuera!
		</h1>
		<p>
 			Seg&#250n la Organizaci&#243n Mundial para la Salud, &#34La exposici&#243n excesiva a las radiaciones ultravioleta se relaciona con diferentes tipos de c&#225ncer cut&#225neo, quemaduras de sol, envejecimiento acelerado de la piel, cataratas y otras enfermedades oculares&#34. En Colombia, en el m&#225s reciente estudio del Ministerio de Salud, el 20,2% del total de los casos nuevos de c&#225ncer atendidos por el Instituto Nacional de Cancerolog&#237a son cut&#225neos, sin embargo, de estos casos cerca del 87,3 % corresponden a tipo no melanoma, es decir que el tipo de c&#225ncer de piel m&#225s com&#250n en Colombia, es prevenible. 
 		</p>
 		<h2>
 			Por medio de Sunlight podr&#225s cuidar de ti y de tu familia, con recomendaciones personalizadas para cuidarse de los da&#241inos rayos UV.
 		</h2>
	</div>

	<div class="box3" style="width: 100%; " id="section2"> <!--Acceder a la página de elegir el tono de piel-->
		<span style="font-size: 25px;">
			&nbsp &nbsp Conoce los &#237ndices de radiaci&#243n y las recomendaciones para ti seg&#250n tu color de piel &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		</span>

		<button href="elegir.php" class="button" style="vertical-align:middle;"> <!--Botón de Aquí-->
			<a href="elegir.php" style="padding: 60px; text-align: center;">Aqu&#237</a>
		</button>
	</div>



</body>
</html>


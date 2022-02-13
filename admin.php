<!DOCTYPE html>
<html lang="es">

<head>
<title>Sunlight</title>
<link rel="stylesheet" href="styles.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META http-equiv=refresh content=30>
</head>

<?php 
require_once('conexion.php'); // requerir por unica vez el archivo donde esta las variables y la funcion conectarBD() 
$conectar=conectarBD();  // hacer la conexion  a la base de datos
session_start();
$username = $_SESSION['administrador'];
$pass = $_SESSION['pass'];
$query = "select * from estaunica order by dat_id  DESC LIMIT 3"; //extraer datos de la BD
   $resultado= pg_query($conectar, $query) or die ("error en la consulta de BD");
   $nr=pg_num_rows($resultado);
?>

<body style="background-color: #EAEAEA">
	<header style="background: #EAEAEA">
    	<div class="clearfix"> <!--Dejar espacio entre cajas-->
        	<div class="crop"> <!--Cortar la imagen para encajar-->
          		<img src="img/logo_tra.png" title="Home" style="float:right";>
      		</div>

        	<div class="box2" style="float: left; width: 50%; margin-top: 0px";> <!--Menú de la parte derecha superior-->
          	<h2 style="font-size: 100%">Bienvenido, administrador</h2>
            <a class="menu" href="cerrar_sesion.php">Cerrar sesi&#243n</a>
          </div>				
      </div>    
  </header>
<?php
  if($nr>0) //imprimir datos
      {
        while ($filas=pg_fetch_array($resultado)) 
        {
             $num_registro=$filas["dat_id"];
             $temp=$filas["intemp"];
             $precipit=$filas["rainrate"];
             $uv=$filas["uvindex"];
             $humedad= $filas["inhum"];
             $viento=$filas["windspeed"]; 
             $dia=$filas["dia"]; 
          //   echo "<td>".$filas["bar"]."</td></tr>";
        }

      } 
    else{echo "No hay datos";}  

?>
  <div>
    <p style="font-size: 150%; color: black" >&#218ltimos datos obtenidos:</p>
  </div>


  <table style="margin-top: 50px;">
    <tr>
      <th class="uv" style="background-color: white">
        <?php
          echo $num_registro;
        ?>
      </th>

      <th class="uv" style="background-color: white">
        <?php
          echo $temp;
          echo "&#176C";
        ?>
      </th>

      <th class="uv" style="background-color: white">
        <?php
          echo $precipit;
          echo "&#37";
        ?>
      </th>

      <th class="uv" style="background-color: white">
        <?php
          echo $uv
        ?>
      </th>
    </tr>

    <tr>
      <td style="font-size: 150%">N&#250mero de registro</td>
      <td style="font-size: 150%">Temperatura</td>
      <td style="font-size: 150%">Precipitaci&#243n</td>
      <td style="font-size: 150%">&#205ndice de radiaci&#243n UV</td>
    </tr>        
  </table>

    <table style="margin-top: 30px;">
    <tr>
      <th class="uv" style="background-color: white">
        <?php
          echo $humedad;
          echo "&#37";
        ?>
      </th>

      <th class="uv" style="background-color: white">
        <?php
          echo $viento;
          echo "Km/h";
        ?>
      </th>
      <th class="uv" style="background-color: white">
        <?php
          echo $dia;
        ?>
      </th>
    </tr>

    <tr>
      <td style="font-size: 150%">Humedad</td>
      <td style="font-size: 150%">Velocidad del viento</td>
      <td style="font-size: 150%">Fecha de los datos</td>
    </tr>        
  </table>

  <div class="box" style="width: 100%">
    <form action="procesamiento.php" method="POST">
      <h1 style="color: #4D4DF2">Inserte texto:</h1>
      <input type="text" style="background-color: #bcacc4" name="texto">
      <center><input type="submit" style="font-size: 200%" value="Enviar" name="Enviar" ></a></center>
    </button>
    
  </div>

  </form>

</body>
</html>

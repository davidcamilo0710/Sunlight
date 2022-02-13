<?php require_once('conexion.php'); // requerir por unica vez el archivo donde esta las variables y la funcion conectarBD() 
$conectar=conectarBD();  // hacer la conexion  a la base de datos

$query = "select * from estaunica order by dat_id  DESC LIMIT 1 "; //extraer datos de la BD
   $resultado= pg_query($conectar, $query) or die ("error en la consulta de BD");
   $nr=pg_num_rows($resultado);

?>
<!DOCTYPE html>
<html lang="es">

  <head> <!-- Inicio de título de la página, ícono, estilo en CSS, charset y vista en diferentes dispositivos-->
   <title>Sunlight</title>
    <link rel="icon" href="/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    <header>
      <div class="clearfix"> <!--Dejar espacio entre cajas-->
        <div class="crop"> <!--Cortar la imagen para encajar-->
          <a href="index.php">
            <img src="img/logo_tra.png" title="Home" alt="Sunlight">
          </a>
        </div>

        <div class="box2"> <!--Menú de la parte derecha superior-->
          <a class="menu" href="ayuda.php">Ayuda</a>
        </div>
      </div>    
    </header>

    <section>
      <h1>Bienvenido/a al Sistema Inteligente de detecci&#243n de rayos UV</h1>

        <!--Menu Dropdown-->
        <div class="dropdown"> <!--Menú que se despliega cuando se le pone el mouse encima, para elegir el tono de piel-->
          <button class="dropbtn">Elija su tono de piel</button>
          <div class="dropdown-content">
            <a style="background-color:#FCE7CD;text-align:center" href="clara.php">Clara</a>
            <a style="background-color:#D69359;text-align:center" href="mate.php">Mate</a>
            <a style="background-color:#986539;text-align:center" href="oscura.php">Oscura</a>
          </div>
        </div>
<?php  
      if($nr>0) //imprimir datos
      {
        
        while ($filas=pg_fetch_array($resultado)) {
             $uv=$filas["uvindex"];
             $temp=$filas["intemp"];
             $mp=$filas["inairdens"];    
        }

      } 
       else{echo "No hay datos";} 
    ?>
        
        <table style="margin-top: 150px">
          <tr>
            <th class="uv">
              <?php
               echo $uv;
              ?>
            </th>

            <th class="tem">
              <?php
               echo $temp;
               echo "&#176 C";
              ?>
            </th>

            <th class="mp">
              <?php
              echo $mp;
              echo "&#37";
              ?>
            </th>
          </tr>


          <tr>
            <td style="font-size: 150%">Radiaci&#243n UV</td>
            <td style="font-size: 150%">Temperatura</td>
            <td style="font-size: 150%">Material Particulado</td>
          </tr>        
        </table>
      </section>

    <div>
      <p>Sunlight</p>
      <h1 style="font-size: 90px">Recomendaciones</h1>
    </div>

    <div class="box" style="width: 50%">
      <h2 style="font-size: 90px">1</h2>
      <p style="font-size: 70px">
        <?php
        if ($uv <= "2") {
          echo "Disfruta el d&#237a!"; 
        }
        if ($uv > "2" && $uv <= "5") {
          echo "Permanece a la sombra al medio d&#237a"; 
        }
        if ($uv > "5" && $uv <= "8") {
          echo "Prot&#233gete del sol usando camisa, gafas y sombrero"; 
        }
        if ($uv > "8") {
          echo "Evita salir al medio d&#237a"; 
        }
        ?>
      </p>
    </div>

    <div class="box" style="width: 50%">
      <h2 style="font-size: 90px">2</h2>
      <p style="font-size: 70px">
        <?php
        if ($uv <= "5") {
          echo "No es necesario usar bloqueador"; 
        }
        if ($uv > "5" && $uv <= "8") {
          echo "Usar bloqueador de 6-10 FPS"; 
        }
        if ($uv > "8" && $uv <= "10") {
          echo "Usar bloqueador de 10-25 FPS"; 
        }
        if ($uv > "11") {
          echo "Usar bloqueador de 25-50 FPS"; 
        }
        ?>
      </p>
    </div>

    <div class="footer"> <!--Cortar la imagen para encajar-->
      <center>
      <img src="img/sun.png" title="Home" alt="Sunlight">
      </center>
    </div>

  </body>
</html>
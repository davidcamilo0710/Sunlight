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
    </section>

  </body>
</html>
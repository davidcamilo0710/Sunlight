<?php
require_once('conexion.php'); // requerir por unica vez el archivo donde esta las variables y la funcion conectarBD() 
$conectar=conectarBD();  // hacer la conexion  a la base de datos
//$hacer=$_POST['seleccion']; //recuperar variables
session_start();

$username = $_SESSION['administrador'];
$pass = $_SESSION['pass'];

$texto=$_POST['texto'];

// if($hacer=="guardar"){
 $query = "UPDATE semaforosolar SET texto='$texto'";

    $result = pg_query($conectar, $query) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
     

//}
header("Location: http://multisistemas.com.co/sunlight/admin.php" );

?>
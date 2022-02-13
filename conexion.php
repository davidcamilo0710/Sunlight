<?php

function conectarBD(){
/*$host = "host=localhost";
$dbname="dbname=SemaforoSolar";
$port="port=5432";
$user="user=postgres";
$password="password=post123";*/

$host = "host=multisistemas.com.co";
$dbname="dbname=dbmultisistemas";
$port="port=5432";
$user="user=pgmultisistemas";
$password="password=M4lt1s1st3m@s";

$conectar= pg_connect("$host $port $dbname $user $password");
if(!$conectar){echo  "error de conexion: ".pg_last_error();}
else { /*echo "<h3>conexion exitosa PHP con postgreSQL</h3><hr>";*/ 
      return $conectar;}
}
?>
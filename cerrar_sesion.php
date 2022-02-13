                                                       
<?php

// PROGRAMA DE FINALIZACION DE SESION
                   
  session_start();
  unset($_SESSION['administrador']); 
  unset($_SESSION['pass']);
  session_destroy();
  header('Location: index.php');
?>

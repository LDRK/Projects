<?php

if(isset($_GET['type'])){
  $opc = $_GET['type'];
    switch ($opc) {
    case '2':
      require_once('modelo.php');
      $obj = new Calculos();
      $jugadores = $obj->jugadores();
      echo $jugadores;
      //echo 'hola';
    break;
    case '3':
      require_once('modelo.php');
      $obj = new Calculos();
      $jugadores = $obj->calcularJuego();
      echo $jugadores;

    //echo 'hola';
    break;
    default:
    # code...
    break;
      }
}
?>
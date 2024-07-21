<?php
if(isset($_GET['type'])){
    $opc = $_GET['type'];
      switch ($opc) {
        case '2':
          require_once('modelo.php');
          $obj = new Calculos();
          $preguntas = $obj->preguntas();
          echo $preguntas;
        break;
    
        }
  }
?>

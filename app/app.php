<?php
require 'Controllers/AmortizacionController.php';
require_once 'Controllers/MasterController.php';

//Se toman los datos que envia el JS y se hace el calculo
$calcular = in_array('calcular', array_keys($_GET));

if($calcular){
  $datos = $_POST;

  $monto = $datos['m'];
  $interes = $datos['i'];
  $plazo = $datos['p'];

  $amort = new AmortizacionController($monto, $interes, $plazo);


  $response = $amort -> realizarCalculos();

  echo $response;

  exit();
}
 ?>

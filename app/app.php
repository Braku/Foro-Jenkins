<?php
require 'Controllers/AmortizacionController.php';
require_once 'Controllers/MasterController.php';


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

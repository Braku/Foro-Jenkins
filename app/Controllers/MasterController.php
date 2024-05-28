<?php

require_once 'AmortizacionController.php';

abstract class MasterController{
  public $pago;
  public $cargo_interes;
  public $amort;
  public $saldo;

  // public $tabla;


  public function realizarCalculos(){
    for($i = 1; $i <= $this->plazo; $i++){
      $this->calcular();
      $this->tabla[$i] = [$this->pago, $this->cargo_interes, $this->amort, $this->saldo];
    }
    return json_encode($this->tabla);
  }
  public abstract function calcular();
}

 ?>

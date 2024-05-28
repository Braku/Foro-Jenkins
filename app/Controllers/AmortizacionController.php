<?php

  require_once 'MasterController.php';

  class AmortizacionController extends MasterController
  {
    private $monto, $interes;
    public  $plazo;
    public $tabla = [];

    function __construct($m, $i, $p) {
      $this->monto = $m;
      $this->interes = $i;
      $this->plazo = $p;
    }


    public function calcular() {
      $pago_mensual = ($this->monto * $this->interes / 100) / ((1 - (1 + $this->interes / 100) ** ( -$this->plazo )));
      $saldo = $this->monto;

      for($i = 1; $i <= $this->plazo; $i++){

        $monto_interes = $this->interes * $saldo / 100;
        $amort = $pago_mensual - $monto_interes;

        $saldo = $saldo - $amort;

        $this->pago = $pago_mensual;
        $this->cargo_interes = $monto_interes;
        $this->amort = $amort;
        $this->saldo = $saldo;
        $this->tabla[$i] = [$this->pago, $this->cargo_interes, $this->amort, $this->saldo];
      }


      // $this->tabla = [$this->pago = $this->i[0], $this->cargo_interes = $this->i[1], $this->amort = $this->i[2], $this->saldo = $this->i[3]];
    }



  }


 ?>

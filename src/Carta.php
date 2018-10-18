<?php

namespace TDD;

class Carta {

  protected $palo;
  protected $numero;

  public function __construct($palo, $numero){
    $this->palo = $palo;
    $this->numero = $numero;    
  }
}

<?php

namespace TDD;

class Mazo {

  protected $cartas;
  protected $tipo;

  public function __construct($tipo, $array){

    $this->cartas=$array;
    $this->tipo=$tipo;

  }

  public function mezclar() {
    $this->cartas= shuffle($this->cartas);
    return TRUE;
  }

  public function cortar($lugar) {
    if($this->tipo=="Poker" && $lugar<52){
      $lugarPermitido=TRUE;
    }
    elseif($this->tipo=="Espanol" && $lugar<48){
      $lugarPermitido=TRUE;
    }
    else{
      $lugarPermitido= FALSE;
    }
    if($lugarPermitido){
      $arriba= array_slice($this->cartas, 0, $lugar-1);
      $this->cartas=array_slice($this->cartas, $lugar);
      $this->cartas=array_merge($arriba, $this->cartas);
    }
    
    return $lugarPermitido;
  
  }

}

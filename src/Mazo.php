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
    $this->cartas= shuffle($cartas);
    return TRUE;
  }

  public function cortar($lugar) {
    if($tipo=="Poker" && $lugar<52){
      $lugarPermitido=TRUE;
    }
    elseif($tipo=="Espanol" && $lugar<48){
      $lugarPermitido=TRUE;
    }
    else{
      $lugarPermitido= FALSE;
    }
    if($lugarPermitido){
      $abajo= array_slice($this->cartas, 0, $lugar-1);
      $this->cartas=array_slice($cartas, $lugar);
      $this->cartas=array_merge($this->cartas, $abajo);
    }
    
    return $lugarPermitido;
  
  }

}

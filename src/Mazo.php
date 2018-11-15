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

  public function contarCartas(){
    return count($this->cartas);
  }

  public function agregarCarta (CartaInterface $carta){
    if($this->tipo == "Poker" && get_class($carta) == "TDD\CartaPoker"){
      array_push($this->cartas, $carta);
      return TRUE;
    }
    elseif($this->tipo == "Espanol" && get_class($carta) == "TDD\CartaEspanola"){
      array_push($this->cartas, $carta);
      return TRUE;
    }
    else
      return FALSE;
    
  }

  public function esVacio(){

    if($this->contarCartas()==0){
      return TRUE;
    }

    else{
      return FALSE;
    }

  }

}

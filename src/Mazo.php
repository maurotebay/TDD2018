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

    $this->cartas= shuffle($this->cartas);    //Mezclo los elementos del array

    return TRUE;
  }

  public function cortar($lugar) {

    $lugar--;   //le resto uno al lugar ya que el array arranca en 0 y no en 1

    if($lugar < count($this->cartas)){    //Si quiero cortar el mazo en una posicion menor a la cantidad de elementos

      $lugarPermitido = TRUE;         //Entonces el lugar para cortar esta permitido
    }
    
    else{

      $lugarPermitido= FALSE;         //En cualquier otro caso, no se permite
    }
    
    $lugar--;   //le resto uno al lugar ya que el array arranca en 0 y no en 1

    if($lugarPermitido){      //Si el lugar esta permitido
    
      $arriba = array_slice($this->cartas, 0, $lugar);   //Guardo en una variable auxiliar la primera parte cortada
    
      $abajo = array_slice($this->cartas, $lugar+1, count($this->cartas) );   //Guardo en cartas el array cortado desde el lugar hasta el final

      $this->cartas=array_merge($abajo, $arriba);
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

    if($this->contarCartas()==0){   //Si la cantidad de cartas es 0

      return TRUE;                  //El mazo esta vacio
    }

    else{
    
      return FALSE;                 //En otro caso, no lo esta
    }

  }

  public function obtenerCarta(){
    $carta = array_pop($this->cartas); //Devuelve y quita del array de cartas el ultimo elemento del array
    return $carta;  //Devolvemos el elemento del array
  }
}

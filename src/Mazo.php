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

    if(!$this->esVacio()){                      //Si el mazo no esta vacio
      if($lugar <= $this->contarCartas()-1){    //Y lo quiero cortar en una posicion valida

        $mazo = $this->cartas;

        $abajo = array_slice($mazo, 0, $lugar);    //Guardo la parte de arriba del mazo para luego ponerla abajo
        $arriba = array_slice($mazo, $lugar);      //Guardo la parte de abajo del mazo para luego ponerla arriba

        $this->cartas = array_merge($arriba, $abajo);   //Formo el nuevo mazo cortado mediante la union de las dos partes
      }
      else{
        return FALSE;       //Retorno false en caso de que le pase una posicion para cortar invalida
      }
    }

    return $this->esVacio();

  }

  public function contarCartas(){
    return count($this->cartas);    //Devuelve la cantidad de elementos del array(cantidad de cartas en el mazo)
  }

  public function agregarCarta (CartaInterface $carta){
    if($this->tipo == "Poker" && get_class($carta) == "TDD\CartaPoker"){    //Si la carta es del mismo tipo que el mazo

      array_push($this->cartas, $carta);    //Entonces la agrega al final del array
      return TRUE;    //Devuelvo True si se pudo agregar la carta
    }
    elseif($this->tipo == "Espanol" && get_class($carta) == "TDD\CartaEspanola"){   //Si la carta es del mismo tipo que el mazo

      array_push($this->cartas, $carta);    //La agrega al final del mazo
      return TRUE;
    }
    else
      return FALSE;   //Si la carta no es del mismo tipo que el mazo, devuelve FALSE y la misma no se agrega
    
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

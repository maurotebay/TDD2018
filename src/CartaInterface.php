<?php

namespace TDD;

Interface CartaInterface {

  //Funcion que devuelve el palo de la carta
  public function obtenerPalo();

  //Funcion que devuelve el numero de la carta
  public function obtenerNumero();

  //Funcion que, dado un palo y un numero, verifica que sea
  public function cartaValida($palo, $numero);

}

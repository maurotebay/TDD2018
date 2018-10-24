<?php

namespace TDD;

class CartaEspanola implements CartaInterface{

    protected $palo;
    protected $numero;

    public function __construct($palo, $numero){
        $this->palo = $palo;
        $this->numero = $numero;
    }

    public function obtenerNumero(){
        return $this->numero;
    }
    
    public function obtenerPalo(){
        return $this->palo;
    }
}
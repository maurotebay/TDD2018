<?php

namespace TDD;

class CartaEspanola implements CartaInterface {

    protected $palo;
    protected $numero;
    private $palosValidos = [ 'Espada', 'Basto', 'Copa', 'Oro' ];
    private $numerosValidos = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 ];

    public function __construct($palo, $numero) {
        if ($this->cartaValida($palo, $numero)) {
            $this->palo = $palo;
            $this->numero = $numero;
        }
    }

    public function cartaValida($pal, $num) {
        return (in_array($pal, $this->palosValidos) && in_array($num, $this->numerosValidos));
    }

    public function obtenerNumero() {
        return $this->numero;
    }
    
    public function obtenerPalo() {
        return $this->palo;
    }
}
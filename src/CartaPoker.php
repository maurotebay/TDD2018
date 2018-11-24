<?php

namespace TDD;

class CartaPoker implements CartaInterface {

    protected $palo;
    protected $numero;
    private $palosValidos = [ 'Corazones', 'Diamantes', 'Picas', 'Treboles' ];
    private $numerosValidos = [ 'A', 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K' ];

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
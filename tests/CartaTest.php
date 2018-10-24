<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {

  public function testExiste(){

    $cartaEsp = new CartaEspanola("Espada",10);
    $cartaPoker = new CartaPoker("Diamantes", 7);
    
    $this->assertTrue(isset($cartaEsp));
    $this->assertTrue(isset($cartaPoker));

  }

  public function testVerPalo() {

    $cartaEsp = new CartaEspanola("Espada", 10);
    $this->assertEquals($cartaEsp->obtenerPalo(), "Espada");

    $cartaPoker = new CartaPoker("Diamantes", 7);
    $this->assertEquals($cartaPoker->obtenerPalo(), "Diamantes");
  }

  public function testVerNumero() {

    $cartaEsp = new CartaEspanola("Espada", 10);
    $this->assertEquals($cartaEsp->obtenerNumero(), 10);
  
    $cartaPoker = new CartaPoker("Diamantes", 7);
    $this->assertEquals($cartaPoker->obtenerNumero(),7);

  }

}

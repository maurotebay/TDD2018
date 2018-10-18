<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {

  public function testExiste(){
    $carta = new Carta("Espada","10");
    $this->assertTrue(isset($carta));
  }

  public function testVerPalo() {

    $carta = new Carta("Espada", "10");

    $this->assertEquals($carta->obtenerPalo(), "Espada");
  }

  public function testVerNumero() {
    $carta = new Carta("Espada", "10");

    $this->assertEquals($carta->obtenerNumero(),"10");
  }

}

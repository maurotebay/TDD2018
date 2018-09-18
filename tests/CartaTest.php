<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class CartaTest extends TestCase {

  public function testExiste(){
    $carta = new Carta;
    $this->assertTrue(isset($carta));
  }

}

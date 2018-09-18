<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {
        $mazo = new Mazo;
        $this->assertTrue(isset($mazo));
    }

    public function testMezclable() {
        $mazo = new Mazo;
        $mazoMezclado = $mazo->mezclar();  //Genero dos mazos, uno mezclado y otro sin
        $this->assertNotEqual($mazoMezclado, $mazo); //Mezclo y testeo que sean distintos
    }

    public function testContarCartas() {

      $mazo = new Mazo;
      $carta = new Carta;

      $mazo->agregarCarta($carta);

      $this->assertEquals($mazo->contarCartas(),1);
    }

    public function testEsVacio() {
      $mazo = new Mazo;
      
      $this->assertTrue($mazo->contarCartas(),0);

    }

    public function testAgregarCarta() {

      $mazo = new Mazo;
      $carta = new Carta;
      
      $this->assertTrue($mazo->agregarCarta($carta));

    }

}

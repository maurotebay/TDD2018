<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {
        $mazo = new Mazo("Espanol", [1,2,3,4,5]);
        $this->assertTrue(isset($mazo));
    }

    public function testMezclable() {
        $mazo = new Mazo("Espanol", [1,2,3,4,5]);
        $mazoMezclado = $mazo->mezclar();  //Genero dos mazos, uno mezclado y otro sin
        $this->assertNotEquals($mazoMezclado, $mazo); //Mezclo y testeo que sean distintos
    }

    public function testCortable() {
      $mazoNormal = new Mazo("Espanol", [1,2,3,4,5]);
      $mazoCortado = new Mazo("Espanol", [1,2,3,4,5]);

      $mazoCortado->cortar(2); //Genero dos mazos iguales, corto uno y compruebo que sean distintos

      $this->assertNotEquals($mazoNormal,$mazoCortado);
    }

    public function testContarCartas() {

      $mazo = new Mazo;
      $carta = new CartaEspanola("Espada", "10");

      $mazo->agregarCarta($carta);

      $this->assertEquals($mazo->contarCartas(),1);
    }

    public function testEsVacio() {
      $mazo = new Mazo;
      
      $this->assertTrue($mazo->contarCartas(),0);

    }

    public function testAgregarCarta() {

      $mazo = new Mazo;
      $carta = new CartaEspanola("Espada", "10");
      
      $this->assertTrue($mazo->agregarCarta($carta));

    }

    public function testObtenerCarta() {
      $mazo = new Mazo;
      $carta = new CartaEspanola("Espada", "10");

      $mazo->agregarCarta($carta); //Genero un mazo vacío y una carta, la meto en el mazo y luego la obtengo.
                                   //Compruebo que las cartas sean iguales

      $this->assertEquals($mazo->obtenerCarta(),$carta);
    }
}

<?php

namespace TDD;

use PHPUnit\Framework\TestCase;

class MazoTest extends TestCase {

    /**
     * Valida que se puedan crear mazos de cartas.
     */
    public function testExiste() {

        $mazo = new Mazo("Espanol", [1,2,3,4,5]); //Creo un mazo
      
        $this->assertTrue(isset($mazo));    //Compruebo que fue creado correctamente
    }

    public function testMezclable() {
        $mazo = new Mazo("Espanol", [1,2,3,4,5]);

        $mazoMezclado = $mazo->mezclar();  //Genero dos mazos, uno mezclado y otro sin mezclar
        
        $this->assertNotEquals($mazoMezclado, $mazo); //Mezclo y testeo que sean distintos
    }

    public function testCortable() {
      $mazoNormal = new Mazo("Espanol", [1,2,3,4,5]);   //Creo dos mazos iguales
      $mazoCortado = new Mazo("Espanol", [1,2,3,4,5]);

      $mazoCortado->cortar(2); //Corto uno de los dos
      var_dump($mazoNormal);
      var_dump($mazoCortado);

      $this->assertNotEquals($mazoNormal,$mazoCortado);   //Compruebo que los mazos sean diferentes
    }

    public function testContarCartas() {

      $mazo = new Mazo("Poker", []);    //Creo un mazo vacio
      $carta = new CartaPoker("Picas", "10"); //Creo una carta

      $mazo->agregarCarta($carta);    //Le agrego la carta al mazo asi tiene un elemento dentro

      $this->assertEquals($mazo->contarCartas(),1);   //Compruebo que el mazo tiene la cantidad de elementos que le agregue
    }

    public function testEsVacio() {
      $mazoLleno = new Mazo("Poker", [1,2,3,7]); //Creamos 2 mazos, uno vacio y otro con cartas
      $mazoVacio = new Mazo("Espanol", []);
      
      $this->assertTrue($mazoVacio->esVacio());  //Comprobamos que se emite True o False dependiendo de si tiene o no cartas
      $this->assertFalse($mazoLleno->esVacio());

    }

    public function testAgregarCarta() {

      $mazo = new Mazo("Espanol", [1,7,5,3]);     //Creo un mazo espanol
      $carta = new CartaEspanola("Espada", "10"); //Creo una carta espanola
      
      $this->assertTrue($mazo->agregarCarta($carta)); //Le agrego una carta al mazo y compruebo que se agregue

    }

    public function testObtenerCarta() {
      $mazo = new Mazo("Espanol", [1,7,5,3]);     //Creo un mazo 
      $carta = new CartaEspanola("Espada", "10"); //Creo una carta

      $mazo->agregarCarta($carta);  //Le agrego la carta al mazo
                                   
      $this->assertEquals($mazo->obtenerCarta(),$carta);  //Compruebo que las carta devuelta sea igual a la que le agregue
    }
}

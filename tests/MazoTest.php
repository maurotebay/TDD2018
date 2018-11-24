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
        $mazoEsp = new Mazo("Espanol", [1,2,3,4,5]);

        $mazoEspMezclado = $mazoEsp->mezclar();  //Genero dos mazos, uno mezclado y otro sin mezclar
        
        $this->assertNotEquals($mazoEspMezclado, $mazoEsp); //Mezclo y testeo que sean distintos

        $mazoPok = new Mazo("Poker", [1,2,3,4,5]);

        $mazoPokMezclado = $mazoPok->mezclar();  //Genero dos mazos, uno mezclado y otro sin mezclar
        
        $this->assertNotEquals($mazoPokMezclado, $mazoPok); //Mezclo y testeo que sean distintos
    }

    public function testCortable() {
      $mazoEspNormal = new Mazo("Espanol", [1,2,3,4,5]);   //Creo dos mazos iguales
      $mazoEspCortado = new Mazo("Espanol", [1,2,3,4,5]);

      $mazoEspCortado->cortar(2); //Corto uno de los dos

      $this->assertNotEquals($mazoEspNormal,$mazoEspCortado);   //Compruebo que los mazos sean diferentes

      $mazoPokNormal = new Mazo("Poker", [1,2,3,4,5]);   //Creo dos mazos iguales
      $mazoPokCortado = new Mazo("Poker", [1,2,3,4,5]);

      $mazoPokCortado->cortar(2); //Corto uno de los dos

      $this->assertNotEquals($mazoPokNormal,$mazoPokCortado);   //Compruebo que los mazos sean diferentes
    }

    public function testNoCortable(){
      $mazoVacio = new Mazo("Poker", []);

      $this->assertFalse($mazoVacio->cortar(3));

      $mazoTrivial = new Mazo("Espanol", [1,2,3,4,5,6]);

      $this->assertFalse($mazoTrivial->cortar(7));
      $this->assertFalse($mazoTrivial->cortar(19));
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

      $mazoEsp = new Mazo("Espanol", [1,7,5,3]);     //Creo un mazo espanol
      $cartaEsp = new CartaEspanola("Espada", "10"); //Creo cartas espanolas
      $cartaEsp2 = new CartaEspanola("Espada", "1");
      
      $mazoPok = new Mazo("Poker", [12,3,4]);     //Creo un mazo de poker
      $cartaPok = new CartaPoker("Picas", "A");   //Creo cartas de poker
      $cartaPok2 = new CartaPoker("Diamantes", "7");
     
      $this->assertTrue($mazoEsp->agregarCarta($cartaEsp)); //Le agrego una carta al mazo y compruebo que se agregue
      $this->assertTrue($mazoEsp->agregarCarta($cartaEsp2));

      $this->assertTrue($mazoPok->agregarCarta($cartaPok));
      $this->assertTrue($mazoPok->agregarCarta($cartaPok2));
    }

    public function testAgregarCartaErronea(){

      $mazoEsp = new Mazo("Espanol", [1,7,5,3]);     //Creo un mazo espanol
      $mazoPok = new Mazo("Poker", [12,3,4]);         //Creo un mazo de poker
      $cartaEsp = new CartaEspanola("Espada", "10"); //Creo una carta espanola
      $cartaPok = new CartaPoker("Picas", "A");       //Creo una carta de poker
     

      $this->assertFalse($mazoPok->agregarCarta($cartaEsp)); //Le intento agregar una carta al mazo y compruebo que no se puede agregar
      $this->assertFalse($mazoEsp->agregarCarta($cartaPok));  //Le intento agregar una carta al mazo y compruebo que no se puede agregar
    }

    public function testObtenerCarta() {
      $mazo = new Mazo("Espanol", [1,7,5,3]);     //Creo un mazo 
      $carta1 = new CartaEspanola("Espada", "10"); //Creo cartas
      $carta2 = new CartaEspanola("Oro", "2");

      $mazo->agregarCarta($carta1);  //Le agrego la carta al mazo
      $mazo->agregarCarta($carta2);
                                   
      $this->assertEquals($mazo->obtenerCarta(),$carta2);  //Compruebo que la carta obtenida sea igual a la ultima que le agregue
      $this->assertEquals($mazo->obtenerCarta(),$carta1);  //Compruebo que la carta obtenida sea igual a la primera que meti

    }
}

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


}

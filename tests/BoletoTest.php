<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {
    /**
     * Comprueba que sucede cuando creamos un boleto nuevo.
     */
    public function testSaldoCero() {
        $valor = 14.80;
        $boleto = new Boleto($valor, NULL, NULL);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }
    /**
     * Comprueba si funciona crear un boleo con un colectivo determinado
     */
    public function testColectivoDeBoleto(){
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $boleto = new Boleto(14.80, $colectivo, NULL);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);
    }
}

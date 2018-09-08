<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {
    /**
     * Comprueba que sucede cuando creamos un boleto nuevo.
     */
    public function testSaldoCero() {
        $tarjeta = new Tarjeta;
        $valor = 14.80;
        $boleto = new Boleto(NULL, $tarjeta);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }
    /**
     * Comprueba si funciona crear un boleo con un colectivo determinado
     */
    public function testColectivoDeBoleto(){
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $tarjeta = new Tarjeta;
        $boleto = new Boleto($colectivo, $tarjeta);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);
    }
}

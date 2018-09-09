<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {
    /**
     * Comprueba que sucede cuando creamos un boleto nuevo.
     */
    public function testSaldoCero() {
        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta($tiempo);
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerValor(), null);
        $tarjeta->recargar(50);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerValor(), 14.8);

    }
    /**
     * Comprueba si funciona crear un boleo con un colectivo determinado
     */
    public function testColectivoDeBoleto(){
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta($tiempo);
        $boleto = new Boleto($colectivo, $tarjeta);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);
    }
}

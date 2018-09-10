<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {
    /**
     * Comprueba que sucede cuando creamos un boleto nuevo.
     */
    public function testSaldoCero() {

        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta(0,$tiempo);
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerValor(), null);
        $tarjeta->recargar(50);
        $boleto = $colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerValor(), 14.8);

    }
    /**
     * Comprueba retorno de datos
     */
    public function testDatosBoleto(){
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta(0,$tiempo);
        $tarjeta->recargar(100);
        $boleto=$colectivo->pagarCon($tarjeta);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);

        $this->assertEquals($boleto->obtenerLinea(),133); 

        /*/

        $this->assertEquals($boleto->obtenerFecha(),$????); //   TRABAJO DE CERRUTI
        /*/

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta);

        $this->assertEquals($boleto->obtenerIdTarjeta(),0);

        $this->assertEquals($boleto->obtenerSaldo(),85.2);

        $this->assertEquals($boleto->obtenerAbonado(),14.8);


    }
  
}

<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase {
    /**
     * Comprueba que sucede cuando creamos un boleto nuevo.
     */
    public function testSaldoCero() {
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $tarjeta = new Tarjeta(0);
        $valor = 14.80;
        $boleto = new Boleto($colectivo, $tarjeta);

        $this->assertEquals($boleto->obtenerValor(), $valor);
    }
    /**
     * Comprueba retorno de datos
     */
    public function testColectivoDeBoleto(){
        $colectivo = new Colectivo(133,"RosarioBus",69);
        $tarjeta = new Tarjeta(0);
        $boleto = new Boleto($colectivo, $tarjeta);
        $this->assertEquals($boleto->obtenerColectivo(), $colectivo);

        $this->assertEquals($boleto->obtenerLinea(),133); 

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta); 

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta);

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta);

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta);

        $this->assertEquals($boleto->obtenerTarjeta(),$tarjeta);
        
       //$this->assertEquals($boleto->obtener(),);

    }
  
}

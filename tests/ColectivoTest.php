<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testPagarColectivo() {
        $tarjeta = new Tarjeta;
        $tarjeta->recargar(510.15);
        $colectivo = new Colectivo(122,"Semtur",37);
        /*
            Probamos la asignacion de parametros iniciales
        */
        $this->assertEquals($colectivo->linea(), 122);
        $this->assertEquals($colectivo->empresa(), "Semtur");
        $this->assertEquals($colectivo->numero(), 37);
        /*
            Probamos la realizacion de una viaje
        */
        $boleto = new Boleto (14.80, $colectivo, $tarjeta);
        $this->assertEquals($colectivo->pagarCon($tarjeta), $boleto);
        $this->assertEquals($tarjeta->obtenerSaldo(),577.28);
    }

    public function testSinSaldo() {
        $tarjeta = new Tarjeta;
        $colectivo = new Colectivo(141,"Semtur",37);
        /*
            Probamos la realizacion de una viaje sin saldo
        */
        $boleto = new Boleto(14.8,$colectivo,$tarjeta);
        $this->assertEquals($colectivo->pagarCon($tarjeta), $boleto);
        $this->assertEquals($colectivo->pagarCon($tarjeta), $boleto);
        $this->assertEquals($colectivo->pagarCon($tarjeta), FALSE);
    }
}
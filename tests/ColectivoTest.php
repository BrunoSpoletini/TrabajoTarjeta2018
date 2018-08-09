<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {

    public function testAlgoUtil() {
        $tarjeta = new \TrabajoTarjeta\Tarjeta;
        $tarjeta->recargar(510.15);
        $colectivo = new \TrabajoTarjeta\Colectivo(122,"Semtur",37);
        /*
            Probamos la asignacion de parametros iniciales
        */
        $this->assertEquals($colectivo->linea(), 122);
        $this->assertEquals($colectivo->empresa(), "Semtur");
        $this->assertEquals($colectivo->numero(), 37);
        /*
            Probamos la realizacion de una viaje
        */
        $boleto = new \TrabajoTarjeta\Boleto (14.80, $colectivo, $tarjeta);
        $this->assertEquals($colectivo->pagarCon($tarjeta), $boleto);
    }
}

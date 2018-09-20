<?php
namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class MedioTest extends TestCase
{

    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido()
    {
        $tiempo = new Tiempo;
        $medio = new Medio(0, $tiempo);
        $this->assertFalse($medio->recargar(15));
        $this->assertEquals($medio->obtenerSaldo(), 0);
    }

    /**
     * Comprueba que la tarjeta con media franquicia puede restar boletos, con la limitacion de tiempo
     */
    public function testRestarBoletos()
    {
        $tiempo = new TiempoFalso;
        $medio = new Medio(0, $tiempo);
        $this->assertTrue($medio->recargar(20));
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->obtenerSaldo(), 12.6);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $this->assertEquals($medio->obtenerSaldo(), 5.2);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $this->assertTrue($medio->recargar(962.59));
        $this->assertEquals($medio->obtenerSaldo(), 1159.77);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(300);
        for (($i = 0); $i < 155; ++$i) {
            $this->assertEquals($medio->restarSaldo("153"), true);
            $tiempo->avanzar(300);
        }
        $this->assertEquals($medio->restarSaldo("153"), true);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $this->assertEquals($medio->restarSaldo("153"), false);
    }

    /**
     * prueba la limitacion de tiempo de 5 minutos
     */
    public function testTiempoInvalido()
    {
        $tiempo = new TiempoFalso;
        $medio = new Medio(0, $tiempo);
        $this->assertTrue($medio->recargar(962.59));
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $tiempo->avanzar(265);
        $this->assertEquals($medio->restarSaldo("153"), false);
        $tiempo->avanzar(584);
        $this->assertEquals($medio->restarSaldo("153"), true);
        $this->assertEquals($medio->restarSaldo("153"), false);
    }
}

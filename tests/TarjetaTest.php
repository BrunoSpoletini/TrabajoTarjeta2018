<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase
{

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo()
    {
        $tiempo = new Tiempo();

        $tarjeta = new Tarjeta(0, $tiempo);

        $this->assertTrue($tarjeta->recargar(10));
        $this->assertEquals($tarjeta->obtenerSaldo(), 10);

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), 30);

        $this->assertTrue($tarjeta->recargar(510.15));
        $this->assertEquals($tarjeta->obtenerSaldo(), 622.08);

        $this->assertTrue($tarjeta->recargar(962.59));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1806.25);

        $this->assertTrue($tarjeta->recargar(30));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1836.25);

        $this->assertTrue($tarjeta->recargar(50));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1886.25);

        $this->assertTrue($tarjeta->recargar(100));
        $this->assertEquals($tarjeta->obtenerSaldo(), 1986.25);
    }

    /**
     * Comprueba que la tarjeta no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido()
    {
        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta(0, $tiempo);

        $this->assertFalse($tarjeta->recargar(15));
        $this->assertEquals($tarjeta->obtenerSaldo(), 0);
    }
    /*
     * Comprueba que la tarjeta tiene viajes plus
     */
    public function testViajesPlus()
    {
        $tiempo = new Tiempo();
        $tarjeta = new Tarjeta(0, $tiempo);

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), 20);

        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->obtenerSaldo(), 5.2);

        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->restarSaldo("153"), false);
    }

    /*
     * Comprueba que se puede recargargar el viaje plus
     */
    public function testRecargarPlus()
    {
        $tiempo = new Tiempo;
        $tarjeta = new Tarjeta(0, $tiempo);

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->obtenerSaldo(), 5.2);
        $this->assertTrue($tarjeta->recargar(10));
        $this->assertEquals($tarjeta->obtenerSaldo(), 0.4);
        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->restarSaldo("153"), true);
        $this->assertEquals($tarjeta->obtenerSaldo(), 0.4);
        $this->assertEquals($tarjeta->restarSaldo("153"), false);
    }

    public function testTrasbordo60minDianormal(){
        $tiempo = new TiempoFalso;
        $tarjeta = new Tarjeta(0, $tiempo);
        $tiempo->avanzar(28800);
        $tarjeta->recargar(100);
        $tarjeta->recargar(100);
        $colectivo1 = new Colectivo(122, "Semtur", 37);
        $colectivo2 = new Colectivo(134, "RosarioBus", 52);

        /*
        Pruebo pagar un trasbordo un dia normal con 60 minutos de espera y el texto del boleto
        */
        $colectivo1->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 185.2);
        $tiempo->avanzar(2100);
        $boleto = $colectivo2->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 180.316);
        $this->assertEquals($boleto->obtenerDescripcion(), "Trasbordo Normal 4.884");

        /*
        Pruebo pagar un trasbordo en un mismo colectivo
        */
        $tiempo->avanzar(7200);
        $colectivo1->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 165.516);
        $tiempo->avanzar(2300);
        $colectivo1->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 150.716);

        /*
        Pruebo pagar un trasbordo un dia normal cuando ya pasaron los 60 minutos
        */
        $tiempo->avanzar(7200);
        $colectivo1->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 135.916);
        $tiempo->avanzar(3700);
        $colectivo2->pagarCon($tarjeta);
        $this->assertEquals($tarjeta->obtenerSaldo(), 121.116);


    }
}

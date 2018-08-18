<?php

namespace TrabajoTarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

    /**
     * Comprueba que la tarjeta aumenta su saldo cuando se carga saldo válido.
     */
    public function testCargaSaldo() {
        $tarjeta = new Tarjeta;

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
    public function testCargaSaldoInvalido() {
      $tarjeta = new Tarjeta;

      $this->assertFalse($tarjeta->recargar(15));
      $this->assertEquals($tarjeta->obtenerSaldo(), 0);
  }

  public function testViajesPlus() {
        $tarjeta = new Tarjeta;

        $this->assertTrue($tarjeta->recargar(20));
        $this->assertEquals($tarjeta->obtenerSaldo(), 20);

        $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
        $this->assertEquals($tarjeta->obtenerSaldo(), 5.2);

        $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
        $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
        $this->assertEquals($tarjeta->restarSaldo(14.8), FALSE);
  }

  public function testRecargarPlus() {
    $tarjeta = new Tarjeta;

    $this->assertTrue($tarjeta->recargar(20));
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), FALSE);
    $this->assertEquals($tarjeta->obtenerSaldo(), 5.2);
    $this->assertTrue($tarjeta->recargar(10));
    $this->assertEquals($tarjeta->obtenerSaldo(), 0.4);
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), FALSE);
    $this->assertEquals($tarjeta->obtenerSaldo(), 0.4);
    $this->assertTrue($tarjeta->recargar(30));
    $this->assertEquals($tarjeta->obtenerSaldo(), 0.8);
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), TRUE);
    $this->assertEquals($tarjeta->restarSaldo(14.8), FALSE);
}
}
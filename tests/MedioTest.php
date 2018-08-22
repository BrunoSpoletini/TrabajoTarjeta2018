<?php

namespace Trabajomedio;

use PHPUnit\Framework\TestCase;

class MedioTest extends TestCase {

    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $medio = new Medio;

      $this->assertFalse($medio->recargar(15));
      $this->assertEquals($medio->obtenerSaldo(), 0);
  }

  public function testViajesPlus() {
        $medio = new Medio;

        $this->assertTrue($medio->recargar(20));
        $this->assertEquals($medio->obtenerSaldo(), 20);

        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 5.2);

        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), FALSE);
  }

  public function testRecargarPlus() {
    $medio = new medio;

    $this->assertTrue($medio->recargar(20));
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), FALSE);
    $this->assertEquals($medio->obtenerSaldo(), 5.2);
    $this->assertTrue($medio->recargar(10));
    $this->assertEquals($medio->obtenerSaldo(), 0.4);
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), FALSE);
    $this->assertEquals($medio->obtenerSaldo(), 0.4);
    $this->assertTrue($medio->recargar(30));
    $this->assertEquals($medio->obtenerSaldo(), 0.8);
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), TRUE);
    $this->assertEquals($medio->restarSaldo(14.8), FALSE);
}
}
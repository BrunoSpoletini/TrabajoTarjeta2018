<?php
namespace TrabajoTarjeta;
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
  public function testRestarBoletos() {
        $medio = new Medio;
        $this->assertTrue($medio->recargar(20));
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 12.6);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 5.2);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), FALSE);
        $this->assertTrue($medio->recargar(962.59));
        $this->assertEquals($medio->obtenerSaldo(), 1159.77);
        for( ($i = 0);$i<156;++$i){
            $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        }
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->restarSaldo(14.8), FALSE);
  }
}
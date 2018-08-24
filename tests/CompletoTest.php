<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class CompletoTest extends TestCase {
    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $completo = new Completo;
      $this->assertFalse($medio->recargar(15));
      $this->assertEquals($medio->obtenerSaldo(), 0);
  }
  public function testRestarBoletos() {
        $completo = new Completo;
        $this->assertTrue($medio->recargar(20));
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        $this->assertTrue($medio->recargar(962.59));
        for( ($i = 0);$i<160;++$i){
            $this->assertEquals($medio->restarSaldo(14.8), TRUE);
        }
        $this->assertEquals($medio->restarSaldo(14.8), TRUE);
  }
}
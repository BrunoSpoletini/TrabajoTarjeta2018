<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class CompletoTest extends TestCase {
    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $completo = new Completo;
      $this->assertFalse($completo->recargar(15));
      $this->assertEquals($completo->obtenerSaldo(), 0);
  }
  public function testRestarBoletos() {
        $completo = new Completo;
        $this->assertTrue($completo->recargar(20));
        $this->assertEquals($completo->obtenerSaldo(), 20);
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        $this->assertEquals($completo->obtenerSaldo(), 20);
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        $this->assertEquals($completo->obtenerSaldo(), 20);
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        $this->assertTrue($completo->recargar(962.59));
        for( ($i = 0);$i<160;++$i){
            $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        }
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
  }
}
<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class CompletoTest extends TestCase {
    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
  public function testRestarBoletos() {
        $completo = new Completo;
        for( ($i = 0);$i<160;++$i){
            $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        }
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
  }
}
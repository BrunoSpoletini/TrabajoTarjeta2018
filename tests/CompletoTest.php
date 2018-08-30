<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class CompletoTest extends TestCase {
    /**
     * Comprueba que la tarjeta con franquicia completa pueda pagar boletos infinitos
     */
  public function testRestarBoletos() {
        $completo = new Completo;
        for( ($i = 0);$i<160;++$i){
            $this->assertEquals($completo->restarSaldo(14.8), TRUE);
        }
        $this->assertEquals($completo->restarSaldo(14.8), TRUE);
  }
}
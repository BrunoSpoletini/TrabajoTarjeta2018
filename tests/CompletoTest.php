<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class CompletoTest extends TestCase {
    /**
     * Comprueba que la tarjeta con franquicia completa pueda pagar boletos infinitos
     */
  public function testRestarBoletos() {
        $completo = new Completo(0);
        for( ($i = 0);$i<160;++$i){
            $this->assertEquals($completo->restarSaldo(), TRUE);
        }
        $this->assertEquals($completo->restarSaldo(), TRUE);
  }
}
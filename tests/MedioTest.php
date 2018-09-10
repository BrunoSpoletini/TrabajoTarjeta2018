<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class MedioTest extends TestCase {
    /**
     * Comprueba que la tarjeta con media franquicia no puede cargar saldos invalidos.
     */
    public function testCargaSaldoInvalido() {
      $tiempo = new Tiempo;
      $medio = new Medio(0,$tiempo);
      $this->assertFalse($medio->recargar(15));
      $this->assertEquals($medio->obtenerSaldo(), 0);
  }
    /**
     * Comprueba que la tarjeta con media franquicia puede restar boletos
    */
  public function testRestarBoletos() {
        $tiempo = new TiempoFalso;
        $medio = new Medio(0,$tiempo);
        $this->assertTrue($medio->recargar(20));
        $this->assertEquals($medio->obtenerSaldo(), 20);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->obtenerSaldo(), 12.6);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 5.2);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $this->assertTrue($medio->recargar(962.59));
        $this->assertEquals($medio->obtenerSaldo(), 1159.77);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(300);
        for( ($i = 0);$i<155;++$i){
            $this->assertEquals($medio->restarSaldo(), TRUE);
            $tiempo->avanzar(300);
        }
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
  }

  public function testTiempoInvalido() {
    $tiempo = new TiempoFalso;
    $medio = new Medio($tiempo);
    $this->assertTrue($medio->recargar(962.59));
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $tiempo->avanzar(300);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(50);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $tiempo->avanzar(265);
    $this->assertEquals($medio->restarSaldo(), FALSE);
    $tiempo->avanzar(584);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->restarSaldo(), FALSE);
  }
}
<?php
namespace TrabajoTarjeta;
use PHPUnit\Framework\TestCase;
class MedioUniTest extends TestCase {
    /**
     * Comprueba que la tarjeta con media franquicia puede restar boletos
    */
  public function testRestarBoletos() {
        $tiempo = new TiempoFalso;
        $medio = new MedioUniversitario($tiempo);
        $this->assertTrue($medio->recargar(100));
        $this->assertEquals($medio->obtenerSaldo(), 100);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 92.6);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(50);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 85.2);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 70.4);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 55.60);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 40.80);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 26.00);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 11.20);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $this->assertEquals($medio->obtenerSaldo(), 11.20);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), TRUE);
        $this->assertEquals($medio->obtenerSaldo(), 11.20);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        $tiempo->avanzar(300);
        $this->assertEquals($medio->restarSaldo(), FALSE);
        
  }

  public function testTiempoInvalido() {
    $tiempo = new TiempoFalso;
    $medio = new MedioUniversitario($tiempo);
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

  public function testPasoDia() {
    $tiempo = new TiempoFalso;
    $medio = new MedioUniversitario($tiempo);
    $this->assertTrue($medio->recargar(100));
    $tiempo->avanzar(27000);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 92.6);
    $tiempo->avanzar(18000);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 85.2);
    $tiempo->avanzar(20000);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 70.4);
    $tiempo->avanzar(21500);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 63.0);
    $tiempo->avanzar(1500);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 55.6);
    $tiempo->avanzar(10000);
    $this->assertEquals($medio->restarSaldo(), TRUE);
    $this->assertEquals($medio->obtenerSaldo(), 40.8);
  }
}
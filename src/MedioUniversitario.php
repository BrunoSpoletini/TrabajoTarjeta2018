<?php
namespace TrabajoTarjeta;

class MedioUniversitario extends Medio {

    protected $DisponiblesDiarios = 2;

    public function CalculaValor(){
        $UltimaFecha = date("d/m/y",$this->UltimaHora);
        $ActualFecha = date("d/m/y", time());
        if($ActualFecha>$UltimaFecha){$DisponiblesDiarios=0;}
        if($DisponiblesDiarios<2){return (($this->ValorBoleto)/2);}
        else {return $this->ValorBoleto;}
    }
}
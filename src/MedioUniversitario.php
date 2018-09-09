<?php
namespace TrabajoTarjeta;

class MedioUniversitario extends Medio {

    protected $DisponiblesDiarios = 0;

    public function CalculaValor(){
        $UltimaFecha = date("d/m/y",$this->UltimaHora);
        $ActualFecha = date("d/m/y", $this->tiempo->time());
        if($ActualFecha>$UltimaFecha){$this->DisponiblesDiarios=0;}
        if($this->DisponiblesDiarios<2){
            $this->DisponiblesDiarios++;
            return (($this->ValorBoleto)/2);
        }
        else {return $this->ValorBoleto;}
    }
}
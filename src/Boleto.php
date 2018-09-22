<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface
{

    protected $valor;

    protected $colectivo;

    protected $tarjeta;

    protected $cantplus;

    protected $hora;

    protected $idtarjeta;

    protected $boletoCompleto;

    protected $linea;

    protected $saldo;

    protected $descripcion;

    protected $Tipo;

    protected $usoPlus;

    public function __construct($colectivo, $tarjeta)
    {
        $this->valor = ($tarjeta->ValorPagado());
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->usoPlus = $tarjeta->usoPlus();
        $this->cantplus = $tarjeta->obtenerPagoPlus();
        $this->hora = date("d/m/Y H:i:s", $tarjeta->UltimaHoraUsada());
        $this->idtarjeta = $tarjeta->obtenerId();
        $this->boletoCompleto = $tarjeta->boletoCompleto();
        $this->linea = $colectivo->linea();
        $this->saldo = $tarjeta->obtenerSaldo();
        $this->PagoPlus = "Abona viajes plus " . $this->cantplus * $tarjeta->boletoCompleto() . " y ";
        $this->Tipo = get_class($tarjeta);
    }

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor()
    {
        return $this->valor;
    }

    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo()
    {
        return $this->colectivo;
    }

    public function obtenerFecha()
    {
        return $this->hora;
    }

    public function obtenerTarjeta()
    {
        return $this->tarjeta;
    }

    public function obtenerLinea()
    {
        return $this->linea;
    }

    public function obtenerAbonado()
    {
        $TotalAbonado = $this->obtenerValor() + ($this->boletoCompleto * $this->cantplus);
        return $TotalAbonado;
    }
    //Hacer caso de prueba

    public function obtenerIdTarjeta()
    {
        return $this->idtarjeta;
    }

    public function obtenerSaldo()
    {
        return $this->saldo;
    }

    public function obtenerTipo()
    {
        return $this->Tipo;
    }

    public function obtenerDescripcion()
    {
        $StringAuxiliar;
        if($this->valor==0.0){
            if($this->Tipo=="TrabajoTarjeta\Completo") return "Completo 0.0";
            else{
                if($this->usoPlus==1) $StringAuxiliar ="ViajePlus 0.0"; else $StringAuxiliar ="UltimoPlus 0.0";
            }
        } else {
            switch($this->valor){
                case ($this->boletoCompleto/2):
                    $StringAuxiliar ="Medio " . ($this->valor);
                    break;
                case (($this->boletoCompleto/2)*0.33):
                    $StringAuxiliar ="Trasbordo Medio " . ($this->valor);
                    break;
                case ($this->boletoCompleto*0.33):
                    $StringAuxiliar ="Trasbordo Normal " . ($this->valor);
                    break;
                case ($this->boletoCompleto):
                    $StringAuxiliar ="Normal " . ($this->valor);
                    break;
            }
        }
        if($this->cantplus!=0){
            return $this->PagoPlus . $StringAuxiliar;
            }
        return $StringAuxiliar;
    }
}

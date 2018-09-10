<?php

namespace TrabajoTarjeta;

class Boleto implements BoletoInterface {

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

    public function __construct($colectivo, $tarjeta) {
        $this->valor = ($tarjeta->ValorPagado());
        $this->colectivo = $colectivo;
        $this->tarjeta = $tarjeta;
        $this->cantplus = $tarjeta->obtenerPagoPlus();
        $this->hora = date("d/m/Y H:i:s", time());
        $this->idtarjeta = $tarjeta->obtenerId();
        $this->boletoCompleto = $tarjeta->boletoCompleto();
        $this->linea = $colectivo->linea();
        $this->saldo = $tarjeta->obtenerSaldo();
        $this->descripcion = "Abona viajes plus ". $this->cantplus*$tarjeta->boletoCompleto() ."y \n";
    }

    /**
     * Devuelve el valor del boleto.
     *
     * @return int
     */
    public function obtenerValor() {
        return $this->valor;
    }

    /**
     * Devuelve un objeto que respresenta el colectivo donde se viajó.
     *
     * @return ColectivoInterface
     */
    public function obtenerColectivo() {
        return $this->colectivo;
    }

    public function obtenerFecha(){
        return $this->hora;
    }

    public function obtenerTarjeta(){
        return $this->tarjeta;
    }

    public function obtenerLinea(){
        return $this->linea; 
    }

    public function obtenerAbonado(){
        $TotalAbonado = $this->obtenerValor() + ($this->boletoCompleto*$this->cantplus);
        return $TotalAbonado;
    }
        //Hacer caso de prueba

    public function obtenerIdTarjeta(){
        return $this->idtarjeta;
    }

    public function obtenerSaldo(){
        return $this->saldo;
    }

    public function obtenerDescripcion(){
        return $this->descripcion;
    }
}

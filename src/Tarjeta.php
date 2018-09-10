<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    
    protected $saldo;

    protected $ValorBoleto=14.8;

    protected $plus = 0;
  
    protected $UltimoValorPagado=null;

    protected $UltimaHora = 0; 
    
    protected $pagoplus = 0;

    protected $id;

/*/
    Funcion para recargar la tarjeta
    Las cargas aceptadas de tarjetas son: (10, 20, 30, 50, 100, 510,15 y 962,59)
    Cuando se cargan $510,15 se acreditan de forma adicional: 81,93
    Cuando se cargan $962,59 se acreditan de forma adicional: 221,58
/*/
    public function __construct($id,TiempoInterface $tiempo){
        $this->id = $id;
        $this->tiempo = $tiempo;
    }

    public function recargar($monto) {

      switch ($monto) {
        case 10:
            $this->saldo += 10;
            break;
        case 20:
            $this->saldo += 20;
            break;
        case 30:
            $this->saldo += 30;
            break;
        case 50:
            $this->saldo += 50;
            break;
        case 100:
            $this->saldo += 100;
            break;
        case 510.15:
            $this->saldo += 592.08;
            break;
        case 962.59:
            $this->saldo += 1184.17;
            break;
        default:
        //Devuelve false si el monto ingresado no es válido
            return false;
        }
        $this->PagarPlus();
        // Devuelve true si el monto ingresado es válido
        return true;
    }

    protected function PagarPlus(){
        if( $this->plus==2){
            if($this->saldo>=($this->ValorBoleto*2)){
            $this->saldo-=($this->ValorBoleto*2);
            $this->plus=0;
            $this->pagoplus=2;
            } else if($this->saldo>=$this->ValorBoleto){
                $this->saldo-=$this->ValorBoleto;
                $this->plus=1;
                $this->pagoplus=1;
            }
        } else{
            if($this->plus==1 && $this->saldo>$this->ValorBoleto){
                $this->saldo-=$this->ValorBoleto;
                $this->plus=0;
            }
        }
    }

    /**
     * Devuelve el saldo que le queda a la tarjeta.
     *
     * @return float
     */
    public function obtenerSaldo() {
      return $this->saldo;
    }

    /*
     Resta saldo a la tarjeta
     */
    public function restarSaldo(){
        $ValorARestar = $this->CalculaValor();
        if($this->saldo>=$ValorARestar){
            $this->saldo-=$ValorARestar;
            $this->UltimoValorPagado=$ValorARestar;
            $this->UltimaHora = $this->tiempo->time();
            return TRUE;
        }
        if($this->plus<2){
            $this->plus++;
            $this->UltimaHora = $this->tiempo->time();
            return TRUE;
        }
        return FALSE;
        }

    public function CalculaValor(){
        return $this->ValorBoleto;
    }

    // Setea a 0 el "pago plus". Esta funcion se ejecutara cuando se emite el boleto
    public function obtenerPagoPlus(){
        $pagoplusaux = $this->pagoplus;
        $this->pagoplus=0;
        return $pagoplusaux;
    }

    public function boletoCompleto(){
        return $this->ValorBoleto;
    }

    public function obtenerId(){
        return $this->id;
    }

    public function ValorPagado(){
        return $this->UltimoValorPagado;
    }
}
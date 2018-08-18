<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    
    protected $saldo;

    protected $plus = 0;

/*/
    Funcion para recargar la tarjeta
    Las cargas aceptadas de tarjetas son: (10, 20, 30, 50, 100, 510,15 y 962,59)
    Cuando se cargan $510,15 se acreditan de forma adicional: 81,93
    Cuando se cargan $962,59 se acreditan de forma adicional: 221,58
/*/

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
    $boleto = 14.8;
    if( $this->plus==2){
        if($this->saldo>($boleto*2)){
        $this->saldo-=($boleto*2);
        $this->plus=0;
        } else if($this->saldo>$boleto){
            $this->saldo-=$boleto;
            $this->plus=1;
        }
    } else{
        if($this->plus==1 && $this->saldo>$boleto){
            $this->saldo-=$boleto;
            $this->plus=0;
        }
    }
    // Devuelve true si el monto ingresado es válido
      return true;
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
    public function restarSaldo($valorB){
        if($this->saldo<$valorB){
            if($this->plus<2){
                $this->plus++;
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{ 
                $this->saldo-=$valorB;
                return TRUE;
            }
        }
    }
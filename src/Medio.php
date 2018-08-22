<?php

namespace TrabajoTarjeta;

//Escribir un test que valide que una tarjeta de FranquiciaCompleta siempre puede pagar un boleto.
//Escribir un test que valide que el monto del boleto pagado con medio boleto es siempre la mitad del normal.

/*/
Tarjeta medio
Tarjeta completo
/*/


class Medio extends Tarjeta {

    public function restarSaldo(($valorB)/2){
        if($this->saldo<($valorB/2)){
            if($this->plus<2){
                $this->plus++;
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{
                $this->saldo-=($valorB/2);
                return TRUE;
            }
        }
    }
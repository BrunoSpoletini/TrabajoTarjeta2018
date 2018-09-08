<?php
namespace TrabajoTarjeta;
//Escribir un test que valide que una tarjeta de FranquiciaCompleta siempre puede pagar un boleto.
//Escribir un test que valide que el monto del boleto pagado con medio boleto es siempre la mitad del normal.
/*/
Tarjeta medio
Tarjeta completo
/*/
class Medio extends Tarjeta {
    public function restarSaldo(){
        if($this->saldo>=($this->ValorBoleto)/2){
            $this->saldo-=($this->ValorBoleto/2);
            return TRUE;
        }
        if($this->plus<2){
            $this->plus++;
            return TRUE;
        }
        return FALSE;
        }

    public function ValorPagado(){
            return ($ValorBoleto/2);
    }
}
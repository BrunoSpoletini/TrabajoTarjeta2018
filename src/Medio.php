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
        if((time()-$this->UltimaHora)<300){return FALSE;}
        $ValorARestar = $this->CalculaValor();
        if($this->saldo>=$ValorARestar){
            $this->saldo-=$ValorARestar;
            $this->UltimoValorPagado=$ValorARestar;
            $this->UltimaHora = time();
            return TRUE;
        }
        if($this->plus<2){
            $this->plus++;
            $this->UltimaHora = time();
            return TRUE;
        }
        return FALSE;
        }

    public function CalculaValor(){
        return (($this->ValorBoleto)/2);
    }
}
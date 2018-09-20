<?php
namespace TrabajoTarjeta;

/*/
Tarjeta medio
/*/
class Medio extends Tarjeta
{

    protected $UltimaHora = -300; //Para poder usarlo apenas se compra

    public function restarSaldo($linea)
    {
        if (($this->tiempo->time() - $this->UltimaHora) < 299) {return false;} //Limitacion de 5 minutos
        $ValorARestar = $this->CalculaValor($linea); //Llama a la funcion que calcula el valor del boleto a pagar
        if ($this->saldo >= $ValorARestar) { //Se fija si le alcanza el saldo
            $this->saldo -= $ValorARestar; //En caso de alcanzar lo resta
            $this->UltimoValorPagado = $ValorARestar; //Guarda el valor del ultimo pago que se realizo
            $this->UltimoColectivo = $linea;
            $this->UltimaHora = $this->tiempo->time(); //Guarda la hora de este pago
            return true; //se completa el pago
        }
        if ($this->plus < 2) { //En caso de no alcanzarle el saldo, se fija si dispone de plus
            $this->plus++; //le saca un plus
            $this->UltimaHora = $this->tiempo->time(); //Guarda la hora de utilizacion del plus
            $this->UltimoColectivo = $linea;
            $this->UltimoValorPagado = 0.0; //Indica que se pago 0.0
            return true; //Completa el pago
        }
        return false; //No Se pudo pagar
    }

    public function CalculaValor($linea)
    {
        if ($this->UltimoColectivo == $linea || $this->UltimoValorPagado == 0.0) {return ($this->ValorBoleto/2);}//el valor del medio es la mitad de un valor normal
        return (($this->ValorBoleto/2) * 1.33); 
    }
}

<?php
namespace TrabajoTarjeta;

/*/
Tarjeta completo
/*/
class Completo extends Tarjeta
{
    protected $ValorBoleto = 0; //El boleto vale 0

    public function calculaValor($linea)
    {
        return $this->ValorBoleto; //Devuelve el valor ya almacenado
    }
}

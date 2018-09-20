<?php
namespace TrabajoTarjeta;

/*/
Tarjeta completo
/*/
class Completo extends Tarjeta
{
    protected $ValorBoleto = 0;

    public function CalculaValor($linea)
    {
        return $this->ValorBoleto;
    }
}

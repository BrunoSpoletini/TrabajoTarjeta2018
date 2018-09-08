<?php
namespace TrabajoTarjeta;
//Escribir un test que valide que una tarjeta de FranquiciaCompleta siempre puede pagar un boleto.
//Escribir un test que valide que el monto del boleto pagado con medio boleto es siempre la mitad del normal.
/*/
Tarjeta medio
Tarjeta completo
/*/
class Completo extends Tarjeta {
    protected $ValorBoleto=0;
}
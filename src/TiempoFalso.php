<?php

namespace TrabajoTarjeta;

class TiempoFalso implements TiempoInterface
{
    protected $tiempo;
    public function __construct($tiempoInicial = 0)
    {
        $this->tiempo = $tiempoInicial;
    }
    public function avanzar($segundos)
    {
        $this->tiempo += $segundos;
    }
    public function time()
    {
        return $this->tiempo;
    }

    public function Feriado(){
        $fecha = date('d-m',$this->tiempo);
        $feriados        = array( 
            '01-01',  //  Año Nuevo
            '24-03',  //  Día Nacional de la Memoria por la Verdad y la Justicia.
            '02-04',  //  Día del Veterano y de los Caídos en la Guerra de Malvinas.
            '01-05',  //  Día del trabajador.
            '25-05',  //  Día de la Revolución de Mayo. 
            '17-06',  //  Día Paso a la Inmortalidad del General Martín Miguel de Güemes.
            '20-06',  //  Día Paso a la Inmortalidad del General Manuel Belgrano. F
            '09-07',  //  Día de la Independencia.
            '17-08',  //  Paso a la Inmortalidad del Gral. José de San Martín
            '12-10',  //  Día del Respeto a la Diversidad Cultural 
            '20-11',  //  Día de la Soberanía Nacional
            '08-12',  //  Inmaculada Concepción de María
            '25-12',  //  Navidad
            );

        return in_array($fecha,$feriados);
    }
}

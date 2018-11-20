<?php

namespace TrabajoTarjeta;

interface TiempoInterface
{

    public function time();
    
    public function agregarFeriado();

    public function esFeriado();

}

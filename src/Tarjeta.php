<?php

namespace TrabajoTarjeta;

class Tarjeta implements TarjetaInterface {
    protected $saldo;

/*/
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
            return false;
    }
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

}

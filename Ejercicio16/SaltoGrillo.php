<?php

class SaltoGrillo {

    private int $posX;

    private int $posD;

    private int $cantidadPorSalto;

    public function __construct(int $posX, int $posD, int $cantidadPorSalto)
    {
        $this->posX = $posX;

        $this->posD = $posD;

        $this->cantidadPorSalto = $cantidadPorSalto;
    }

    public function calcularSaltosMinimos() {
        $diferenciaDistancia = $this->posD - $this->posX;

        if ($diferenciaDistancia < $this->cantidadPorSalto) {
            return 1;
        }

        $cantidadSaltos = (int) ceil($diferenciaDistancia / $this->cantidadPorSalto);

        return $cantidadSaltos;


        //Solucion no optimizada

        /* $distanciaRecorrida = 0;
        

        while(true) {
            if ($this->posD - $distanciaRecorrida < abs($this->posD - ($distanciaRecorrida + $this->cantidadPorSalto))) {
                return $distanciaRecorrida / $this->cantidadPorSalto;
            }

            $distanciaRecorrida += $this->cantidadPorSalto;
            
        } */

    }




    public function setPosX(int $posX) {
        $posX > 0 ? $this->posX = $posX : $this->posX = 0;
    }

    public function setPosD(int $posD) {
        $posD > 0 ? $this->posD = $posD : $this->posD = 0;
    }

    public function setCantidadPorSalto(int $cantidadPorSalto) {
        $cantidadPorSalto > 0 ? $this->cantidadPorSalto = $cantidadPorSalto : $this->cantidadPorSalto = 0;
    }
}


?>
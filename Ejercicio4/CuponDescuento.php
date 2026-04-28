<?php

class CuponDescuento {

    private const PORCENTAJE = 0.20;

    public function aplicarPorcentaje(float $totalCarrito) {


        if ($totalCarrito < 50) {
            return false;
        } else {
            $totalPrecioConDescuento = (float)$totalCarrito - $totalCarrito * self::PORCENTAJE;
            return $totalPrecioConDescuento;
        }

    }

}



?>
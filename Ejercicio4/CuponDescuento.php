<?php

class CuponDescuento {

    private const PORCENTAJE = 0.20;

    public function aplicarPorcentaje(Carrito $carrito) {

        $totalCarrito = $carrito->getTotal();

        if ($totalCarrito < 0 || $totalCarrito > 50) {
            return false;
        } else {
            $totalPrecioConDescuento = + $totalCarrito + $totalCarrito * self::PORCENTAJE;
             $carrito->setPrice($totalPrecioConDescuento);
        }

    }

}



?>
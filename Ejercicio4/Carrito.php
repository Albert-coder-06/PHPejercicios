<?php
    include_once 'Producto.php';

    class Carrito {
        private $productos = [];

        public function agregarProducto(Producto $producto, $cantidad = 1) {

            $productsToRawObjects = array_map(function($valor, $clave) {
                return $valor->toArray();
            }, $this->productos);

            $productSearch = array_search($producto->getId(), array_column($productsToRawObjects, 'id'));

            if ($productSearch !== false) {
                $this->productos[$productSearch]->incrementCartQuantity($cantidad);
            } else {
                $producto->incrementCartQuantity($cantidad);
                $this->productos[] = $producto;
            }



        }

        public function getCarrito() {
            return $this->productos;
        }
        
    }
?>
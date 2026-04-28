<?php
    include_once 'Producto.php';

    class Carrito {
        private $productos = [];
        private $total;

        public function agregarProducto(Producto $producto, int $cantidad = 1) {

            $productsToRawObjects = array_map(function($valor) {
                return $valor->toArray();
            }, $this->productos);

            $productSearch = array_search($producto->getId(), array_column($productsToRawObjects, 'id'));

            if ($productSearch !== false) {
                $this->productos[$productSearch]->incrementCartQuantity($cantidad);
            } else {
                $producto->incrementCartQuantity($cantidad);
                $this->productos[] = $producto;
            }

            $this->total = $this->getTotal();

            return true;



        }


        public function quitarProducto(int $id) {

            //FORMA RESUMIDA

            /* $result = array_filter($this->productos, function ($value) use ($id) {
                return $value->getId() !== $id;
            });

            $this->productos = $result;

            return true; */


            //HARDCODED

            $productsToRawObjects = array_map(function($valor) {
                return $valor->toArray();
            }, $this->productos);

            $productSearch = array_search($id, array_column($productsToRawObjects, 'id'));

            if ($productSearch !== false) {
                $this->productos = array_filter($this->productos, function($value) use ($id) {
                    return $value->getId() !== $id;
                });

                return true;
            } else {
                return false;
            }
        }

        public function getTotal() {
            $result = array_reduce($this->productos, function ($carry, $item) {
                return $carry += $item->getPrecio() * $item->getCantidad();
            }, 0);

            return (float)$result;
        }

        public function setPrice(float $price) {
            $this->total = $price;
        }

        public function getCarrito() {
            return $this->productos;
        }
        
    }
?>
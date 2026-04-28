<?php
    include_once 'Producto.php';
    include_once 'CuponDescuento.php';

    class Carrito {
        private $productos = [];
        private $total;

        private $cuponDescuento = null;


        public function aplicarCuponDescuento (CuponDescuento $cupon) {
            
            if ($this->cuponDescuento) {
                return false;
            }

            $result = $cupon->aplicarPorcentaje($this->total);

            if ($result) {
                $this->cuponDescuento = $cupon;
                $this->total = $result;
                return true;
            } else {
                return false;
            }

        }


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

                $this->total = $this->getTotal();

                return true;
            } else {
                return false;
            }
        }

        public function getTotal() {
            $result = array_reduce($this->productos, function ($carry, $item) {
                return $carry += $item->getPrecio() * $item->getCantidad();
            }, 0);

            if ($this->cuponDescuento) {
                return (float)$this->cuponDescuento->aplicarPorcentaje($result);
            }

            return (float)$result;
        }

        public function getCarrito() {
            return $this->productos;
        }
        
    }
?>
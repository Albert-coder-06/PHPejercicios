<?php

    class Producto {

        private $id;
        private $nombre;
        private $precio;
        private $cartQuantity;

        public function __construct(int $id, string $nombre, float $precio, int $cartQuantity = 0)
        {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->cartQuantity = $cartQuantity;
        }


        public function toArray() {
            return [
                "id" => $this->id, 
                "nombre" => $this->nombre, 
                "precio" => $this->precio,
                "cartQuantity" => $this->cartQuantity
            ];
        }

        public function setCartQuantity() {
            $this->cartQuantity++;
        }

        public function incrementCartQuantity($cantidad) {
            $this->cartQuantity += $cantidad;
        }

        public function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPrecio() {
            return $this->precio;
        }

        public function getCantidad() {
            return $this->cartQuantity;
        }

    }

?>
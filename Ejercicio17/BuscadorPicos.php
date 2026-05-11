<?php

class BuscadorPicos {
    private array $numeros;

    public function __construct(array $numeros)
    {
        $this->numeros = $numeros;
    }

    public function buscarPico(array $numeros) {

        $inicio = 0;
        $fin = count($numeros) - 1;

        while ($inicio < $fin) {
            $mitad = (int)(($inicio + $fin) / 2);

            // Si el de la derecha es más grande, el pico está a la derecha
            if ($numeros[$mitad] < $numeros[$mitad + 1]) {
                $inicio = $mitad + 1;
            } else {
                // Si el de la derecha es menor o igual, el pico está a la izquierda 
                // (o es el propio número de la mitad)
                $fin = $mitad;
            }
        }

        // Al final, inicio y fin convergen en el pico
        return $numeros[$inicio];

        

    }
}

?>
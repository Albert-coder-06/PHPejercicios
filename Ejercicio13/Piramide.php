<?php

    function crearPiramide(int $altura) {

        echo "<pre>";
        for($i = 1; $i <= $altura; $i++) {

            $cantidadEspacios = $altura - ($i);
            $cantidadAsteriscos = (2 * $i) - 1;

            for ($c = 1; $c <= $cantidadEspacios; $c++) {
                echo " ";
            }

            for($j = 1; $j <= $cantidadAsteriscos; $j++) {
                echo "*";
            }

            echo "<br>";
        }

        echo "</pre>";

    
    }





?>


<!DOCTYPE html>
    <html>
        <body>
            <?php crearPiramide(7) ?>
        </body>
    </html>
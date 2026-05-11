<?php

    $terreno = [
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0],
        [0,0,0,0,0]
    ];

    $terreno = añadirTesoroPosRand($terreno);

    $coordenadasTesoro = buscarPosTesoro($terreno);

    $desplazamientosMinimos = calcularDesplazamientosMinimos($coordenadasTesoro);
    

    function añadirTesoroPosRand(array $terreno) {
        $x = rand(0,4);
        $y = rand(0,4);

        echo ("Desde añadirTesoroPosRand: la posicion esta en X$x : Y$y");

        $terreno[$y][$x] = 1;

        return $terreno;
    }

    function buscarPosTesoro(array $terreno) {

        $posX = 0;
        $posY = 0;
        $terrenoYLenth = count($terreno);
        $terrenoXLenth = count($terreno[1]);

        //Mapa visual Debug
        echo "<pre>";
        for ($y = 0; $y <= $terrenoYLenth - 1; $y++) {
            for($x = 0; $x <= $terrenoXLenth - 1; $x++) {
                echo $terreno[$y][$x];
            } 
            echo "<br>";
            
        }
        echo "</pre>";

        for ($y = 0; $y <= $terrenoYLenth - 1; $y++) {
            for($x = 0; $x <= $terrenoXLenth - 1; $x++) {
                if ($terreno[$y][$x] === 1) {
                    $posY = $y;
                    $posX = $x;

                    return ["posX" => $posX, "posY" => $posY];
                }
            }
            
        }

        echo "</pre>";

    }
    
    function calcularDesplazamientosMinimos(array $coordenadasTesoro) {
        $initialX = 0;
        $initialY = 0;

        $formulaMatematica = ($coordenadasTesoro['posX'] - $initialX) + ($coordenadasTesoro['posY'] - $initialY);

        return $formulaMatematica;
    }

?>

<!DOCTYPE html>
    <html>
        <body>
            <h1>Coordenadas del tesoro</h1>
            <?php foreach($coordenadasTesoro as $nombre => $valor):?>
                <p><?= $nombre ?> : <?= $valor ?></p>
            <?php endforeach;?>

            <h1>Desplazamientos minimos</h1>

            <?= $desplazamientosMinimos ?>
        </body>
    </html>


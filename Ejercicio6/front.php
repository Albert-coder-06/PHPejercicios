<?php
    include_once 'App.php';

    $app = new App();


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ejercicio 6</title>
    </head>
    <body>
        <?php 
            $resultadoProceso = $app->processNewTransaction(10, 'EUR');
            $resultadoProceso2 = $app->processNewTransaction(20, 'EUR');
        ?>
        <h1>Resultado de los procesos de pago</h1>
    
        <p><?= $resultadoProceso ?></p>
        <p><?= $resultadoProceso2 ?></p>


    </body>
</html>
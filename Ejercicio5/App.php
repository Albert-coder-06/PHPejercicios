<?php

    include_once 'Censor.php';

    $censorMachine = new Censor();

    $message = "Eres ungilipoLlas pero te amo eresunpoquillotoNto";

    $result = $censorMachine->analyzeSentence($message);





?>


<!DOCTYPE html>
<html>
    <body>
        <p>El mensaje que intentas enviar: <?= $message ?></p>

        <p>El mensaje filtrado: <?= $result ?></p>
        
    </body>
</html>
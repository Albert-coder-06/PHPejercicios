<?php
for ($i = 1; $i <= 50; $i++) {
    $salida = "";
    
    // Usamos round() para que el micro-decimal no nos arruine la comparación
    $restoDivision3 = round($i - (floor($i / 3) * 3));
    $restoDivision5 = round($i - (floor($i / 5) * 5));

    if ($restoDivision3 == 0) {
        $salida .= "Fizz";
    }

    if ($restoDivision5 == 0) {
        $salida .= "Buzz";
    }

    if ($salida !== "") {
        echo "Número " . $i . ": " . $salida . "<br>";
    } else {
        echo "Número " . $i . ": " . $i . "<br>";
    }
}
?>
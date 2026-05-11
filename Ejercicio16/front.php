<?php

    include_once 'SaltoGrillo.php';

    $juego = new SaltoGrillo(0,90,30);

    $saltosMinimos = $juego->calcularSaltosMinimos();

    echo $saltosMinimos;


?>


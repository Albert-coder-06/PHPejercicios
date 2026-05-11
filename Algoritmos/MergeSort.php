<?php

/**
 * Función principal que divide el array
 */
function mergeSort(array $array): array {
    $n = count($array);

    // Caso base: si el array tiene 0 o 1 elemento, ya está "ordenado"
    if ($n <= 1) {
        return $array;
    }

    // 1. Dividir: Buscamos el punto medio
    $medio = (int)($n / 2);
    
    // Partimos el array en mitad izquierda y mitad derecha
    $izquierda = array_slice($array, 0, $medio);
    $derecha = array_slice($array, $medio);

    // 2. Recursión: Llamamos a mergeSort para cada mitad
    // Esto seguirá dividiendo hasta llegar a elementos sueltos
    $izquierda = mergeSort($izquierda);
    $derecha = mergeSort($derecha);

    // 3. Fusionar: Juntamos las mitades ordenadamente
    return fusionar($izquierda, $derecha);
}

/**
 * Función auxiliar para mezclar dos arrays de forma ordenada
 */
function fusionar(array $izq, array $der): array {
    $res = [];
    
    // Mientras haya elementos en ambos arrays...
    while (count($izq) > 0 && count($der) > 0) {
        // Comparamos el primer elemento de cada uno
        if ($izq[0] <= $der[0]) {
            // Si el de la izquierda es menor, va al resultado
            $res[] = array_shift($izq);
        } else {
            // Si el de la derecha es menor, va al resultado
            $res[] = array_shift($der);
        }
    }

    // Si sobraron elementos en algún array, los pegamos al final
    return array_merge($res, $izq, $der);
}

// --- PRUEBA DEL ALGORITMO ---
$datos = [38, 27, 43, 3, 9, 82, 10];
echo "Original: " . implode(", ", $datos) . "<br>";

$ordenado = mergeSort($datos);
echo "Ordenado: " . implode(", ", $ordenado);
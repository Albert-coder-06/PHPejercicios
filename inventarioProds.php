<?php

$productos = [
    ['id' => 1, "Nombre" => "nike gato", "Stock" => 2, "Precio" => 30.00],
    ['id' => 2, "Nombre" => "adidas f50", "Stock" => 30, "Precio" => 100.00],
    ['id' => 3, "Nombre" => "adidas camiseta simple", "Stock" => 2, "Precio" => 10.00],
];

function getLowStockProducts($products) {

    $validatedArray = is_array($products) ? $products : [$products];

    return array_filter($validatedArray, function ($value) {
        return $value['Stock'] < 5;
    });

}

function getTotalInvetoryValue ($products) {
    $validatedArray = is_array($products) ? $products : [$products];

    return array_reduce($validatedArray, function($total, $value) {
        return $total += $value['Precio'] * $value['Stock'];
    }, 0);

}

function getCapitalizedWithDiscount($products) {
    $validatedArray = is_array($products) ? $products : [$products];

    return array_map(function ($item) {
        $firstCharacterToUpper = strtoupper($item['Nombre'][0]) . substr($item['Nombre'], 1);

        $item['Nombre'] = $item['Nombre'] === $firstCharacterToUpper ? $item['Nombre'] : $firstCharacterToUpper;

        $item['Precio'] = $item['Precio'] - $item['Precio'] * 0.10;

        return $item;

    }, $validatedArray);

}

?>

<!DOCTYPE html>
    <html>
        <body>
            <h1>Ejercicio de inventario de productos</h1>
            
            <div>
                <h1>Productos con stock bajo</h1>
                <ul>
                    <?php foreach (getLowStockProducts($productos) as $item): ?>
                        <li><?= $item['Nombre'] ?>></li>
                    <?php endforeach; ?>
                </ul>

                <hr>

                <h1>Valor de todo el inventario</h1>
                <p>El valor de todo el inventario es de <p><?= getTotalInvetoryValue($productos) ?></p></p>

                <h1>Productos con nombre capitalizado y descuento</h1>
                <ul>
                    <?php foreach (getCapitalizedWithDiscount($productos) as $item): ?>
                        <li><?= $item['Nombre'] ?></li>
                        <li><?= $item['Precio'] ?></li>
                    <?php endforeach; ?>
                </ul>
                
            </div>

        </body>
    </html>





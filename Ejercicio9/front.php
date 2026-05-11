<?php
    include_once 'ProductSearch.php';

    $products = [['id' => 0, "name" => "producto 1", "price" => 100.00], ['id' => 2, "name" => "producto 2", "price" => 50.00], ['id' => 3, "name" => "producto 3", "price" => 120.00]];

    $filteredProducts = ProductSearch::filterByPrice($products, 60.00);

?>

<!DOCTYPE html>

    <html>
        <body>
            <?php foreach ($filteredProducts as $product):?>
                <div style="display: grid;">
                    <p><?= $product['id'] ?></p>
                    <p><?= $product['name'] ?></p>
                    <p><?= $product['price'] ?></p>
                </div>
            <?php endforeach;?>
        </body>
    </html>
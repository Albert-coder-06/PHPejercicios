<?php
    include_once 'Carrito.php';
    include_once 'Producto.php';

    $carrito = new Carrito();

    $productosAñadir = [
        new Producto(1, "Nike gato", 50.00),
        new Producto(2, "Adidas camiseta simple", 10.00),
        new Producto(1, "Adidas camiseta simple", 10.00),
    ];

    $result = array_walk($productosAñadir, function ($value, $key) use ($carrito) {
        $carrito->agregarProducto($value);
    });





    




?>

<!DOCTYPE html>
<html>
    <body>
        <h1>Tu carrito antes de eliminar</h1>
        
        <?php foreach($carrito->getCarrito() as $product): ?>
            <div style="display:grid;">
                <h3><?= $product->getNombre()?></h3>
                <p><?= $product->getPrecio()?></p>
                <p>Cantidad: <?= $product->getCantidad()?></p>
            </div>
        <?php endforeach; ?>

        <?php
            $carrito->quitarProducto(1);
        ?>

        <h1>Tu carrito despues de eliminar</h1>
        
        <?php foreach($carrito->getCarrito() as $product): ?>
            <div style="display:grid;">
                <h3><?= $product->getNombre()?></h3>
                <p><?= $product->getPrecio()?></p>
                <p>Cantidad: <?= $product->getCantidad()?></p>
            </div>
        <?php endforeach; ?>

        <p>Total del carrito: <?= $carrito->getTotal() ?> €</p>
    </body>
</html>
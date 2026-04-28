<?php
    include_once 'Carrito.php';
    include_once 'Producto.php';
    include_once 'CuponDescuento.php';

    $carrito = new Carrito();

    $productosAñadir = [
        new Producto(1, "Nike gato", 50.00),
        new Producto(2, "Adidas camiseta simple", 10.00),
        new Producto(1, "Nike gato", 50.00),
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
                <p><?= $product->getPrecio()?> €</p>
                <p>Cantidad: <?= $product->getCantidad()?></p>
            </div>
        <?php endforeach; ?>

        <?php
            $carrito->quitarProducto(2);
        ?>

        <h1>Tu carrito despues de eliminar</h1>
        
        <?php foreach($carrito->getCarrito() as $product): ?>
            <div style="display:grid;">
                <h3><?= $product->getNombre()?></h3>
                <p><?= $product->getPrecio()?> €</p>
                <p>Cantidad: <?= $product->getCantidad()?></p>
            </div>
        <?php endforeach; ?>

        <p>Total del carrito antes de aplicar cupon: <?= $carrito->getTotal() ?> €</p>

        <?php
            $carrito->aplicarCuponDescuento(new CuponDescuento());
        ?>

        <p>Total del carrito despues de aplicar cupon: <?= $carrito->getTotal() ?> €</p>
    </body>
</html>
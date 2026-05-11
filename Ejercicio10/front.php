<?php

include_once 'App.php';

$app = new App();

$result = $app->getSlugFromTitle("Pagina  Usuario");

?>

<!DOCTYPE html> 
<html>
    <body>
        <?= $result ?>
    </body>
</html>
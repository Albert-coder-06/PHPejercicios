<?php

    include_once 'App.php';

    $app = new App();

    $result = $app->getHydratedUser(["id" => 1 ,"name" => "Albert", "email" => "albertdangavicol@gmail.com"]);

    

    

?>

<!DOCTYPE html>
    <html>
        <body>
            
                <?= $result ?>
            

            


        </body>
    </html>
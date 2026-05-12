<?php

    $parentesis = "{[]{}}{}";

    function validarParentesis(string $value) {
        $parejasParentesis = [
            "(" => ")",
            "{" => "}",
            "[" => "]",
        ];

        for($w = 0; $w <= strlen($value) - 1; $w++) {

            //first level char
            $char1 = $value[$w];

            //
            $levelQuantity = 1;
            for($w2 = $w + 1; $w <= strlen($value) - 1; $w2++) {
                if ($value[$w2] === $parejasParentesis[$char1]) {
                    $levelQuantity++;
                }
            }

        }
        return true;
    }

    $result = validarParentesis($parentesis);

    

?>

<!DOCTYPE html>
    <html>
        <body>
            <p>Resultado: <?= $result ? 'TRUE' : 'FALSE' ?></p>
        </body>
    </html>
<?php

    $parentesis = "{[][}{]}";
    $parentesisPrueba1 = "{{}}";    

    function validarParentesis(string $value) {


        $parejasParentesis = [
            "(" => ")",
            "{" => "}",
            "[" => "]",
        ];

        for($w = 0; $w <= strlen($value) - 1; $w++) {

            //first level char
            $char1 = $value[$w];

            if (!isset($parejasParentesis[$char1])) {
                continue;
            }

            //Quantity of levels of the same bracket
            $levelQuantity = 1;
            $firstLevelIsClosed = false;

            for($w2 = $w + 1; $w2 <= strlen($value) - 1; $w2++) {
                $char2 = $value[$w2];

                if ($char2 === $char1) {
                    $levelQuantity++;
                } else if ($char2 === $parejasParentesis[$char1] && $levelQuantity === 1) {
                    $firstLevelIsClosed = true;
                    break;
                } else if ($char2 === $parejasParentesis[$char1]) {
                    $levelQuantity--;
                }
            }

            if ($levelQuantity !== 1 || $levelQuantity === 1 && !$firstLevelIsClosed) {
                return false;
            }

        }
        return true;
    }

    $pilaParentesis = [
        
    ];

    $parejasParentesis = [
            "(" => ")",
            "{" => "}",
            "[" => "]",
    ];

    function generarPilas(string $value) {

        for($w = 0; $w <= strlen($value) - 1; $w++) {

            //first level char
            $char1 = $value[$w];

            if (isset($parejasParentesis[$char1])) {
                for($w2 = $w + 1; $w2 <= strlen($value) - 1; $w2++) {
                    $char2 = $value[$w2];
                    if ($char2 === $parejasParentesis[$char1]) {
                        $newLevel = substr($value, $w, $w2 - $w);
                        $pilaParentesis[] = $newLevel;
                        
                        
                    }
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
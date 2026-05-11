<?php

    function isPalindrome(string $sentence) {
        $sentenceTransformed = strtolower($sentence);

        $sentenceTransformed = str_ireplace(' ', '', $sentenceTransformed);

        $sentenceTransformed = quitarAcentos($sentenceTransformed);

        $isPalindrome = true;

        for($word = 0; $word <= strlen($sentenceTransformed) - 1; $word++) {

            $wordRev = (strlen($sentenceTransformed) - 1) - $word;

            if (!$sentenceTransformed[$word] === $sentenceTransformed[$wordRev]) {
                $isPalindrome = false;
                return $isPalindrome;
            };

        };

        return $isPalindrome;

    }

    function quitarAcentos(string $cadena) {
        $buscar  = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ü', 'Ü'];
        $reemplazar = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U', 'u', 'U'];
        
        return str_replace($buscar, $reemplazar, $cadena);
    }

    $frase = "Ánita lava la tina";

    $result = isPalindrome($frase);

    

?>

<?= $result ? 'La frase ' . $frase . " es palindromo" : 'La frase ' . $frase . " no es palindromo"?>
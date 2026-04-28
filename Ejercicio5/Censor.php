<?php

    class Censor {

        private $blockedWords = ['gilipollas', 'tonto', 'atontado'];

        public function analyzeSentence(string $message) {
            $messageToLower = strtolower($message);

            $messageToArray = explode(' ', $message);

            foreach($messageToArray as &$word) {
                foreach($this->blockedWords as $blockedWord) {
                    if (str_contains(strtolower($word), strtolower($blockedWord))) {
                        $word = str_ireplace($blockedWord, str_repeat('*', strlen($blockedWord)), $word);
                    }
                }
            }

            return implode(' ', $messageToArray);


            

        }



    }
?>
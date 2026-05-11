<?php

class UrlGenerator {

    public static function toSlug(string $title) {
        $slug = "";

        $slug = strtolower($title);

        $slug = str_replace('-', '', $slug);
        
        $slug = preg_replace('/(.)\1+/', '$1', $slug);

        $slug = str_replace(' ', '-', $slug);


        return $slug;

        
    }


}

?>
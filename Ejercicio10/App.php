<?php
include_once 'UrlGenerator.php';

class App {
    
    public function getSlugFromTitle(string $title) {
        $result = UrlGenerator::toSlug($title);

        return $result;
    }
}

?>
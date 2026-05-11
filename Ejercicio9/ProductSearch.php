<?php

class ProductSearch {


    public static function filterByPrice(array $products, float $minPrice) {
        
        $filteredProducts = array_filter($products, function ($value) use ($minPrice) {
            return $value['price'] >= $minPrice;
        });

        return $filteredProducts;

    }

}
?>
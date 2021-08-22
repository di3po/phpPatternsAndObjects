<?php

//  *** Функции обратного вызова, анонимные функции и механизм замыканий

//  *** Функции обратного вызова

/* class Product {
    public $name;
    public $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProductSale {
    private $callbacks;

    public function registerCallback(callable $callback)
    {
        if(! is_callable($callback)) {
            throw new Exception("Callback function isn't callable.");
        }
        
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product) {
        print ("{$product->name}: is being processed...");
        foreach($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}

$logger = function($product) {
    print "Writing ({$product->name})...";
};

$processor = new ProductSale();
$processor->registerCallback($logger);

$processor->sale(new Product("Shoes", 45));
print "<br>";
$processor->sale(new Product("Pizza", 4500)); */
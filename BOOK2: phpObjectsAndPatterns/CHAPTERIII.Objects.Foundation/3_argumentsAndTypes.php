<?php
// *** Аргументы и типы
// *** Доступ из одного(ShopProductWriter) класса в другой(ShopProduct): принимая в качестве аргумента объект типа другого класса
/* class ShopProduct
{
    public $title = "Shampoo";
    public $author = "J&J Baby";
    public $price = 10;

    public function __construct(string $productTitle, string $productAuthor, int $productPrice)
    {
        $this->title = $productTitle;
        $this->author = $productAuthor;
        $this->price = $productPrice;
    }

    public function getTotalPrice()
    {
        return $this->price - 10;
    }
}

class ShopProductWriter {
    public function write(ShopProduct $shopProduct) {
        $str = $shopProduct->title.", ".$shopProduct->author.", ".$shopProduct->getTotalPrice();
        print $str;
    }
}
$product3 = new ShopProduct("Milk", "KazalySut", 300);
$productWriter = new ShopProductWriter();
$productWriter->write($product3); */
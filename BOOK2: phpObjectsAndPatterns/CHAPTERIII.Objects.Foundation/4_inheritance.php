<?php
// *** Наследование
/* class ShopProduct {
    private $name;
    private $price;
    protected $discount = 100;
    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price - $this->discount;
    }

    public function getInfo() {
        $b = "\"{$this->name}\"";
        // $b.= " ({$this->price}$";
        $b.= " (New price: {$this->getPrice()}$)";
        return $b;
    }
}

class BookProduct extends ShopProduct {
    private $author;
    
    public function __construct(string $name, float $price, string $author) {
        parent::__construct($name, $price);
        $this->author = $author;
    }

    public function getBookInfo() {
        $b = "{$this->author} - ";
        $b.= parent::getInfo();
        return $b;
    }
}

class FoodProduct extends ShopProduct {
    private $weight;
    private $homeland;
    public function __construct(string $name, float $price, float $weight, string $homeland) {
        parent::__construct($name, $price);
        $this->weight = $weight;
        $this->homeland = $homeland;
    }

    public function getFoodInfo() {
        $f = parent::getInfo();
        $f.= " - {$this->weight} kg";
        $f.= ", Homeland: {$this->homeland}";
        return $f;
    }
}

class ClothProduct extends ShopProduct {
    private $size;
    private $color;
    private $company;
    public function __construct(string $name, float $price, string $size, string $color, string $company) {
        parent::__construct($name, $price);
        $this->size = $size;
        $this->color = $color;
        $this->company = $company;
    }

    public function getClothInfo() {
        $c = parent::getInfo();
        $c.= " - Size: {$this->size}";
        $c.= ", Color: {$this->color}";
        $c.= ", Company: {$this->company}";
        return $c;
    }
}

print "<h1>Books</h1><br>";
$book1 = new BookProduct("Atomic habits", 5000.99, "James Clear");
print $book1->getBookInfo();
// print $book1->price; *** won't work
print "<br>Test: ".$book1->getPrice(); // *** will work

print "<br><br><h1>Food</h1><br>";
$food1 = new FoodProduct("Apple", 450.99, 1, "Argentine");
print $food1->getFoodInfo();

print "<br><br><h1>Clothes</h1><br>";
$cloth1 = new ClothProduct("Dress", 65699.00, "M", "pink", "Dolce&Gabbana");
print $cloth1->getClothInfo(); */
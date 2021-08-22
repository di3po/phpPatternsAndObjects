<?php
// *** Классы
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
} */

// *** Объекты
/* $product1 = new ShopProduct();
$product2 = new ShopProduct(); 
 */
//$product3 = new ShopProduct("Milk", "KazalySut", 300);

/* var_dump($product1);         // тип переменных $product1, $product2
var_dump($product2); */


// *** Свойства
/* print $product1->title;      // вызов свойства объекта с помощью "->"
print $product2->price; */

/* $product1->title = "Soap";   // переопределение свойств, заданных в классе
$product2->title = "Cream";
print $product1->title;
print $product2->title; */

//***код, в котором исп-ся класс - клиентский код

/* $product1 -> amount = 4;     // добавление в объект нового свойства, которого нет в классе
print $product1->amount; */

// var_dump($product11);

// practice - Menu with form
/* class Menu
{
    public $name;
    public $cost;

    public function __construct($customName, $customCost)
    {
        $this->name = $customName;
        $this->cost = $customCost;
    }

    public function getMeal()
    {
        return $this->name . " - " . $this->cost . "<br>";
    }
}

$pizza = new Menu("Pepperoni", 1200);
$drink = new Menu("Coca Cola", 300);

if ('POST' == $_SERVER['REQUEST_METHOD']) {
    print "Hello, " . $_POST['name'] . "!" . "<br><br>";
    print("<h1>Menu</h1><br>");
    // print $pizza->name . " - " . $pizza->cost . "<br>";
    // print $drink->name . " - " . $drink->cost; 
    print $pizza->getMeal();
    print $drink->getMeal();
} else {
    print <<<_HTML_
    <form method="post" action="$_SERVER[PHP_SELF]">
    <h3>Welcome</h3>
    Name: <input type="text" name="name" placeholder="Your name">
    <input type="submit" value="Press">
    </form>
    _HTML_;
}  */
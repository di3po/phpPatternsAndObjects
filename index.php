<?php

// *** 7 Creating web forms (Изучаем PHP7)
/* if('POST' == $_SERVER['REQUEST_METHOD']) {
    print "Hello, ".$_POST['your_name']."!";
} else {
    print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
     <input type="text" name="your_name" placeholder="Enter Your Name, please">
     <br>
     <br>
     <input type="submit" value="Greet">
     </form>
    _HTML_;
} */


// *** 3 Patterns and objects in PHP
// *** Класс
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
$product2 = new ShopProduct(); */

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
} */


// Методы

/* print $product1->getTotalPrice();
print "Total cost of product: {$product1->getTotalPrice()} $"; */


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


// *** 4 Расширенные средства
// *** Статические методы и свойства
/* try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=testdb', 'tpuser', 'tp');
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
  }

  class ShopProduct {
    private $name;
    private $price;
    protected $discount = 100;
    private $id = 0;

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

    public function setId(int $id) {
        $this->id = $id;
    }

//  статический метод getInstance() исп-ся, чтобы создавать объекты типа ShopProduct в контексте класса, а не вне его зоны
    public static function getInstance(int $id, \PDO $pdo) : ShopProduct {
        $stmt = $pdo->prepare("select * from products where id=?");
        $result = $stmt->execute([$id]);
        $row = $stmt->fetch();
        if(empty($row)) {
            return null;
        }
        if($row['type']=="book") {
            $product = new BookProduct(
                $row['name'],
                (float) $row['price'],
                (string) $row['author']
            );
        } elseif($row['type']=="food") {
            $product = new FoodProduct(
                $row['name'],
                (float) $row['price'],
                (float) $row['weight'],
                (string) $row['homeland']
            );   
        } elseif($row['type']=="cloth") {
            $product = new ClothProduct(
                $row['name'],
                (float) $row['price'],
                $row['size'],
                (string) $row['color'],
                (string) $row['company']
            );
        } else {
            $name = (is_null($row['name'])) ? "" : $row['name'];
            $product = new ShopProduct(
                $row['name'],
                (float) $row['price']
            );
        }
        $product->setId((int) $row['id']);
        $product->setDiscount((int) $row['discount']);
        return $product;
    }
} */


//  *** Постоянные свойства - коды ошибок или коды состояния программы, которые не могут быть изменяемы клиентским кодом
/* class ShopProduct {
    const AVAILABLE = 0;
    const OUT_OF_STOCK = 1;
}

print ShopProduct::AVAILABLE;   // 0 */

//  *** Абстрактные классы
/*  Экземляр абстрактного класса нельзя получить. В нем создается интерфейс для любого класса,
    который может его расширить. В нем должен быть минимум 1 абстрактный метод без тела. Этот метод 
    должен быть расширен в другом(расширяющем) классе. Расширяющий класс отвечает за реализацию 
    всех абстрактных методов и соответствие их сигнатур. */
/* class ShopProduct
{
    private $name;
    private $price;
    protected $discount = 100;
    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price - $this->discount;
    }
    
    public function getInfo()
    {
        $b = "\"{$this->name}\"";
        // $b.= " ({$this->price}$";
        $b .= " (New price: {$this->getPrice()}$)";
        return $b;
    }
}
abstract class ShopProductWriter
{
    protected $products = [];

    public function addProduct(ShopProduct $shopProduct)
    {
        $this->products[] = $shopProduct;
    }

    abstract public function write();
}

class XmlProductWriter extends ShopProductWriter
{
    public function write()
    {
        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement("products");
        foreach ($this->products as $shopProduct) {
            $writer->startElement("product");
            $writer->writeAttribute("title", $shopProduct->getName());
            $writer->startElement("summary");
            $writer->text($shopProduct->getInfo());
            $writer->endElement();  // "summary"
            $writer->endElement();  // "product"
        }
        $writer->endElement();  // "products"
        $writer->endDocument();
        print $writer->flush();
    }
}

class TextProductWriter extends ShopProductWriter
{
    public function write()
    {
        $str = "Products: <br>";
        foreach ($this->products as $shopProduct) {
            $str .= $shopProduct->getInfo() . "<br>";
        }
        print $str;
    }
}

$product1 = new ShopProduct("NameOfProduct", 42000);
$product2 = new ShopProduct("NameOfProduct", 42000);
$writerOfProduct = new TextProductWriter();
$writerOfProduct->write($product1, $product2); */

//  *** Интерфейсы
/*  С помощью интерфейса можно определить функциональность, но не определить ее. В интерфейсе могут
    находиться только объявления, но не тела методов. Как и с абстрактным классом, в любом классе,
    поддерживающем этот интерфейс, должны реализоваться все определенные в нем методы. Иначе класс
    должен быть объявлен как абстрактный. */
interface Chargeable {
    public function getPrice() : float;
}

class ShopProduct implements Chargeable {
    protected $price;

    public function getPrice() : float {
        return $this->price;
    }
}

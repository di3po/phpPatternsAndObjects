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

/* interface Chargeable {
    public function getPrice() : float;
}

class ShopProduct implements Chargeable {
    protected $price;

    public function getPrice() : float {
        return $this->price;
    }
} */

/*  Полезность интерфейсов - объединение типов данных, не связанных между собой. */

// Extends - 1, Implements - 1 and more (by comma)
//class Example extends Parent implements Interface1, Interface2 {}

//  *** Трейты (типаж, особенность, характерная черта)
//  *** в PHP нет множественного наследования(Multiple inheritance)
/* trait PriceUtilities {
    private $taxRate = 17;
    public function calculateTax(float $price) : float {
        return (($this->taxRate/100)*$price);
    }
}

class ShopProduct {
    use PriceUtilities;
}

abstract class Service {}

class UtilityService extends Service {
    use PriceUtilities;
}

$p = new ShopProduct();
print $p->calculateTax(100)."</br>";

$u = new UtilityService();
print $u->calculateTax(100); */


//  *** Обработка ошибок
//  *** Исключение - объект класса Exception, предназначены для хранения информации об ошибках или
//      выдачи сообщения о них. Конструктору класса Exception передаются 2 аргумента: строка сообщения
//      и код ошибки. 

//  \Exception

/*
    throw new \Exception -  этот оператор останавливает выполнение текущего кода и передает ответственность за
                        обработку ошибок обратно в вызывающий код.
*/

/* public function __construct (string $file) {
    $this->file = $file;
    
    if(!file_exists($file)) {
        throw new \Exception(" '$file' doesn't exist.");
    }

    $this->xml = simplexml_load_file($file);
} */

/* try {

} catch(\Exception $e) {
    die($e->__toString());
} */

//  Создание подклассов класса Exception

/* class XmlException extends \Exception {
    private $error;

    public function __construct(\LibXMLError $error) {
        $shortfile = basename($error->file);
        $msg = "[{$shortfile}, строка {$error->line}, стобец {$error->column}] {$error->message}";
        $this->error = $error;
        parent::__construct($msg, $error->code);  // сообщение и код ошибки
    }

    public function getLibXmlError() {
        return $this->error;
    }
}

class FileException extends \Exception {}

class ConfException extends \Exception {}

class Conf {
    private $file;
    private $xml;
    private $lastmatch;

    public function __construct(string $file) {
        $this->file = $file;

        if(!file_exists($file)) {                                   // new!
            throw new \FileException(" '$file' doesn't exist.");    // new!
        }                                                           // new!
        
        $this->xml = simplexml_load_file($file, null, LIBXML_NOERROR);  // new!

        if(! is_object($this->xml)) {                                   // new!
            throw new \XmlException(libxml_get_last_error());           // new!
        }                                                               // new!

        $matches = $this->xml->xpath("/conf");                          // new!
        if(! count($matches)) {                                         // new!
            throw new \ConfException("Root file not found: conf");      // new!
        }                                                               // new!
    }

    public function write() {
        if(! is_writable($this->file)) {                                    // new!
            throw new \FileException(" '{$this->file}' isn't writable");    // new!
        }                                                                   // new!

        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get(string $str) {
        $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");
        if(count($matches)) {
            $this->lastmatch = $matches[0];
            return (string)$matches[0];
        }
        return null;
    }

    public function set(string $key, string $value) {
        if(! is_null($this->get($key))) {
            $this->lastmatch = $value;
            return;
        }
        $conf = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }

    public static function init() {
        try{
            $conf = new Conf(__DIR__."conf.broken.xml");
            print "user: ".$conf->get('user')."\n";
            print "password: ".$conf->get('password')."\n";
            print "host: ".$conf->get('host')."\n";
            $conf->set("password", "newpass");
            $conf->write();
        }
        catch(FileException $e) {// File doesn't exist or not available }
        catch(XmlException $e) {// Broken XML file }
        catch(ConfException $e) {// Wrong XML file format }
        catch(\Exception $e) {// Mustn't be invited }
    }
}

/* <?xml version="1.0"?>
<conf>
    <item name="user">dino</item>
    <item name="password">newpass</item>
    <item name="host">localhost</item>
</conf> */


//  *** Очистка после операторов try/catch с помощью оператора finally

 /*class Runner extends Conf { 
    public static function init() {
        try{
            $fh = fopen(__DIR__."/log.txt", "a");
            fputs($fh, "Start\n");
            $conf = new Conf(dirname(__FILE__)."conf.broken.xml");
            print "user: ".$conf->get('user')."\n";
            print "host: ".$conf->get('host')."\n";
            $conf->set("password", "newpass");
            $conf->write();
        }
        catch(FileException $e) {
            // File doesn't exist or not available 
            fputs($fh, "Problem with file\n");
            throw $e;
        }
        catch(XmlException $e) {
            // Broken XML file 
            fputs($fh, "Problem(s) with XML file\n");
            throw $e;
        }
        catch(ConfException $e) {
            // Wrong XML file format 
            fputs($fh, "Problem(s) with configuration\n");
            throw $e;
        }
        catch(\Exception $e) {
            // Mustn't be invited 
            fputs($fh, "Not excepted problem(s)\n");
        }

        //  блок оператора finally вып-ся только если в блоке оператора try или catch 
        //  не вызываются функции die() или exit()
        finally{
            fputs($fh, "End\n");
            fclose($fh);
        }
    }   
 } */



//  *** Завершенные методы и классы
// final - конец наследованию

/* class Checkout {
    final public function totalize() {
        // get sum of all
    }
} */


//  *** Внутренний класс Error
/* try {
    eval("Wrong code");
} catch(\Error $e) {
    print get_class($e)."\n";
} catch(\Exception $e) {
    throw $e;
} */
// Result of compile: ParseError


//  *** Методы-перехватчики
//  Эти методы могут перехватывать сообщения, посланные несуществующим(неопределенным) методам или свойствам.
//  В PHP есть 3 вида методов-перехватчиков:
//  1 - Get:    __get($property)                        /*
//  2 - Set:    __set($property, $value)                   для неопр.
//              __isset($property)                         свойства
//              __unset($property)                      */ 
//  3 - Call    __call($method, $arg_array)             // для неопр. метода
//              __callStatic($method, $arg_array)       // для неопр. метода

/* class Person {
    public function __get(string $property) {
        $method = "get{$property}";             // MAGIC is here! get{Name}, get{Age}, so why $p->name works, 
                                                // even if there's no $name property given
        if(method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function getName() {
        return "MyNameIsName";
    }

    public function getAge() {
        return 99;
    }
}

$p = new Person();
print $p->name;     //  magic!
print $p->weight;   //  won't work */


/* class Student {
    private $_name;
    private $_age;

    public function __set($property, $value)
    {
        $method = "set{$property}";
        if(method_exists($this, $method)) {
            return $this->$method($value);      // return method and value, or new "property" we will give later
        }
    }

    public function setName($n) {
        $this->_name = $n;
        if(! is_null($n)) {
            return $this->_name = mb_strtoupper($this->_name);
        }
    }

    public function getName() {
        return $this->_name;
    }

}

$s = new Student();
$s->name = "Bob Dylan";     //  $_name = "Bob Dylan" which will be written as "BOB DYLAN"
print $s->getName(); */

//  *** Метод __call() можно применять для целей делегирования. Значение, возвращаемое этим методом передается обратно
//      клиенту так, будто оно было бы возвращено вызванным несуществующим методомю
//  *** Делегирование - это механизм, с помощью которого один объект может вызвать метод другого объекта.
class TaskWriter {
    public function writeTask(Task $p) {
        print $p->getTaskName();
    }
}

class Task {
    private $writer;

    public function __construct(TaskWriter $writer) {
        $this->writer = $writer;
    }
    
    public function __call(string $method, array $arguments)
    {
        if(method_exists($this->writer, $method)){
            return $this->writer->$method($this);
        } else {
            print "<br>{$method}() doesn't exist";
        }
    }

    public function getTaskName() : string {
        return "MyTaskName";
    }
}

$t = new Task(new TaskWriter());
$t->writeTask();            // will work thanks to __call() method, which invites writeTask() from TaskWriter class
$t->writeAnotherThing();    // returns nothing, i expected some error messages or __call() method to invite this not existing
                            //  writeAnotherThing() method and say that it doesn't exist. upd: Lol, I wrote it myself.


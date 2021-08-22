<?php
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
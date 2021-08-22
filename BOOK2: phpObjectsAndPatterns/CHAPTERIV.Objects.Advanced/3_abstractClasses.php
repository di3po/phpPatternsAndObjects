<?php
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
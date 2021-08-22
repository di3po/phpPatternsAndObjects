<?php
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
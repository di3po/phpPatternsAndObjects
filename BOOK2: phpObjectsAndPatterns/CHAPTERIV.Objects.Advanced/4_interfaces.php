<?php
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
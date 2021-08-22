<?php

//  *** Определение строковых значений для объектов
//  *   удобно использовать в классах, где основная задача - передача информации.
/* class Person{
    function getName() : string {
        return "Alex";
    }

    function getAge() : int {
        return 100;
    }

    function __toString()
    {
        $info = $this->getName();
        $info.= " is ".$this->getAge()." y.o.";
        return $info;
    }
}

$p = new Person();
print $p; */
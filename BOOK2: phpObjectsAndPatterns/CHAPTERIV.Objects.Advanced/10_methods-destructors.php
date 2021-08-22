<?php
//  *** Методы-деструкторы - обратные методы конструкторов
//  __destruct() - вызывается когда объект опр типа удаляется из памяти, 
//                  а его данные необходимо сохранить

/* class Person {
    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function __destruct()
    {
        if(! empty($this->id)) {
            print "Saving personal data...";    // сработает, если вызвать функцию __unset()
        }
    }

    public function getName() {
        return $this->name."<br>";
    }
}

$p = new Person("Alice", 550);
$p->setId(5);
print $p->getName();
unset($p);
print $p->getName(); // won't work */


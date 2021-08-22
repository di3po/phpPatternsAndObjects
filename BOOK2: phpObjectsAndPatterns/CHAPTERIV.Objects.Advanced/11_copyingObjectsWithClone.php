<?php

//  *** Копирование объектов с помощью метода __clone()

/* class CopiableWrongVersion {}

$obj = new CopiableWrongVersion();
$obj2 = $obj1;  //  ссылается на объект $obj1, не создавая новый объект obj2



class CopiableCorrectVersion {}

$o = new CopiableCorrectVersion();
$o2 = clone $o; //  правильное копирование: ссылается на другой объект $o2



class Woman {
    private $name;
    private $id;
    public $hairColor;

    public function __construct(string $name, HairColor $hairColor)
    {
        $this->name = $name;
        $this->hairColor = $hairColor;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function __clone()
    {
        $this->id = 0;
        $this->hairColor = clone $this->hairColor;
    }
}

class HairColor {
    public $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }
}

$aliceV1 = new Woman("Alice", new HairColor("brunette"));
$aliceV1->setId(123);

$aliceV2 = clone $aliceV1;  // cloning AliceV1 or saving her previous haircolor(brunette) in another object, before she turns blond

$aliceV1->hairColor->color = "blond";   // now she is blond

print "Alice is now ".$aliceV1->hairColor->color.".<br>";
print "Before ".$aliceV1->hairColor->color.", Alice was ".$aliceV2->hairColor->color.".<br>";

print $aliceV2->getId()."<br>"; // just another new woman with id "0"
print $aliceV1->getId();        


 */
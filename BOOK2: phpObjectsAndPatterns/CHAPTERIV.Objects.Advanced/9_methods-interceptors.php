<?php
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
/* class TaskWriter {
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
 */
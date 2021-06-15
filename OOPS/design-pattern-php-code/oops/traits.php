<?php
class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;

    public function sayHello()
    {
        parent::sayHello();
        // print_r(parent::sayHello());
        echo 'Helllo From '.__CLASS__.' World!'.PHP_EOL;
    }
}

$o = new MyHelloWorld();
$o->sayHello();

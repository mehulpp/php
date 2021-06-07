<?php
/*
We use the singleton pattern in order to restrict the number of instances that can be created from a resource consuming class to only one.
A private constructor is used to prevent the direct creation of objects from the class.
The only way to create an instance from the class is by using a static method that creates the object only if it wasn't already created.
*/
class SingletonClass
{
    protected static $mInstance;
    final private function __construct()
    {
        echo __CLASS__ . " initialize only once ";
    }

    public static function getInstance()
    {
        if (!self::$mInstance) {
            self::$mInstance = new SingletonClass();
        }
        return self::$mInstance;
    }

    public function clientcall()
    {
        echo "h1lo";
    }
}
$a = SingletonClass::getInstance()->clientcall();

$b = SingletonClass::getInstance()->clientcall();

print_r($a);
print_r($b);
var_dump($a == $b);

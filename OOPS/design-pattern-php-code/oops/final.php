<?php
class BaseClass
{
    final public function printData($val1, $val2)
    {
        $add=$val1+$val2;
        echo "Sum of given no=".$s;
    }
}


class Child extends BaseClass
{
    public function printData($val1, $val2)
    {
        $m=$val1*$val2;
        echo "Multiplication of given no=".$m;
    }
}
$obj= new Child();
$obj->printData(20, 20);

/*
2 behavior
PHP Fatal error:  Cannot override final method BaseClass::printData() in /home/mehul/Downloads/tuts/design-pattern-php-code/oops/final.php on line 14

PHP Fatal error:  Class Child may not inherit from final class (BaseClass) in /home/mehul/Downloads/tuts/design-pattern-php-code/oops/final.php on line 19

*/

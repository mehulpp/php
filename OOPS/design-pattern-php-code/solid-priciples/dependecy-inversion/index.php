<?php
//abstraction
interface ConnectionInterface
{
    public function connect();
}

//Low level depends on abstraction
class DbConnect implements ConnectionInterface
{
    public function connect()
    {
        // TODO: Implement connect() method.
        echo __METHOD__;
    }
}


//High Level Module
class PasswordReset
{
    private $connect;
    public function __construct(ConnectionInterface $connect)
    {
        $this->connect = $connect;
    }
}
$obj = new PasswordReset(new DbConnect);
#print_r($obj);
#$obj->connect();

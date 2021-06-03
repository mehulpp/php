<?php

//chain of responsibility

//Def:
/*Chain of Responsibility is behavioral design
 pattern that allows passing request along
 the chain of potential handlers until one of them handles request.
*/


abstract class HomeChecker{
    protected $successor;
    public  abstract function check(HomeStatus $home);
    public function successWith(HomeChecker $successor){
        $this->successor=$successor;
    }
    public function next(HomeStatus $home){
//        print_r($this->successor);exit;
        if ($this->successor){
            $this->successor->check($home);
        }
    }


}
class Locks extends HomeChecker {


    public function check(HomeStatus $home)
    {
//        echo __CLASS__;
        // TODO: Implement check() method.
        if (!$home->locked){
            throw new Exception("The Door is  not locked yet!Abort !!");
        }
        $this->next($home);
    }
}
class Lights extends HomeChecker {
    public function check(HomeStatus $home)
    {
        // TODO: Implement check() method.
//        echo __CLASS__;
        if (!$home->lightsOff){
            throw new Exception("The Lights is not off yet!Abort !!");
        }

        $this->next($home);
    }

}

class Alram extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if (!$home->alarmOn){
            throw new Exception("The Alaram is not set yet!Abort !!");
        }

        $this->next($home);
    }

}

class LunchBox extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if (!$home->lunchBoxReady){
            throw new Exception("The Lunch Box is not ready yet !Abort !!");
        }

        $this->next($home);
    }

}

class HomeStatus{

    public $lightsOff= true;
    public $locked = true;
    public $alarmOn = true;
    public $lunchBoxReady = true;
}

$alarm = new Alram();
$light =new Lights();
$locks = new Locks();
$lunchBox = new LunchBox();

$locks->successWith($light);
$light->successWith($alarm);
$alarm->successWith($lunchBox);

$locks->check(new HomeStatus());



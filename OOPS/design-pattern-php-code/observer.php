<?php
//Publisher
interface Subject{
    public function attach($observable);
    public function detach($observer);
    public function notify();

}

//Subscribe
interface Observer{
    public function handle();
}

class Login implements Subject{
    protected $observers =[];
    public function attach($observable)
    {
        if (is_array($observable)){

            foreach ($observable as $observer){
                if (!$observer instanceof Observer){
                    throw new Exception("Unknown Event");
                }
                $this->observers[] = $observer;
            }

            return;
        }
        $this->observers[] = $observable;
        return $this;

    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer){
            $observer->handle();
        }
    }

    public function fire(){
        //perform the login
        $this->notify();
    }
}

class LogHandler implements Observer{
    public function handle()
    {
        var_dump("Log Handler");
    }

}

class EmailNotifier implements Observer{
    public function handle()
    {
        var_dump("Email Sent");
    }

}

class Temp {

}

$login= new Login();
$login->attach([
    new LogHandler(),
    new EmailNotifier(),
//    new Temp(),
]);
$login->fire();
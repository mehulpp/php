<?php
interface ManagebleInterface
{
    public function beManaged();
}
interface HumanworkerInterface
{
    public function work();
    public function sleep();
}

interface AndroidworkerInterface
{
    public function work();
}


class HumanWorker implements HumanworkerInterface, ManagebleInterface
{
    public function sleep()
    {
        // TODO: Implement sleep() method.
        echo __METHOD__."::".__CLASS__.PHP_EOL;
    }

    public function work()
    {
        // TODO: Implement work() method.
        echo __METHOD__."::".__CLASS__.PHP_EOL;
    }

    public function beManaged()
    {
        // TODO: Implement beManaged() method.
        echo __METHOD__."::".__CLASS__.PHP_EOL;
        $this->work();
        $this->sleep();
    }
}

class AndroidWorker implements AndroidworkerInterface, ManagebleInterface
{
    public function work()
    {
        // TODO: Implement work() method.
        echo PHP_EOL.__METHOD__."::".__CLASS__.PHP_EOL;
        // echo PHP_EOL.__METHOD__.PHP_EOL;
    }

    public function beManaged()
    {
        // TODO: Implement beManaged() method.
        echo __CLASS__."Calling ";
        $this->work();
    }
}


class Captain
{
    public function manage(ManagebleInterface $handle)
    {
        $handle->beManaged();
    }
}

$captainObj = new Captain();
$captainObj->manage(new AndroidWorker());
$captainObj->manage(new HumanWorker());

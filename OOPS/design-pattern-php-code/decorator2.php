<?php
/*
 * Decorator Pattern
 * */
interface CarService{
    public function getCost();
    public function getDescription();
}

class BasicInspection implements CarService
{
    public function getCost()
    {
        return 19;
    }
    public function getDescription(){
        return "Basic Car Inspection";
    }
}

class OilChange implements CarService{
    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 20 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return $this->carService->getDescription() .', and Oil Change';
    }

}

$carservice = new OilChange(new BasicInspection());
echo $carservice->getCost().PHP_EOL;
echo $carservice->getDescription();

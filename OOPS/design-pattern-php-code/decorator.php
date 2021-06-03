<?php


class BasicInspection
{
    public function getCost()
    {
        return 19;
    }
}
class BasicInspectionAndOilChange
{
    public function getCost()
    {
        return 19 + 19;
    }
}

class BasicInspectionAndOilChangeAndTyreRotation
{
    public function getCost()
    {
        return 19 + 19 + 10;
    }
}

echo (new BasicInspectionAndOilChangeAndTyreRotation)->getCost();

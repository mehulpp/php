<?php


namespace App;


class Sqaure implements ShapeInterface
{

    public $height;
    public $width;
    public function __construct($height,$width)
    {
        $this->height =$height;
        $this->width = $width;

    }

    public function area()
{
    return $this->height * $this->width;
    // TODO: Implement area() method.
}
}
<?php


namespace App;


class Circle implements ShapeInterfacece
{
    public $radius;
 public function __construct($radius)
 {
     $this->radius=$radius;
 }

 public function area(){
      return $this->radius * $this->radius * pi();
 }

}
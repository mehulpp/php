<?php


namespace App;


class TurkeySub extends Sub
{

//    public function make(){
//        return $this
//            ->layBread()
//            ->addLettuce()
//            ->addTurkies()
//                ->addSauces();
//    }



    public function addPrimaryToppings(){
        var_dump("Adding Some Turkey");
        return $this;
    }



}
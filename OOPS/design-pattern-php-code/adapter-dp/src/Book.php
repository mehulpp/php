<?php


namespace Acme;

class Book implements Bookinterface
{

    public function open(){
        var_dump("Open a Book");
    }
    public function turnPage(){
        var_dump("Tuning a Page");
    }
}
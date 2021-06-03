<?php
namespace Acme;
class Kindle implements eBookinterface{
    public function trunOn()
    {
        var_dump("Turn on App");
    }

    public function pressNextButton()
    {
        var_dump("Switched to next page");
    }

}
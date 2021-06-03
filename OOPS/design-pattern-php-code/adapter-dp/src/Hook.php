<?php


namespace Acme;


class Hook implements eBookinterface
{

    public function trunOn()
    {
        var_dump("Turn on Hook App");
    }

    public function pressNextButton()
    {
        var_dump("Switched to next  page on Hook");
    }
}
<?php


namespace Acme;


class eReaderAdapter implements Bookinterface
{
    protected $eBookinterface;
    public function __construct(eBookinterface $eBookinterface)
    {
        $this->eBookinterface = $eBookinterface;

    }

    public function open()
    {
        $this->eBookinterface->trunOn();
    }

    public function turnPage()
    {
        $this->eBookinterface->pressNextButton();
    }


}
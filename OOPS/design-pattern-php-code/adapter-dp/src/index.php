<?php

/*
 * An adapter allows you to
 * translate one interface for use with another.
*/

require "../vendor/autoload.php";
use Acme\Book;
use Acme\Kindle;
use Acme\eReaderAdapter;
use Acme\Bookinterface;

class Person
{
    public function read(Bookinterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person())->read(new Book());
(new Person())->read(new eReaderAdapter(new Kindle()));
(new Person())->read(new eReaderAdapter(new \Acme\Hook()));

<?php
/*
 * Template method pattern  is a behavior design pattern that defines
 * the program skeleton of an alogorithm in a method ,called as template method
 * which defer some steps to subclasses
 */
require "vendor/autoload.php";

(new \App\TurkeySub())->make();

(new \App\VeggieSub())->make();
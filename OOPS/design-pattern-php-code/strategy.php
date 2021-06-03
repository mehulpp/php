<?php



/*

Def:
Define a family of algorithms or taks
encapsulate and make them interchangeable
*/
//logging
//email
/*
interface Logger
{
    public function log($data);
}


class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump("logging into FIle");
    }
}


class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump("logging into Database");
    }
}


class LogToWebService implements Logger
{
    public function log($data)
    {
        var_dump("logging into WS");
    }
}

class App
{
    public function log($data)
    {
        $log = new LogToDatabase;
        $log->log($data);
    }
}

$app = new App;
$app->log("some data");
*/


// Actual Implementation


interface Logger
{
    public function log($data);
}


class LogToFile implements Logger
{
    public function log($data)
    {
        var_dump("logging into FIle");
    }
}


class LogToDatabase implements Logger
{
    public function log($data)
    {
        var_dump("logging into Database");
    }
}


class LogToWebService implements Logger
{
    public function log($data)
    {
        var_dump("logging into WS");
    }
}

class App
{
    public function log($data, Logger $log)
    {
        // $log = new LogToDatabase;
        $log->log($data);
    }
}

$app = new App;
$app->log("some data", new LogToWebService);
$app->log("some data", new LogToDatabase);
$app->log("some data", new LogToFile);

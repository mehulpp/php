<?php

/*Dependency injection is a procedure where one object supplies the dependencies of another object. Dependency Injection is a software design approach that allows avoiding hard-coding dependencies and makes it possible to change the dependencies both at runtime and compile time.*/


//Constructor Injection

class Programmer
{
    private $skills;
    public function __construct($skills)
    {
        $this->skills = $skills;
    }
    public function totalSkills()
    {
        return count($this->skills);
    }
}
 $createskills = array("PHP", "JQUERY", "AJAX");
 $p = new Programmer($createskills);
 echo $p->totalSkills();


//Setter Injection


class Profile
{
    public static $language;
    public function setLanguage($language)
    {
        self::$language = $language;
    }
}
$profile = new Profile();
$language = ["Hindi","English","French"];
$profile->setLanguage($language);
print_r(Profile::$language);

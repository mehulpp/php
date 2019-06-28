<?php
class ParentClass {
    
    function __construct(){
    	echo "in parent";
    }
}
class ChildClass extends ParentClass
{
	
	function __construct()
	{
		parent::__construct();
		echo "in Child";
	}
}
#$foo = new ParentClass();
$boo = new ChildClass();
echo __CLASS__.":";

?> 
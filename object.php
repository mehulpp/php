<?php 
class Product{
	/*Functions that are defined inside of a class for use in an objects,
	 are called methods.
	 The this($this) pseudo variable refers to the current instance of the object
	  within that objects class class definition.
	*/
	//properties
	public $name="Hello There";

	//methods
	 public function getInfo()
	{
		return "Name:".$this->name;
	}
}	

$p= new Product();
echo $p->getInfo();
 ?>
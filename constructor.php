<?php 
class Product{
	public $name="Default Name";
	public $price=0;
	public $desc="Yummy taste";


	function __construct($name,$price,$desc) {
		$this->name = $name;
		$this->price= $price;
		$this->desc=$desc;
	}
	public function getInfo(){
		return "Product Name is:".$this->name;
	}
}

$p= new Product();
$vanilla =new Product("Vanilla",20,"Awseome Vanilla");
$chocolate=new Product("chocolate",25,"Ohhn wow thats the Chocolate");

echo $vanilla->getInfo();
//echo $chocolate->getInfo();

 ?>
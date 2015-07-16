<html>
<head>
	<title>Function Arguments</title>
</head>
<body>
	<?php 
	function sayHello($word)
	{
		# code...
		echo "Hello {$word}! <br/>";
	}

	$name="Mehul";
	sayHello($name);
	 ?>
<?php 

function anotherHello($greeting,$target,$punct){
	echo $greeting."". $target.$punct ."<br/>";
}

anotherHello("Hello",$name,"!!!");
anotherHello("Greeting",$name,null);
 ?>
</body>
</html>
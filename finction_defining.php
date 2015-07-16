<html>
	<head>
		<title>Basic</title>
	</head>
	<body>
	<?php 
	function hello()
	{
		# code...
		echo "Hello world !<br/>";
	}
	hello();
	function sayHello($word)
	{
		# code...
		echo "Hello {$word}!<br/>";
	}
	sayHello("world!");
	sayHello("EveryOne");
	 ?>
	</body>
</html>
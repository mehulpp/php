<html>
<head>
	<title>Debugging</title>
</head>
<body>
<?php 
	$number=99;
	$string="hello";
	$array=array(1 => "Homepage",2=>"About us" ,3=>"Services");

	var_dump($number);
	var_dump($string);
	var_dump($array);
 ?>
 <br/>
 <pre>
 <?php 
 	print_r(get_defined_vars());

  ?>
</pre>
<br/>
/*
/\*(.|[\r\n])*?\*/   for removing comments
^\s*\n  for removing blank lines
//.*$   for single line comment
*/
</body>
</html>

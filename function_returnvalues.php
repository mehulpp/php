<html>
<head>
	<title>Function return Values</title>
</head>
<body>
	<?php 
		function add($num1,$num2){
			$sum=$num1+$num2;
			return $sum;
		}

		$result1=add(3,4);
		$result2=add(5,$result1);
		echo $result1."<br/>";
		echo $result2."<br/>";
	 ?>
	 <?php 
	 	//chinese zoidiac
	 	function chinese_zodiac($year){
	 		switch (($year-4) % 12) {
	 			case 0:
	 			return 'rat';
	 			case 1:
	 			return 'Ox';
	 			case 2:
	 			return 'Tiger';
	 			case 3:
	 			return 'Rabbit';
	 			case 4:
	 			return 'Dragaon';
	 			case 5:
	 			return 'Snack';
	 			case 6:
	 			return 'Horse';
	 			case 7:
	 			return 'Goat';
	 			case 8:
	 			return 'Monkey';
	 			case 9:
	 			return 'Rooster';
	 			case 10:
	 			return 'Dog';
	 			case 10:
	 			return 'Pig';

	 				
	 		}
	 	}

	 	$zodiac=chinese_zodiac(2013);
	 	echo "2013 is the year of the {$zodiac}.<br/>";

	 	echo "2027 the year of the ".chinese_zodiac(2022).".<br/>";


	  ?>
</body>
</html>
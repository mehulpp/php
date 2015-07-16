<!doctype>
<html>
<head>
	<title></title>
</head>
<body>
	<table border='1'>
		<tr>
			<td>Name</td>
			<td>Value</td>
		</tr>
		<tr>
<?php 
$j=6;
for ($i=1; $i <=$j ; $i++) { 
	# code...
	echo "<tr>";
	echo "<td>"."15X".$i."</td>";

	echo "<td>". 15*$i."</td>";

	echo "</tr>";
}

echo 15*3;
 ?>
</tr>
</table>
</body>
</html>

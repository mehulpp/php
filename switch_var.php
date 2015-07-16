<?php 
$a=1;
$b=2;

echo "Before swipe:: a=>".$a."b=>".$b;
$a=$a+$b;
$b=$a-$b;
$a=$a-$b;
echo '<br/>';

echo "After Swiping Number: a=>".$a."b=>".$b;


 ?>
<?php
$redis = new Redis();
$redis->connect('35.239.71.72', 6379);
$redis->select(1);
$redis->set('name','mehul');
$value = $redis->get('name');
echo $value;
echo "<br/>";
$d=$redis->del('name');
var_dump($d);
$value = $redis->get('name');
echo $value."1";
echo "<br/>";



$redis->mset(array("city"=>"mumbai","country"=>"india"));
echo var_export($redis->mget(array("city","country")));
$redis->set("id",1);
var_dump($redis->incr("id",2));
var_dump($redis->incrBy("id",100));

?>

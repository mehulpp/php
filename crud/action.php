<?php
require_once 'Crud.php';
echo 3;
error_reporting(E_ALL);
ini_set('display_errors', 1);
$object = new Crud();

if (isset($_POST['action'])){
	echo "11";
	if ($_POST['action'] == "Load"){
		$query ="SELECT * FROM users order by id desc";
		echo $object->get_data_in_table($query);
		
	}
}
?>
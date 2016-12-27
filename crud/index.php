<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'Crud.php';
$object = new Crud();
echo 6;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container box">
<h3 align="center"> PHp Mysql OOPs</h3><br/>
<br/>
<div id="user_table" class="table-responsive">

</div>
</div>
</body>
</html>
<script>
$(document).ready(function(
		load_data();
	function load_data(){
var action ="Load";
$.ajax({
	url:"action.php",
	method :"post",
	data:{action :action},
	success:function(data){
	$("#user_table").html(data);
		}
	
});
		}
		));
</script>
<?php
if(isset($_POST['username']))
{
	// include Database connection file 
	include("db.php");
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$query = "SELECT username FROM users WHERE username = '$username'";
	$result  = $conn->query($query);
	if($result->num_rows > 0)
	{
		// username is already exist 
		echo '<div style="color: red;"> <b>'.$username.'</b> is already in use! </div>';
	}else{
		// username is avaialable to use.
		echo '<div style="color: green;"> <b>'.$username.'</b> is avaialable! </div>';
	}
}
?>
<!doctype html>
<html>
<head>
	<title>Email Validation</title>
</head>
<body>
	Email:<input type='text' id='txtEmail'/>
<input type='submit' name='submit' onclick='checkEmail();'/>
<script>

function checkEmail() {

    var email = document.getElementById('txtEmail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    console.error("Error in Your email")
    return false;
 }
}</script>
</body>
</html>
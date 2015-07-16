<?php
require_once './included_func.php';

if (isset($_POST['submit'])) {
    //form waa subitted
    $username = $_POST['name'];
    $password = $_POST['password'];
    if ($username == "mehul" && $password = "password") {
        //success
        redirect_to("http://www.google.com");
    } else {
        //$username=$_POST['name'];
        //$password=$_POST['password'];
        $message = "There were Some error";
    }
} else {
    $username = "";
    $message = "Please Login";
}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php echo $message; ?>
        <form action="form_single.php" method="post">
            NAme:<input type="text" name="name" value="<?php echo htmlspecialchars($username) ?>"/><br/>
            Password:<input type="password" name="password"/><br/>
            <input type="submit" name="submit" value="submit"/>
        </form>
    </body>
</html>

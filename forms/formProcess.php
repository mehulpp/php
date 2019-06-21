<?php
require 'db.php';
$errorMSG = "";
if (empty($_POST["username"])) {
    $errorMSG = "<li>username is required</<li>";
} else {
    $username = $_POST["username"];
}
if (empty($_POST["firstname"])) {
    $errorMSG .= "<li>firstname is required</li>";
} else {
    $firstname = $_POST["firstname"];
}
if (empty($_POST["lastname"])) {
    $errorMSG .= "<li>lastname is required</li>";
} else {
    $lastname = $_POST["lastname"];
}
if (empty($_POST["dob"])) {
    $errorMSG .= "<li>dob is required</li>";
} else {
    $dob = date("Y-m-d",strtotime($_POST['dob']));
}
if (empty($_POST["age"])) {
    $errorMSG .= "<li>age is required</li>";
} else {
    $age = $_POST["age"];
}
if (empty($_POST["hobbies"])) {
    $errorMSG .= "<li>hobbies is required</li>";
} else {
    $hobbies = $_POST["hobbies"];
}

if(empty($errorMSG)){
    $sql = "INSERT INTO users (username, `first_name`, `last_name`,dob,age,hobbies) VALUES ('{$username}', '{$firstname}', '{$lastname}','{$dob}','{$age}','{$hobbies}')";
    $conn->query($sql);
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
}
echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
?>
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once 'db.php';
$name = $conn->real_escape_string($_GET['term']);
$result = $conn->query("select * from hobbies where desc_text like '%{$name}%'");
$hobbies = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hobbies[]=$row['desc_text'];
    }
}
echo json_encode($hobbies);
?>
<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require("../includes/database_connect.php");

$phone = $_POST['phone'];

$sql = "SELECT * FROM employees WHERE phone=$phone";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response= array("success"=> false, "message"=> "Something went wrong!");
	echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    $response= array("success"=> false, "message"=> "No Record Founded for $phone !");
	echo json_encode($response);
    return;
}



$row = mysqli_fetch_assoc($result);
$name= $row['full_name'];
$task= $row['task'];

$response= array("success"=> true, "message"=> "Employee's Name: $name", "message_1"=>"Task: $task");
echo json_encode($response);
mysqli_close($conn);

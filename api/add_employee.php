<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require("../includes/database_connect.php");

$full_name=$_POST['name'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM employees WHERE phone='$phone'";
$result = pg_query($conn, $sql);
if (!$result) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = pg_num_rows($result);
if ($row_count != 0) {
    $response = array("success"=> false, "message" => "Mobile No. $phone is already registered with us!");
    echo json_encode($response);
    return;
}

$sql_1 = "INSERT INTO employees(full_name, phone) VALUES ('$full_name', '$phone')";
$result_1 = pg_query($conn, $sql_1);
if (!$result_1) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success"=> true, "message"=> "Employee added successfuly!");
echo json_encode($response);
pg_close($conn);
?>
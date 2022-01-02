<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require("../includes/database_connect.php");

$full_name=$_POST['name'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM employees WHERE phone='$phone'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    $response = array("success"=> false, "message" => "Phone No: $phone No Record founded!");
    echo json_encode($response);
    return;
}

$sql_1 = "UPDATE employees SET full_name = '$full_name', phone = $phone WHERE phone = $phone";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success"=> true, "message"=> "Employee Data updated successfuly!");
echo json_encode($response);
mysqli_close($conn);
?>
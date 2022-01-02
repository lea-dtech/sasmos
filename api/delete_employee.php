<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require("../includes/database_connect.php");

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
    $response = array("success"=> false, "message" => "No Record founded for $phone !");
    echo json_encode($response);
    return;
}

$row = mysqli_fetch_assoc($result);
$name= $row['full_name'];

$sql_1 = "DELETE FROM employees WHERE phone=$phone";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success"=> true, "message"=> "Data of $name Delete successfuly!");
echo json_encode($response);
mysqli_close($conn);
?>
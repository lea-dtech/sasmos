<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require("../includes/database_connect.php");

$task=$_POST['task'];
$phone = $_POST['phone'];

$sql = "SELECT * FROM employees WHERE phone='$phone'";
$result = pg_query($conn, $sql);
if (!$result) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = pg_num_rows($result);
if ($row_count == 0) {
    $response = array("success"=> false, "message" => "Please check Employee's phone Number!");
    echo json_encode($response);
    return;
}

$row = pg_fetch_object($result);
$name= $row->full_name;

$sql_1 = "UPDATE employees SET task = '$task' WHERE phone = '$phone'";
$result_1 = pg_query($conn, $sql_1);
if (!$result_1) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success"=> true, "message"=> "Task given successfuly to $name!");
echo json_encode($response);
pg_close($conn);
?>
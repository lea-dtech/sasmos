<?php
require("../includes/database_connect.php");

$full_name = $_POST['full_name'];
$phone = $_POST['phone'];
$email= $_POST['email'];
$password= $_POST['password'];
$password= sha1($password);
$gender = $_POST['gender'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = pg_query($conn, $sql);
if (!$result) {
    $response = array("success"=> false, "message"=> "Something went wrong!");
    echo json_encode($response);
    return;
}

$row_count = pg_num_rows($result);
if ($row_count != 0) {
    $response = array("success"=> false, "message" => "This email id is already registered with us!");
    echo json_encode($response);
    return;
}

$sql = "INSERT INTO users (email, password, full_name, phone, gender) VALUES ('$email', '$password', '$full_name', '$phone', '$gender')";
$result = pg_query($conn, $sql);
if (!$result) {
    $response= array("success" => false, "message" => "Something went wrong!");
    echo json_encode($response);
    return;
}

$response = array("success"=> true, "message"=> "Your account has been created successfuly!");
echo json_encode($response);
pg_close($conn);
?>
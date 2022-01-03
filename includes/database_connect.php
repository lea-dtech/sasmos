<?php
$conn = mysqli_connect("ec2-174-129-37-144.compute-1.amazonaws.com", "wflxutwoazkoco", "4a2bc0bd18956f8cd862c063845fee1f117bc02c509f1bcfe6b764edfc9b8f05", "d4l6ft91j0mfc", 5432);

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}

<?php
$conn = pg_connect("host=ec2-174-129-37-144.compute-1.amazonaws.com port=5432 user=wflxutwoazkoco password=4a2bc0bd18956f8cd862c063845fee1f117bc02c509f1bcfe6b764edfc9b8f05 dbname=d4l6ft91j0mfc");

if (!$conn) {
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}
?>

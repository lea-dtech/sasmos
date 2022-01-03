<?php
session_start();
require "includes/database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE s_no=$user_id";

$result_1 = pg_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = pg_fetch_object($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}

$sql_2 = "SELECT * FROM employees";

$result_2 = pg_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$employees = pg_fetch_object($result_2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | SASMOS</title>

    <?php
    include "includes/head_links.php";
    ?>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php
    include "includes/header.php";
    ?>

    <div>
        <h1 id="title">SASMOS EMPLOYEES MANAGEMENT INTERFACE</h1>
        <div id="first">
            <h1>Add Employee</h1>
            <form id="add_employee" method="POST" action="#">
                Name:
                <input name="name" placeholder="Enter Employee's Name" required>
                Phone:
                <input name="phone" maxlength="10" minlength="10" placeholder="Enter phone No." required>
                <button class="button" type="submit">Add</button>
            </form>
        </div>

        <div id="second">
            <h1>Delete Employee</h1>
            <form id="delete_employee" method="POST" action="#">
                <input type="text" name="phone" maxlength="10" minlength="10" placeholder="ENTER phone No." required>
                <button type="submit" class="button">DELETE EMPLOYEE</button>
            </form>
        </div>
    </div>

    <div>
        <div id="third">
            <h1>Edit Employee DATA</h1>
            <form id="edit_employee" method="POST" action="#">
                Name :
                <input type="text" name="name" placeholder="Enter New Name" required>
                Phone No. :
                <input type="text" name="phone" maxlength="10" min="10" placeholder="Enter phone No." required>
                <button type="submit" class="button">submit</button>
            </form>
        </div>

        <div id="fourth">
            <h1>Search Employee</h1>
            <form id="employee_search" method="POST" action="api/employee_search.php">
                Employee Phone No:
                <input placeholder="Enter Phone No" minlength="10" maxlength="10" name="phone" required /><br></br>
                <button class="button" type="submit">Search</button>
            </form>
        </div>
    </div>

    <div>
        <h1>Want to give task to your employee</h1>
        <form id="add_task" style="margin-bottom: 10px;" method="POST" action="#">
            Employee phone No:
            <input placeholder="Enter Phone No" minlength="10" maxlength="10" name="phone" required /><br></br>
            <textarea maxlength="480" name="task" cols="50" rows="5" placeholder="Enter task"></textarea><br />
            <button class="button" type="submit">Give Task</button>
        </form>
    </div>

    <?php
    include "includes/signup_modal.php";
    include "includes/login_modal.php";
    include "includes/footer.php";
    ?>
    <script type="text/javascript" src="js/dashboard.js"></script>
</body>

</html>
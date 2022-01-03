<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | SASMOS</title>

    <?php
    include "includes/head_links.php";
    ?>
</head>

<body>
    <?php
    include "includes/header.php";
    ?>
    <div>
        <h1 style="text-align: center;">SASMOS: INOVATION IS OUR HOBY.</h1>
    </div>

    <?php
    include "includes/signup_modal.php";
    include "includes/login_modal.php";
    include "includes/footer.php";
    ?>

</body>

</html>

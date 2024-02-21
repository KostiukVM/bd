<?php
session_start();
require_once('function.php');
$con = getPDO();



?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FirstForm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

</head>


<body>

<style>
    /* CSS стилі для форми */
    form {
        margin: 80px;
    }
</style>
<form method="post">
    <?php

    if (!isset($_POST['submit']))
    {
    ?>
    <!-- registration -->
    <div class="registration">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Your login</label>
            <input type="text" class="form-control" name="login" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">submit</button>

        <?php
        if (!empty($_POST['login']) && (!empty($_POST['password']))) {

            if (!userExists($con, $_POST['login'], $_POST['password'])) {

                die("User: " . $_POST['login'] . " no exist ;(");
                //add user
            } else {
                $_SESSION['login'] = $_POST['login'];
            }

        }
        ?>

        <?php
        } else {
            echo ' <script>window.location = "forum.php";</script>';

        }
        ?>
    </div>
</form>

</body>
</html>
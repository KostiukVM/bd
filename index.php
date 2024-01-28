<?php
require_once ('function.php');
$con = getPDO();
// add messages
if (!empty($_POST['login']) && (!empty($_POST['password'])) && (!empty($_POST['sendMessage'])))
{
    addNewMessage($con, htmlspecialchars($_POST['login']),htmlspecialchars($_POST['sendMessage']));
}
// delete messages
if (!empty($_GET['delete_message'])){
    deleteMessage($con, $_GET['delete_message']);
}
// show messages
$messages = getMess($con);
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
<form method="post" >

    <!-- registration -->
    <div class = "registration">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Your login</label>
            <input type="text" class="form-control" name="login" required>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <!--        registration verification-->
        <?php
        if (!empty($_POST['login']) && (!empty($_POST['password'])) && (!empty($_POST['sendMessage']))) {

            if (userExists($con, $_POST['login'], $_POST['password'])) {
                echo PHP_EOL . "Welcome " . $_POST['login'];

            } else {
                die("User: " . $_POST['login'] . " no exist ;(");
            }



        }
        ?>

        <hr>

        <!-- show forum -->
        <div class="forum">
            <div class="card">
                <div class="card-header">
                    Forum
                </div>
                <ul class="list-group list-group-flush">
                    <?php

                    foreach ($messages as $message) {
                        ?>
                        <li class="list-group-item">
                            <strong>  <?= $message['name'] ?> </strong> at
                            <?= $message['date'] ?> :
                            <i><?= $message['text'] ?></i>
                            <?php
                            // check for admin
                            if (!empty($_POST['login'])) {
                                if ((admin($con, $_POST['login'], $_POST['password'])) == true) {
                            ?>
                            <a href="?delete_message=<?= $message['id'] ?>">delete</a>
                            <?php } } ?>
                        </li>
                    <?php }
                    ?>
                </ul>
            </div>

            <hr><hr>
            <div class="mb-3">
                <label for="exampleInputSend" class="form-label">Messages</label>
                <input type="text" class="form-control" name="sendMessage" required>

            </div>
            <button type="submit" class="btn btn-primary">Send</button>

        </div>


</div>



</form>

<!---->
<!--<form method="post" action="index.php">-->
<!---->
<!--<ul class="nav">-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link active" aria-current="page" href="index.php?page=1">Register</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="index.php?page=2">Forum</a>-->
<!--</ul>-->
<!---->
<!--</form>-->
<!--<div class="conteiner">-->
<!---->
<!--    --><?php
//    if (isset($_POST['login'])) {
//        require_once ('forum.php');
//    } else {
//        include_once('register.php');
//        if (isset($_GET['page'])) {
//            $page = $_GET['page'];
//            if ($page == 1) {
//                include_once('register.php');
//            }
//            if ($page == 2) {
//                include_once('forum.php');
//            }
//        }
//    }
//    ?>






</div>

</body>
</html>
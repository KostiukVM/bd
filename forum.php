<?php
session_start();
require_once('function.php');
$con = getPDO();


if (!empty($_POST['sendMessage'])) {
    addNewMessage($con, ($_SESSION['login']), ($_POST['sendMessage']));
}

if (!empty($_GET['delete_message'])) {
    deleteMessage($con, $_GET['delete_message']);
}

$messages = getMess($con);

if (isset($_SESSION['login'])) {
echo $_SESSION['login'];
echo "pas = " . $_SESSION['password'];
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
                        <strong>  <?= $message['login'] ?> </strong> at
                        <?= $message['date'] ?> :
                        <i><?= $message['text'] ?></i>
                        <?php
                        if (!empty($_SESSION['login'])) {
                            if ((admin($con, $_SESSION['login'], $_SESSION['password'])) == true) {
                                ?>
                                <a href="?delete_message=<?= $message['id'] ?>">delete</a>
                            <?php }
                        } ?>
                    </li>
                <?php }
                ?>
            </ul>
        </div>

        <hr>
        <hr>
        <in class="mb-3">
            <label for="exampleInputSend" class="form-label">Messages</label>
            <input type="text" class="form-control" name="sendMessage" required>

        <button type="submit" class="btn btn-primary" name="Send">Send</button>
    </div>

</form>
<?php
}
?>
</body>
</html>
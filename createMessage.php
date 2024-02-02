<?php

require_once ('function.php');
 $con = getPDO();
 $messages = getMess($con);


if (!empty($_POST['sendMessage'])) {
    addNewMessage($con, htmlspecialchars($_SESSION['login']), htmlspecialchars($_POST['sendMessage']));
}


$pdo =null;

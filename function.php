<?php
function getPDO():PDO
{
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'forum';

    $con = new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $con;
}

function getMess($con):array
{
    $data =[];
    $sql = "SELECT * FROM posts";
    $result = $con->query($sql);

    while ($row = $result->fetch()) {
        $data[] = $row;
    }
    return $data;
}
function addNewMessage($con, $login, $message)
{
    $sql = "INSERT INTO posts (name, text) VALUES (\"$login\", \"$message\") ";
    if (!$con->query($sql)) {
        echo "sumthing went wrong";
    }
}


function userExists($con, $login, $password)
{
    $sql = $con->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $sql->bindParam(':login', $login);
    $sql->bindParam(':password', $password);
    $sql->execute();

    // Отримуємо результат запиту
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function deleteMessage($con, $id)
{
    $sql = "DELETE FROM posts WHERE id=". $id;
    if (!$con->query($sql)) {
        echo "Oh, Noo(";
    }
}
function admin($con, $login, $password)
{
    $sql = $con->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $sql->bindParam(':login', $login);
    $sql->bindParam(':password', $password);
    $sql->execute();

    $user = $sql->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Перевіряємо роль користувача
        if ($user['admin'] == 'yes') {
           return true;
        }
    }
}
$con = null;


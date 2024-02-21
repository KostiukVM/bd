<?php
function getPDO():PDO
{
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbname = 'chat';

    try {
        $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $e) {
        // Обробка помилок PDO
        echo "Помилка підключення до бази даних: " . $e->getMessage();
        die(); // Завершити виконання скрипта
    }
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
    $sql = $con->prepare ("INSERT INTO posts (login, text) VALUES (login = :login, text = :message) ");
    $sql->bindParam(':login', $login);
    $sql->bindParam(':text', $message);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
echo $result;
    return $result;
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


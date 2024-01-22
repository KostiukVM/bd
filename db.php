<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$dbName = 'forum';

$con = mysqli_connect($host, $username, $password, $dbName);

if ($con->connect_error) {
    die ("Connection failed " . $con->connect_error);
}

phpinfo();
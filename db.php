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

//    $con = mysqli_connect($host, $username, $password, $dbname);
//    if ($con->connect_error){
//        die ("errorrrrrrrrrr" . $con->connect_error);
//    }
}

function getMess($con):array
{
    $data =[];
    $sql = "SELECT * FROM users";
    $result = $con->query($sql);

    while ($row = $result->fetch()) {
        $data[] = $row;
    }
    return $data;
}

echo '<pre>';
var_dump(getMess(getPDO()));
echo '</pre>';
//phpinfo();
<?php

require_once ('function.php');
$con = getPDO();
$messages = getMess($con);



$pdo =null;

header('Content-Type: application/json; charset=utf-8');
echo json_encode(['data' => $messages]);
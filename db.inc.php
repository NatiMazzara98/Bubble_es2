<?php
$server = "localhost:3306";
$user = "mydb";
$pwd = "natalia98!";
$db = "register";

$conn = new mysqli($server, $user, $pwd, $db);

 header("Content-Type: text/html");
if($conn->connect_errno)
{http_response_code(400);
    echo  $conn->connect_error; exit();}

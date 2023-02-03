<?php

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods: GET,POST,PUT,PATCH,DELETE");
header('Access-Control-Allow-Credentials: true');
header('Content-Type: plain/text');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods,Access-Control-Allow-Origin, Access-Control-Allow-Credentials, Authorization, X-Requested-With");

include_once "./db.inc.php";
include_once "refactors.inc.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
    registerUser($conn);


function registerUser($conn)
{

    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rPwd = $_POST['rPwd'];

    echo "Congratulation!!\n \n";


    if ($pwd != $rPwd) {
        http_response_code(400);
    
        echo 'not';
        exit();
    }

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $rPwd = password_hash($rPwd, PASSWORD_DEFAULT);



    $sql = "INSERT into users (userName, email, pwd, r_pwd) VALUES (?,?,?,?,?,?);";
    $stmt = $conn->stmt_init();

    $stmt->bind_param('ssssss', $userName, $email, $pwd, $rPwd);
    $stmt->execute();
    if ($stmt->affected_rows) {
        http_response_code(200);
        echo "Registration successful\n";
    }
    exit();
}

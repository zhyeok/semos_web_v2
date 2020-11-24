<?php

header('Content-Type: text/html; charset=UTF-8');

$servername = "localhost";
$username = "root";
$password = "ily153153";
$dbname = "semos";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$id = $_POST['a'];
$sql = "SELECT * FROM member WHERE user_id = '{$id}' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$mode = $_POST['mode'] ;

switch($mode) {
    case 'select':
        if($count > 0) {
            echo json_encode('x');
        }  else {
            echo json_encode('o');
        }
        break;
}   


?>
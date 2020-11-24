<?php

header('Content-Type: text/html; charset=UTF-8');

$servername = "localhost";
$username = "root";
$password = "ily153153";
$dbname = "semos";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$filtered = array(
    'user_id'=> mysqli_real_escape_string($conn, $_POST['user_id']),
    'user_password'=> mysqli_real_escape_string($conn, $_POST['user_password']),
    'user_name'=> mysqli_real_escape_string($conn, $_POST['user_name']),
    'sex'=> mysqli_real_escape_string($conn, $_POST['sex']),
    'email_1'=> mysqli_real_escape_string($conn, $_POST['email_1']),
    'email_2'=> mysqli_real_escape_string($conn, $_POST['email_2'])
);

$email_center = "@";
$email = $filtered['email_1'].$email_center.$filtered['email_2'];

$user_password = password_hash($filtered['user_password'], PASSWORD_DEFAULT);

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

if (!preg_match("/^[A-Za-z0-9]{5,15}$/", $filtered['user_id'])) {
    echo "<script>alert('아이디를 확인해주세요!.'); history.back();</script>";
} else if(!preg_match("/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/", $filtered['user_password'])) {
    echo "<script>alert('패스워드를 확인해주세요!.'); history.back();</script>";
} else if(!preg_match("/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]{2,10}$/", $filtered['user_name'])) {
    echo "<script>alert('이름을 확인해주세요!.'); history.back();</script>";
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('이메일을 확인해주세요!.'); history.back();</script>";
} else {
    $add = "INSERT INTO member (user_id, user_password, user_name, sex, email)
    VALUES( '{$filtered['user_id']}', '$user_password', '{$filtered['user_name']}', '{$filtered['sex']}', '$email')";
    $result2 = mysqli_query($conn, $add);
    echo "<script>alert('세모스 회원가입이 완료되었습니다!.'); location.replace('index.php');</script>";
}

?>

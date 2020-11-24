<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="login.css">
  <meta charset="utf-8">
</head>

<body>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "ily153153";
    $dbname = "semos";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $sql = "SELECT * FROM member WHERE user_id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);


    if($count > 0) {
        if(password_verify($pw , $row['user_password'] )) {
            session_start();
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['pw'] = $row['user_password'];
            $_SESSION['name'] = $row['user_name'];
            echo "<script>alert('로그인이 성공했습니다.'); location.replace('index.php');</script>";
        } else {
            echo "<script>alert('로그인이 실패했습니다. 1 <br> 아이디와 비밀번호를 확인해주세요 '); history.back();</script>";
        }
    } else {
        echo "<script>alert('로그인이 실패했습니다. 2  <br> 아이디와 비밀번호를 확인해주세요 '); history.back();</script>";
    }
    

    ?>
    
</body>
</html>
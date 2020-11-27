<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <meta charset="utf-8">
</head>

<body>

  <?php
    
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "ily153153";
    $dbname = "semos";
    $dbname2 = "service_product";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    

    $type = $_GET['type'];
    $sql = "SELECT * FROM $type WHERE user_id = '{$_SESSION['id']}' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row['user_id'];
    $name = $row['name'];
        
    $conn->close();

    $conn = mysqli_connect($servername, $username, $password, $dbname2);
    $check = "SELECT * FROM $name";
    $result_4 = mysqli_query($conn, $check);
    $count = mysqli_num_rows($result_4);

    if($count > 0){
      echo "<script>alert('이미 서비스 상품을 등록하셨습니다. 서비스 상품 수정하기로 이동해 주세요'); location.replace('my_semos.php');</script>";
    } 
    
    $sql7 = "CREATE TABLE IF NOT EXISTS `{$name}` (
        `id` INT PRIMARY KEY NOT NULL,
        `user_id` VARCHAR(15) NOT NULL,
        `service_product` VARCHAR(30) NOT NULL,
        `service_price` VARCHAR(10) NOT NULL,
        `service_info` VARCHAR(30) NOT NULL,
        `reservation` varchar(10) NOT NULL
    )";

    if ($conn->query($sql7) === TRUE) {
      echo "<script>alert('서비스 상품 등록이 완료 되었습니다.'); location.replace('index.php');</script>";
    } else {
      echo "Error creating table: " . $conn->error;
    }

  ?>




</body>
</html>
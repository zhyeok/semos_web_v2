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
    $sql = "SELECT * FROM $type WHERE user_id = '{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row['user_id'];
    $name = $row['name'];
    
    $conn->close();

    $conn = mysqli_connect($servername, $username, $password, $dbname2);
    $check = "SELECT * FROM {$name}";
    $result_4 = mysqli_query($conn, $check);
    $count = mysqli_num_rows($result_4);
    
    $filtered = array(
        'service_1'=> mysqli_real_escape_string($conn, $_POST['service_1']),
        'service_info1'=> mysqli_real_escape_string($conn, $_POST['service_info1']),
        'reservation_1'=> mysqli_real_escape_string($conn, $_POST['reservation_1']),
        'price_1'=> mysqli_real_escape_string($conn, $_POST['price_1']),
        'service_2'=> mysqli_real_escape_string($conn, $_POST['service_2']),
        'service_info2'=> mysqli_real_escape_string($conn, $_POST['service_info2']),
        'reservation_2'=> mysqli_real_escape_string($conn, $_POST['reservation_2']),
        'price_2'=> mysqli_real_escape_string($conn, $_POST['price_2']),
        'service_3'=> mysqli_real_escape_string($conn, $_POST['service_3']),
        'service_info3'=> mysqli_real_escape_string($conn, $_POST['service_info3']),
        'reservation_3'=> mysqli_real_escape_string($conn, $_POST['reservation_3']),
        'price_3'=> mysqli_real_escape_string($conn, $_POST['price_3'])
    );

    if($count > 0){
        echo "<script>alert('이미 서비스 상품을 등록하셨습니다. 서비스 상품 수정하기로 이동해 주세요'); location.replace('my_semos.php');</script>";
    } 

    $sql7 = "CREATE TABLE IF NOT EXISTS `{$name}` (
      `id` INT PRIMARY key AUTO_INCREMENT,
      `partner_id` VARCHAR(15) NOT NULL,
      `service_product` VARCHAR(50) NOT NULL,
      `service_price` VARCHAR(10) NOT NULL,
      `service_info` VARCHAR(50) NOT NULL,
      `reservation` varchar(10) NOT NULL
    )";
    
    $result_1 = mysqli_query($conn, $sql7);


    $insert_1 = "INSERT INTO `$name` (`partner_id`, `service_product`, `service_price`, `service_info`, `reservation`)
      VALUES ('$id', '{$filtered['service_1']}', '{$filtered['price_1']}', '{$filtered['service_info1']}', '{$filtered['reservation_1']}')";

    $insert_2 = "INSERT INTO `$name` (`partner_id`, `service_product`, `service_price`, `service_info`, `reservation`)
      VALUES ('$id', '{$filtered['service_2']}', '{$filtered['price_2']}', '{$filtered['service_info2']}', '{$filtered['reservation_2']}')";

    $insert_3 = "INSERT INTO `$name` (`partner_id`, `service_product`, `service_price`, `service_info`, `reservation`)
      VALUES ('$id', '{$filtered['service_3']}', '{$filtered['price_3']}', '{$filtered['service_info3']}', '{$filtered['reservation_3']}')";
    
    
    

    if ($conn->query($insert_1) === FALSE) {
      echo "Error table1: ". $conn->error;  
    } else if($conn->query($insert_2) === FALSE) {
      echo "Error table2: ". $conn->error;
    } else if($conn->query($insert_3) === FALSE) {
      echo "Error table3: ". $conn->error;
    } else {
      echo "<script>alert('서비스 상품 등록이 완료 되었습니다.'); location.replace('index.php');</script>";
    }

    
  ?>
  
</body>
</html>

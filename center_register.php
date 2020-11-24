<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="center.css">
  <meta charset="utf-8">
</head>

<body>

  <?php

  $servername = "localhost";
  $username = "root";
  $password = "ily153153";
  $dbname = "semos";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $category = $_POST['category'];
  $img_name = $_FILES['img']['name'];
  $type = $_GET['type'];
  $uploads_dir = "./img/$type";

  $filtered = array(
    'name'=> mysqli_real_escape_string($conn, $_POST['name']),
    'address'=> mysqli_real_escape_string($conn, $_POST['address']),
    'detail_address'=> mysqli_real_escape_string($conn, $_POST['detailed_address']),
    'sigungu'=> mysqli_real_escape_string($conn, $_POST['sigungu']),
    'postcode'=> mysqli_real_escape_string($conn, $_POST['postcode']),
    'phone_number'=> mysqli_real_escape_string($conn, $_POST['phone_number']),
    'phone_number_2'=> mysqli_real_escape_string($conn, $_POST['phone_number_2']),
    'phone_number_3'=> mysqli_real_escape_string($conn, $_POST['phone_number_3']),
    'category'=> mysqli_real_escape_string($conn, $_POST['category']),
    'file_link'=> mysqli_real_escape_string($conn, "$uploads_dir/$img_name"),
    'type' => mysqli_real_escape_string($conn, $_POST['type']),
    'upload' => mysqli_real_escape_string($conn, $uploads_dir),
    'db_type' => mysqli_real_escape_string($conn, $_GET['type']),
    'facility'=> mysqli_real_escape_string($conn, $_POST['facility']),
    'weekday'=> mysqli_real_escape_string($conn, $_POST['weekday']),
    'weekend'=> mysqli_real_escape_string($conn, $_POST['weekend']),
    'holiday'=> mysqli_real_escape_string($conn, $_POST['holiday']),
    'information'=> mysqli_real_escape_string($conn, $_POST['information'])
  );
  
  
  
  
  
  



  if(!is_dir("{$filtered['upload']}")) 
  {
    mkdir("{$filtered['upload']}");

    if(move_uploaded_file($_FILES['img']['tmp_name'],"{$filtered['file_link']}")) 
    {
      $sql = "INSERT INTO $db_type (name, sigungu, category, phone_number, phone_number_2, phone_number_3, img, sport)
      VALUES('{$filtered['name']}', '{$filtered['sigungu']}', '{$filtered['category']}', '{$filtered['phone_number']}', '{$filtered['phone_number_2']}', '{$filtered['phone_number_3']}', '{$filtered['file_link']}', '{$filtered['type']}')";
      $result = mysqli_query($conn,$sql);
    } 
    else
    {
      echo "등록이 실패 했습니다. 파일을 확인해주세요!<br />";
    }
  } 
  else 
  {
    if(move_uploaded_file($_FILES['img']['tmp_name'],"{$filtered['file_link']}")) 
    {
      $sql = "INSERT INTO $db_type (name, sigungu, category, phone_number, phone_number_2, phone_number_3, img, sport)
      VALUES('{$filtered['name']}', '{$filtered['sigungu']}', '{$filtered['category']}', '{$filtered['phone_number']}', '{$filtered['phone_number_2']}', '{$filtered['phone_number_3']}', '{$filtered['file_link']}', '{$filtered['type']}')";
      $result = mysqli_query($conn,$sql);
    } 
    else
    {
      echo "등록이 실패 했습니다. 파일을 확인해주세요!<br/>";
    }
  }

  $sql2 = "SELECT * FROM $type WHERE name = '{$filtered['name']}' ";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);

  $page = $db_type._page;

  $sql3 = "INSERT INTO $page (center_id, facility, weekday, weekend, holiday, information, address, detail_address, postcode)
  VALUES('{$row2['id']}', '{$filtered['facility']}', '{$filtered['weekday']}', '{$filtered['weekend']}', '{$filtered['holiday']}', '{$filtered['information']}', '{$filtered['address']}', '{$filtered['detail_address']}', '{$filtered['postcode']}')";
  $result3 = mysqli_query($conn, $sql3);
  echo("<script>location.replace('complete.html');</script>");
  ?>
  
</body>
</html>


  
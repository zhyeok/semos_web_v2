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
  'phone_number'=> mysqli_real_escape_string($conn, $_POST['phone_number']),
  'phone_number_2'=> mysqli_real_escape_string($conn, $_POST['phone_number_2']),
  'category'=> mysqli_real_escape_string($conn, $_POST['category']),
  'file_link'=> mysqli_real_escape_string($conn, "$uploads_dir/$img_name"),
  'type' => mysqli_real_escape_string($conn, $_POST['type']),
  'upload' => mysqli_real_escape_string($conn, $uploads_dir)
);







if(!is_dir("{$filtered['upload']}")) 
{
  mkdir("{$filtered['upload']}");

  if(move_uploaded_file($_FILES['img']['tmp_name'],"{$filtered['file_link']}")) 
  {
    $sql = "INSERT INTO $type (name, address, category, phone_number, phone_number_2, img, sport)
    VALUES('{$filtered['name']}', '{$filtered['address']}', '{$filtered['category']}', '{$filtered['phone_number']}', '{$filtered['phone_number_2']}', '{$filtered['file_link']}', '{$filtered['type']}')";
    $result = mysqli_query($conn,$sql);
    echo("<script>location.replace('complete.html');</script>");
  } 
  else
  {
    echo "등록이 실패 했습니다. 파일을 확인해주세요!<br />";
  }
} 
else 
{
  if(move_uploaded_file($_FILES['img']['tmp_name'],"$uploads_dir/$img_name")) 
  {
    $sql = "INSERT INTO $type (name, address, category, phone_number, phone_number_2, img, sport)
    VALUES('{$filtered['name']}', '{$filtered['address']}', '{$filtered['category']}', '{$filtered['phone_number']}', '{$filtered['phone_number_2']}', '{$filtered['file_link']}', '{$filtered['type']}')";
    $result = mysqli_query($conn,$sql);
    echo("<script>location.replace('complete.html');</script>");
  } 
  else
  {
    echo "등록이 실패 했습니다. 파일을 확인해주세요!<br/>";
  }
}


?>

  
<?php

$servername = "localhost";
$username = "root";
$password = "ily153153";
$dbname = "semos";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$category = "center";
$uploads_dir = "./img/$category";

$img_name = $_FILES['img']['name'];
$uploadfile = $_FILES['img']['tmp_name'];
$file_link = "$uploads_dir/$img_name";

$name = $_POST['name'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$phone_number_2 = $_POST['phone_number_2'];
$category = $_POST['category'];



if(!is_dir($uploads_dir)) 
{
  mkdir($uploads_dir);

  if(move_uploaded_file($_FILES['img']['tmp_name'],"$file_link")) 
  {
    $sql = "INSERT INTO center(center_name, center_address, category, phone_number, phone_number_2, img)
    VALUES('$name', '$address', '$category', '$phone_number', '$phone_number_2', '$file_link')";
    $result = mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
      echo("<script>location.replace('complete.html');</script>");
    } else {
      echo "Error: ".$sql."<br>".$conn->error;
    }
    
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
    $sql = "INSERT INTO center(center_name, center_address, category, phone_number, phone_number_2, img)
    VALUES('$name', '$address', '$category', '$phone_number', '$phone_number_2', '$file_link')";
    $result = mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
      echo("<script>location.replace('complete.html');</script>");
    } else {
      echo "Error: ".$sql."<br>".$conn->error;
    }
  } 
  else
  {
    echo "등록이 실패 했습니다. 파일을 확인해주세요!<br/>";
  }
}


?>

  
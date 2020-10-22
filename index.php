<?php
$servername = "localhost";
$username = "root";
$password = "ily153153";
$dbname = "semos";

$name = $_POST['name'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$phone_number_2 = $_POST['phone_number_2'];
$category = $_POST['category'];




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("연결에 실패했습니다.: " . $conn->connect_error);
}

$sql = "INSERT INTO center (name, address, category, phone_number, phone_number_2)
VALUES ('$name', '$address', '$category', '$phone_number', '$phone_number_2')";

if ($conn->query($sql) === TRUE) {
  echo "등록이 완료되었습니다.";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
  
  
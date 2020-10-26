<!DOCTYPE HTML>
<html>
<head>
  <title>semos_center</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="insert.css">
</head>
<body>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "ily153153";
    $dbname = "semos";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM center";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo "$row";
    ?>

</body>
</html>

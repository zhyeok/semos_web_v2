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
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  if(isset($_GET['id'])) {
    $sql = "SELECT * FROM center WHERE category = '{$filtered_id}' ORDER BY id DESC ";
  } else {
    $sql = "SELECT * FROM center";
  }
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $list = '';



  while($row = mysqli_fetch_array($result)) {
    $list = $list."<div class='product'>
    <img src=\"{$row['img']}\" width='90%'/></br>
    <a href=\"index.php?id={$row['id']}\">[{$row['category']}] {$row['center_name']}</a></br>
    <p>위치 :{$row['center_address']}</p>
    <p>전화번호 : {$row['phone_number']}) {$row['phone_number_2']}</p>
    </div>";
  }
  
  


  ?>

  <div class="top">
      
    <a href="menu.html">
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>
      
    <a class="semos" href="index.html">
      <img  src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>

    <a>
      <img class="search" src="아이콘_소스/공통_아이콘/검색.png" width="5%"/>
    </a>
    
  </div>

  <div class="category">
    <p><b>센터 선택</b></p>
  </div>

  <div class="center_category">
    <a href="center.php?id=수영"><b>수영</b></a>
    <a href="center.php?id=서핑"><b>서핑</b></a>
    <a href="center.php?id=스쿠버다이빙"><b>스쿠버다이빙</b></a>
    <a href="center.php?id=수상레저"><b>수상레져</b></a>
    <a href="center.php?id=카약"><b>카약</b></a>
  </div>

  <div class="slider">
    <img src="아이콘_소스/3센터선택_이미지.png" width="100%"/>
  </div>

  <div class="center_list">

    <div class="center_intro">
      <p><b>총 <?=$count?>개의 센터가 있습니다.</b></p>
      <img class="center_count" src="아이콘_소스/공통_아이콘/정렬방식.png" width="18%" />
    </div>
    
  </div>
  
  <div><?=$list?></div>
  
</body>
</html>

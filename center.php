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
  $filtered_type = mysqli_real_escape_string($conn, $_GET['type']);
  $filtered_sport = mysqli_real_escape_string($conn, $_GET['sport']);
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  if(isset($_GET['id'])) {
    $sql = "SELECT * FROM $filtered_type WHERE category = '{$filtered_id}' AND sport = '{$filtered_sport}' ORDER BY id DESC ";
  } else {
  $sql = "SELECT * FROM $filtered_type WHERE sport = '{$filtered_sport}' ";
  }
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $list = '';
  
  $sql2 = "SELECT * FROM sport WHERE type = '{$filtered_sport}'";
  $result2 = mysqli_query($conn, $sql2);
  

  while($row = mysqli_fetch_array($result)) {
    $list = $list."<div class='product'>
    <img src=\"{$row['img']}\" width='90%'/></br>
    <a href=\"index.php?id={$row['id']}\">[{$row['category']}] {$row['name']}</a></br>
    <p>위치 :{$row['address']}</p>
    <p>전화번호 : {$row['phone_number']}) {$row['phone_number_2']}</p>
    </div>";
  }
  
  $link = '';
  while($row2 = mysqli_fetch_array($result2)) {
    $link = $link."<a href=\"center.php?id={$row2['sport']}&type=$filtered_type&sport=$filtered_sport\"><b>{$row2['sport']}</b></a>";
  }

  $select = "<a href=\"center.php?type=center&sport=$filtered_sport\">센터 선택</a>
  <a href=\"center.php?type=coach&sport=$filtered_sport\">강사 선택</a>";

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
    <?=$select?>
  </div>

  <div class="center_category">
    <?=$link?>
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

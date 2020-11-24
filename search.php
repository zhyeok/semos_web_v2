<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="search.css">
  <meta charset="utf-8">
</head>

<body>
  <?php

  $servername = "localhost";
  $username = "root";
  $password = "ily153153";
  $dbname = "semos";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  $type = $_GET['type'];
  $search = $_POST['search'];

  $sql = "SELECT * FROM $type WHERE name LIKE '%{$search}%'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  $list = "";

  if($count > 0) {
    while($row = mysqli_fetch_array($result)) {
      $list = $list."<div class='product'>
      <img src=\"{$row['img']}\" width='90%'/></br>
      <a href=\"{$filtered_type}_intro.php?id={$row['id']}&type=$filtered_type\">[{$row['category']}] </br>{$row['name']}</a></br>
      <p><img class='address' src='./아이콘_소스/주소-아이콘.png' />  {$row['sigungu']}</p>
      <p><img class='jjim' src='./아이콘_소스/공통_아이콘/찜.png' />   100</p>
      </div>";
    }
  } else {
    $list =  $list."<div class= 'empty'>
    <p><b>'$search' 에일치하는 세모스 파트너가 없습니다.</b></p>
    </div>";
    
  }
  ?>
  
  <div class="top">
    <a href="menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.html" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a> 
    
      
  </div>

  <form action="search.php?type=center" class= "search_bar" method="POST">
    <input class="search" name="search" type="text" placeholder="찾으시는 스포츠 센터 / 강사를 검색해주세요 !" required/>
    <input class="submit" type="image" src="./아이콘_소스/공통_아이콘/검색.png" width="5%"/>
  </form>

  <div class="center_intro">
      <p><b>총 <?=$count?>개의 세모스 파트너가 있습니다.</b></p>
    </div>
    

  <?=$list?>

</body>
</html>

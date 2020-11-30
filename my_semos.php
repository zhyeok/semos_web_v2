<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="my_semos.css">
  <script src="semos.js"></script>
  <meta charset="utf-8">
</head>
<body>

  <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "ily153153";
    $dbname = "semos";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM member WHERE user_id = '{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $tier = $row['tier'];

    $user_name = $_SESSION['name'];
    if(!isset($_SESSION['id']) && !isset($_SESSION['pw'])) {
      echo "<script>alert('로그인이 필요합니다.'); location.replace('index.php');</script>";;
    } else {
      $profile = "";
      $profile = $profile."<div class='user_profile'> 
      <img src='./아이콘_소스/공통_아이콘/프로필.png' width='15%' />
      <div class='profile_word'>
        <p style='font-size: 5vw;'><b>{$user_name}님</b></p>
        <p style='font-size: 3vw;'><b>{$tier}</b></p>
      </div>
    </div>";
    }

    if($tier === '세모스') {
      $mypage = "";
      $mypage = $mypage."
      <div>
        <a href='insert.php?id=센터&type=center'><b>센터 등록</b></a>
      </div>

      <div>
        <a href='insert.php?id=강사&type=coach'><b>강사 등록</b></a>
      </div>
      
      <div>
        <a href='service.php?type=center'><b>센터 서비스 상품 등록</b></a>
      </div>";
    } else if($tier === '관리자') {
      $mypage = "";
      $mypage = $mypage."
      <div>
        <a href='register.php'><b>센터 / 강사 정보 수정</b></a>
      </div>
      
      <div>
        <a href='./service.php'><b>서비스 상품 등록 / 수정</b></a>
      </div>";
    } else if($tier === '일반회원') {
      $mypage = "";
      $mypage = $mypage."
      <div>
        <a href='register.php'><b>내 정보 수정</b></a>
      </div>
      
      <div>
        <a href='semos_pick.html'><b>MY PICK</b></a>
      </div>";
    }
  
  ?>

<div class="top">
    <a href="./menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="./index.php" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  
    
  </div>

  <?=$profile?>

  <div class="my_page">
    <?=$mypage?>
  </div>

    <div class="bottom">
    <p></p>
    </div>

</body>
</html>
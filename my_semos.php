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
    $user_name = $_SESSION['name'];
    if(!isset($_SESSION['id']) && !isset($_SESSION['pw'])) {
      echo "<script>alert('로그인이 필요합니다.'); location.replace('index.php');</script>";;
    } else {
      $profile = "";
      $profile = $profile."<div class='user_profile'> 
      <img src='./아이콘_소스/공통_아이콘/프로필.png' width='15%' />
      <div class='profile_word'>
        <p style='font-size: 5vw;'><b>{$user_name}님</b></p>
        <p style='font-size: 3vw;'><b>관리자</b></p>
      </div>
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
    <div>
      <a href="profile.html"><b>회원정보 수정</b></a>
    </div>
    
    <div>
      <a href="semos_pick.html"><b>MY 세모스 마켓</b></a>
    </div>

    <div>
      <a><b>MY PICK</b></a>
    </div>

    <div style="margin-left: 5%;" class="pick">
      <a href="center_pick.html" style="color: #7a7a7a; font-size: 3vw; display: block;"><b>센터 / 강사 PICK</b></a>
      <a href="market_pick.html" style="color: #7a7a7a; font-size: 3vw; display: block; margin-top: 3%;"><b>마켓 PICK</b></a>
    </div>

    <div>
      <a><b>고객만족센터</b></a>
    </div>

    <div style="margin-left: 5%;" class="pick">
      <a href="notice.html"  style="color: #7a7a7a; font-size: 3vw; display: block;"><b>공지사항</b></a>
      <a href="FAQ.html" style="color: #7a7a7a; font-size: 3vw; display: block; margin-top: 3%;"><b>FAQ</b></a>
    </div>

  </div>

  <div class="bottom">
  <p></p>
  </div>

</body>
</html>
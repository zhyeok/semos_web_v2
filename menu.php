<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="menu.css">
  <script src="semos.js"></script>
  <meta charset="utf-8">
</head>
<body>


<?php
    session_start();

    $user_name = $_SESSION['name'];
    if(!isset($_SESSION['id']) && !isset($_SESSION['pw'])) {
      $login = "";
      $login = $login."<div class='login'>
      <form method='POST' action='./login_check.php'>
        <input class='id' name='id' type='text' placeholder='ID' required/>
        <input class='pw' name='pw' type='password' placeholder='PASSWORD' required/>
        <input class='login_submit' type='submit' value='로그인'>
      </form>
      <div>
        <a href='register.php'>회원가입</a> / 
        <a href='*'>비밀번호 찾기</a>
      </div>
      </div>"; 
    } else {
      $login = "";
      $login = $login."<div class='profile'>
      <img src='./아이콘_소스/공통_아이콘/프로필.png' width='15%'/>
      <div style='display: inline-block;'>
        <p><b>{$user_name}님 환영합니다.</b></p></br>
        <a href='./my_semos.php'><b>MY SEMOS</b></a>
      </div>
      <button id='logout'><a href='./logout.php'><b>로그아웃</b></a></button>
      
      </div>";
    }

  ?>
      
    <div class="top">
    <a href="./menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/닫기.png" width= "5%" />
    </a>  

    <a href="./index.php" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  
    
  </div>

  <div style="padding-top: 11vw;">
    <?=$login?>
  </div>

  <div class="my_page">
    <div>
      <a href="index.php"><b>세모스 홈</b></a>
    </div>
    
    <div>
      <a href="./center.php?sport=워터스포츠&type=center"><b>센터 선택</b></a>
    </div>

    <div>
      <a href="./center.php?sport=워터스포츠&type=coach"><b>강사 선택</b></a>
    </div>

  </div>

  <div class="bottom">
    <p style="margin-bottom: 7%; font-size: 4vw; color: black;"><b>리포츠(주) 사업자 정보</b></p>
    <p><b>대표이사 : 변민지ㅣ사업자등록번호 : 000-00-00000</b></p>
    <p><b>주소 : 경기도 수원시 광교로 145 (차세대융합기술원) 13층 23호</b></p>
    <p><b>호스팅사업자 :</b></p>
    <p><b>통신판매업신고번호 : 2020-경기수원-0000</b></p>
    <p><b>팩스 : 000-0000-0000ㅣ이메일:qusalswl1015@naver.com</b></p>
    <button><b>사업자정보확인</b></button>
    <p style="display: inline-block;"><b>●</b></p>
    <button><b>입점문의</b></button>
    <p style="display: inline-block;"><b>●</b></p>
    <button><b>채용문의</b></button>
  </div>

</body>
</html>
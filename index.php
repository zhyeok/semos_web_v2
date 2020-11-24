<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="index.css">
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
        <a href='./my_semos.html'><b>MY SEMOS</b></a>
      </div>
      <button id='logout'><a href='./logout.php'><b>로그아웃</b></a></button>
      
      </div>";
    }

  ?>

  <div class="top">
    <a href="menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  
    
  </div>

  <div style="padding-top: 11vw;">
    <?=$login?>
  </div>

  <form action="search.php?type=center" class= "search_bar" method="POST">
    <input class="search" name="search" type="text" placeholder="찾으시는 스포츠 센터 / 강사를 검색해주세요 !" required/>
    <input class="submit" type="image" src="./아이콘_소스/공통_아이콘/검색.png" width="5%"/>
  </form>
  

  <div class= "slide">
    <img class= "slide_img" src="아이콘_소스/2홈_이미지.png" width="100%"> </img> 
  </div>

  <div class= "select">

    <div class= "sport"> 
      <a href="center.php?sport=워터스포츠&type=center" class= "sport_icon">
        <img class= "sport_type" src="아이콘_소스/공통_아이콘/워터스포츠(원).png" width="100%">
      </a>

      <div class= "sport_word">
        <p>워터스포츠</P>
      </div>
    </div>

    <div class= "sport">
      <a href="center.php?sport=실내스포츠&type=center" class= "sport_icon">
        <img class= "sport_type" src="아이콘_소스/공통_아이콘/실내스포츠(원).png" width="100%">
      </a>

      <div class= "sport_word">
        <p>실내스포츠</P>
        </div>
    </div>


    <div class= "sport">
      <a href="center.php?sport=야외스포츠&type=center" class= "sport_icon">
        <img class= "sport_type" src="아이콘_소스/공통_아이콘/야외스포츠(원).png" width="100%">
      </a>

      <div class= "sport_word">
        <p>야외스포츠</P>
      </div>
    </div>

  </div>

  <div class= "product">

    <div>
      <div class= "product_word">
        <p><b>세모스 추천 센터 / 강사</b></p>
      </div>
      
      <div class= "product_small_word">
        <p><b>내가 찾는 센터 / 강사를 한눈에!</b></p>
      </div>
    </div>

    <div class= "center">
      <a href="center_intro.html" class= "product_img">
        <img calss= "center_img" src="아이콘_소스/2홈_이미지2.png" width="95%"> </img>
      </a>

      <div class= "center_word">
        <p><b>[수상레저] 가평 너에게 빠지</b></p>
      </div>

      <div class= "intro">
        <img class= "address" src="아이콘_소스/공통_아이콘/위치.png" width="14%"> </img>
        <p><b>경기 가평</b><p>
      </div>

      <div class= "intro">
        <img class= "heart" src="아이콘_소스/공통_아이콘/찜.png" width="14%"> </img>
        <p><b>59</p></b>
      </div>
    </div>

    <div class= "center">
      <a href="coach_intro.html" class= "product_img">
        <img calss= "center_img" src="아이콘_소스/2홈_이미지3.png" width="95%"> </img>
      </a>

      <div class= "coach_word">
        <p><b>[서핑] 변모스 강사</b></p>
      </div>

      <div class= "intro">
        <img class= "address" src="아이콘_소스/공통_아이콘/위치.png" width="14%"> </img>
        <p><b>경기 수원</b><p>
      </div>

      <div class= "intro">
        <img class= "heart" src="아이콘_소스/공통_아이콘/찜.png" width="14%"> </img>
        <p><b>125</p></b>
      </div>
    </div>

  </div>

  <div class="register">
    <button>
      <a href="insert.php?id=센터&type=center">센터 등록</a>
    </button>

    <button>
      <a href="insert.php?id=강사&type=coach">강사 등록</a>
    </button>
  </div>



</script>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="center_intro.css">
  <meta charset="utf-8">
</head>

<body>
  <?php

  $servername = "localhost";
  $username = "root";
  $password = "ily153153";
  $dbname = "semos";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  $db_code= mysqli_real_escape_string($conn, $_GET['id']);
  $db_type= mysqli_real_escape_string($conn, $_GET['type']);

  $sql = "SELECT * FROM $db_type WHERE id = '{$db_code}' ";
  $result = mysqli_query($conn, $sql);

  $name = mysqli_real_escape_string($conn, $result['name']);
  $address = mysqli_real_escape_string($conn, $result['address']);
  $phone_number = mysqli_real_escape_string($conn, $result['phone_number']);
  $phone_number_2 = mysqli_real_escape_string($conn, $result['phone_number_2']);
  $phone_number_3 = mysqli_real_escape_string($conn, $result['phone_number_3']);
  $category = mysqli_real_escape_string($conn, $result['category']);
  $img = mysqli_real_escape_string($conn, $result['img']);
  $sport = mysqli_real_escape_string($conn, $result['sport']);

  $page = $db_type._page;

  $sql2 = "SELECT * FROM center_page WHERE center_id = '{$db_code}' ";
  $result2 = mysqli_query($conn, $sql2);
  $facility = mysqli_real_escape_string($conn, $result2['facility']);
  $weekday = mysqli_real_escape_string($conn, $result2['weekday']);
  $weekend = mysqli_real_escape_string($conn, $result2['weekend']);
  $holiday = mysqli_real_escape_string($conn, $result2['holiday']);
  $information = mysqli_real_escape_string($conn, $result2['information']);

  ?>
 
  <div class="top">
    <a href="menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.html" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  

    <a>
      <img class="search" src="아이콘_소스/공통_아이콘/검색.png" width="5%"/>
    </a>
    
  </div>

  <div class= "coach_img">
    <img src="아이콘_소스/이미지-1.png" width="100%"/>
  </div>

  <div class="coach_intro">
    <p><b>[<?=$category?>] <?=$name?></b></p>
    <div class="coach_name">
      <img src="아이콘_소스/공통_아이콘/찜.png" width="5%"/>
      <p><b>0</b></p>
      <img src="아이콘_소스/주소-아이콘.png" width="5%"/>
      <p><b><?=$address?></b></p>
    </div>
  </div>

  <div class="coach_data">

    <div class="data">
      <img src="아이콘_소스/강사정보-사전예약필수-아이콘.png" width="6%"/>
      <p><b>사전 예약 필수</b></p>
    </div>

    <div class="data">
      <img src="아이콘_소스/강사정보-경력-아이콘.png" width="6%"/>
      <p><b><?=$facility?></b></p>
    </div>

    <div class="data">
      <img src="아이콘_소스/강사정보-시간대-아이콘.png" width="6%"/>
      <p><b><?=$weekday?> / </br> <?=$weekend?> </br> <?=$holiday?></b></p>
    </div>

    <div class="data">
      <img src="아이콘_소스/강사정보-정보-아이콘.png" width="6%"/>
      <p><b> <?=$information?> </b></p>
    </div>

  </div>

  <div class="coach_product">
    <p class="product_word"><b>세모스 ONLY</b></p>
    <div class="semos_only_product">
      <p><b>[세모스 추천] 어린이 수영 일일체험권[48개월 ~</br>13세까지 이용가능]</b></p>
      <p class="required"><b>예약필수</b></p>
    </div>

    <div class="semos_only_product">
      <p><b>[세모스 추천] 성인 수영 1개월 [주 4회 강습] +</br>주 1회 자유 수영</b></p>
      <p class="required"><b>예약필수</b></p>
    </div>

    <div class="semos_only_product">
      <p><b>[세모스 추천] 주 1회 어린이 수영 정규반 6개월 +</br>학습진도표 6회</b></p>
      <p class="required"><b>예약필수</b></p>
    </div>

    <p class="product_word"><b>일반 상품</b></p>
    
    <div class="semos_only_product">
      <p><b>주 1회 어린이 수영 정규반 6개월 +</br>학습진도표 6회</b></p>
      <p class="required"><b>예약필수</b></p>
    </div>

  </div>

  <div class="map">

    <img class="map_img" src="아이콘_소스/지도-이미지.png" width="95%"/>
    <div class="address">
      <img src="아이콘_소스/주소-아이콘.png" />
      <p><b>경기도 용인시 기흥구 덕영대로 1732</b></p>
      <button>주소복사</button>
    </div>

  </div>

  <div class="button_bar">

    <button class="heart">
      <img src="아이콘_소스/빈하트-아이콘.png"/>
    </button>

    <button class="call">
      전화하기
    </button>

    <button class="catting">
      채팅하기
    </button>


  </div>

</body>
</html>
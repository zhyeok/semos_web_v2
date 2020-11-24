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

  $code= $_GET['id'];
  $type= $_GET['type'];

  $sql = "SELECT * FROM $type WHERE id = '{$code}' ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $name = $row['name'];
  $sigungu =  $row['sigungu'];
  $phone_number = $row['phone_number'];
  $phone_number_2 = $row['phone_number_2'];
  $phone_number_3 = $row['phone_number_3'];
  $category = $row['category'];
  $img = $row['img'];
  $sport = $row['sport'];

  $page = $type._page;

  $sql2 = "SELECT * FROM $page WHERE center_id = '{$code}' ";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $facility = $row2['facility'];
  $weekday = $row2['weekday'];
  $weekend = $row2['weekend'];
  $holiday = $row2['holiday'];
  $Information = $row2['Information'];
  $address = $row2['address'];
  $detail_address = $row2['detail_address'];
  ?>
 
  <div class="top">
    <a href="menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.html" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  

  </div>

  <div class= "coach_img">
    <img src="<?=$img?>" width="100%"/>
  </div>

  <div class="coach_intro">
    <p><b>[<?=$category?>] <?=$name?></b></p>
    <div class="coach_name">
      <img src="아이콘_소스/공통_아이콘/찜.png" width="5%"/>
      <p><b>0</b></p>
      <img src="아이콘_소스/주소-아이콘.png" width="5%"/>
      <p><b><?=$sigungu?></b></p>
      
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
      <p><b> <?=$Information?> </b></p>
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

  </div>

  <div class="map">

    <img class="map_img" src="아이콘_소스/지도-이미지.png" width="95%"/>
    <div class="address">
      <img src="아이콘_소스/주소-아이콘.png" />
      <p><b><?=$address?></b></p>
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
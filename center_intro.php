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
  $dbname2 = "service_product";

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

  $slide = 1;
  $img_list = '';
  while($slide < 4) {
    $img_list = $img_list."<div class='mySlides fade'>
    <div class='numbertext'>$slide / 3</div>
    <img src='./아이콘_소스/{$slide}센터선택_이미지.png' style='width:100%'>
    <div class='text'>{$name}</div>
    </div>";
    $slide+=1;
  }

  $dot = 0;
  $dot_list = '';
  while($dot < 3) {
    $dot_list = $dot_list."<span class='dot' onclick='currentSlide({$dot})'></span>";
    $dot+=1;
  }


  $conn5 = mysqli_connect($servername, $username, $password, $dbname2);

  $sql5 = "SELECT * FROM `$name`";
  $result5 = mysqli_query($conn5, $sql5);

  $service = '';
  while($row5 = mysqli_fetch_array($result5)) {
    $service = $service."<div class='semos_only_product'>
    <p class='service'>{$row5['service_product']}</p>
    <p class='service_info'>{$row5['service_info']}</p>
    <p class='reservation'>{$row5['reservation']}</p>
    <p class='price'>{$row5['service_price']} 원</p>
    </div>";
  }
  
  ?>
 
  <div class="top">
    <a href="menu.php">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.php" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  

  </div>

  <div class="slideshow-container">
  
  <?=$img_list?>

    <a class="prev" onclick="moveSlides(-1)">&#10094;</a>
    <a class="next" onclick="moveSlides(1)">&#10095;</a>

  </div>


  <div style="text-align:center">
      <?=$dot_list?>
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
  <p class="semos_only"><b>세모스 ONLY</b></p>
      

      <?=$service?>

  </div>

  <div class="map">

    <div id="map" >

    </div>  
    <img src="아이콘_소스/주소-아이콘.png" width='5%' />
    <p><b><?=$address?></b></p>
  
  </div>

  <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=8cf3192e702491819a9ad90638f3009e&libraries=services,clusterer"></script>
  <script>

    function click(e) {
      
    }

    var slideIndex = 0; //slide index

    // HTML 로드가 끝난 후 동작
    window.onload=function(){
      showSlides(slideIndex);

    }


    // Next/previous controls
    function moveSlides(n) {
      slideIndex = slideIndex + n
      showSlides(slideIndex);
    }

    // Thumbnail image controls
    function currentSlide(n) {
      slideIndex = n;
      showSlides(slideIndex);
    }

    function showSlides(n) {

      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      var size = slides.length;

      if ((n+1) > size) {
        slideIndex = 0; n = 0;
      }else if (n < 0) {
        slideIndex = (size-1);
        n = (size-1);
      }

      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[n].style.display = "block";
      dots[n].className += " active";
    }

    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = {
        center: new kakao.maps.LatLng(37.295572530166375, 127.04564215307609), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };  

    // 지도를 생성합니다    
    var map = new kakao.maps.Map(mapContainer, mapOption); 

    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();

    // 주소로 좌표를 검색합니다
    geocoder.addressSearch('<?=$address?>', function(result, status) {

        // 정상적으로 검색이 완료됐으면 
        if (status === kakao.maps.services.Status.OK) {

            var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

            // 결과값으로 받은 위치를 마커로 표시합니다
            var marker = new kakao.maps.Marker({
                map: map,
                position: coords
            });

            // 인포윈도우로 장소에 대한 설명을 표시합니다
            var infowindow = new kakao.maps.InfoWindow({
                content: '<div style="width:150px;text-align:center;padding:1% 0.5%;"><?=$name?></div>'
            });
            infowindow.open(map, marker);

            // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
            map.setCenter(coords);
        } 
    });  

    
    
  </script>

</body>
</html>
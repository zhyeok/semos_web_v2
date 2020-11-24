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
    <a href=\"{$filtered_type}_intro.php?id={$row['id']}&type=$filtered_type\">[{$row['category']}] </br>{$row['name']}</a></br>
    <p><img class='address' src='./아이콘_소스/주소-아이콘.png' />  {$row['sigungu']}</p>
    <p><img class='jjim' src='./아이콘_소스/공통_아이콘/찜.png' />   100</p>
    </div>";
  }
  
  $link = '';
  while($row2 = mysqli_fetch_array($result2)) {
    $link = $link."<a href=\"center.php?id={$row2['sport']}&type=$filtered_type&sport=$filtered_sport\"><b>{$row2['sport']}</b></a>";
  }

  $select = "<a href=\"center.php?type=center&sport=$filtered_sport\">센터 선택</a>
  <a href=\"center.php?type=coach&sport=$filtered_sport\">강사 선택</a>";
  
  $slide = 1;
  $img_list = '';
  while($slide < 4) {
    $img_list = $img_list."<div class='mySlides fade'>
    <div class='numbertext'>$slide / 3</div>
    <img src='./아이콘_소스/{$slide}센터선택_이미지.png' style='width:100%'>
    <div class='text'>{$filtered_type}</div>
    </div>";
    $slide+=1;
  }

  $dot = 0;
  $dot_list = '';
  while($dot < 3) {
    $dot_list = $dot_list."<span class='dot' onclick='currentSlide({$dot})'></span>";
    $dot+=1;
  }
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


  <div class="category">
    <?=$select?>
  </div>

  <div class="center_category">
    <?=$link?>
  </div>

  <div class="slideshow-container">
  
    <?=$img_list?>

    <a class="prev" onclick="moveSlides(-1)">&#10094;</a>
    <a class="next" onclick="moveSlides(1)">&#10095;</a>

  </div><br/>
  
  
  <div style="text-align:center">
      <?=$dot_list?>
  </div>

  <div class="center_list">

    <div class="center_intro">
      <p><b>총 <?=$count?>개의 세모스 파트너가 있습니다.</b></p>
    </div>
    
  </div>
  
  <div><?=$list?></div>

  
  <script>
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
  </script>

</body>
</html>

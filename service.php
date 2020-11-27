<!DOCTYPE HTML>
<html>
<head>
  <title>semos_center</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="service.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
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

    if(!isset($_SESSION['id']) || !isset($_SESSION['pw'])) {
      echo "<script>alert('로그인이 필요합니다.'); location.replace('index.php');</script>"; 
    } else {
      if($tier === '관리자' || $tier === '세모스' )  {
        echo "<script>alert('환영합니다.');</script>";
      } else {
        echo "<script>alert('잘못된 접근입니다.'); location.replace('index.php');</script>";
      }
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

  
  <form action="./service_register.php?type=center" method="POST">

    <div class="coach_product">
      <p class="product_word"><b>서비스 상품 등록</b></p>
      <p class="semos_only"><b>세모스 ONLY</b></p>
      <div class="semos_only_product">

        <input type="text" maxlength="30" required placeholder="서비스 상품 1" name="service_1"/></br>

        <textarea cols="10" row="5" maxlength="50" name="service_info1" placeholder='서비스 상품 설명' style="resize:none; overflow:auto; width:80%;" required></textarea>

        <select name="reservation_1" required>
          <option selected hidden value="">사용 옵션</option>
          <option value="전화 예약">전화 예약</option>
          <option value="방문 예약">방문 예약</option>
          <option value="상시 가능">상시 가능</option>
        </select>

        <input class="price" id="price" type="text" maxlength="8" required placeholder="가격" style="width: 30%; padding: 0;" name="price_1"/>

      </div>

      <div class="semos_only_product">

      <input type="text" maxlength="30" required placeholder="서비스 상품 2" name="service_2"/></br>

      <textarea cols="10" row="5" maxlength="50" name="service_info2" placeholder='서비스 상품 설명' style="resize:none; overflow:auto; width:80%;" required></textarea></br>
      
      <select name="reservation_2" required>
          <option selected hidden value="">사용 옵션</option>
          <option value="전화 예약">전화 예약</option>
          <option value="방문 예약">방문 예약</option>
          <option value="상시 가능">상시 가능</option>
      </select>

      <input class="price" type="text" maxlength="8" required placeholder="가격" style="width: 30%; padding: 0;"  name="price_2"/>

      </div>

      <div class="semos_only_product">
      
      <input type="text" maxlength="30" required placeholder="서비스 상품 3" name="service_3"/></br>
      
      <textarea cols="10" row="5" maxlength="50" name="service_info3" placeholder='서비스 상품 설명' style="resize:none; overflow:auto; width:80%;" required></textarea></br>
      
      <select name="reservation_3" required>
          <option selected hidden value="">사용 옵션</option>
          <option value="전화 예약">전화 예약</option>
          <option value="방문 예약">방문 예약</option>
          <option value="상시 가능">상시 가능</option>
      </select>

      <input class="price"  type="text" maxlength="8" required placeholder="가격" style="width: 30%; padding: 0;" name="price_3"/>

      </div>

    </div>

    <div class="submit_div" style="margin-top: 5%;">
      <input class="submit" type="submit" value="등록"/>
    </div>

  </form>


  <script>

    $(".price").on({

      keypress: function(e) {
        if(!(e.which >= 48 && e.which <= 57)) {
        e.preventDefault();
        }
      } 
    });

  </script>
</body>
</html>
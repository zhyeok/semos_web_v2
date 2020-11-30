<!DOCTYPE HTML>
<html>
<head>
  <title>semos_center</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="insert.css">
  <script src="lib/jquery/2.2.3/jquery.min.js"></script>
</head>
<body>
  
  <div class="top">
    <a href="menu.php">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.php" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  
    
  </div>


  <div class="center_register">
    <p style="font-size: 5vw; color: #7a7a7a; text-align: center;"><b>세모스 <?=$_GET['id']?> 등록</b></p>
  </div>

  

  <form action="center_register.php?type=<?=$_GET['type']?>" enctype="multipart/form-data" method="POST">

    <div class="name">
      <p><b><?=$_GET['id']?>명</b></p>
      <input type="text" name="name" placeholder="<?=$_GET['id']?> 이름을 적어주세요" required />
    </div>

    <div class="name">
      <p><b><?=$_GET['id']?> ID</b></p>
      <input type="text" name="partner_id" placeholder="<?=$_GET['id']?> 아이디를 적어주세요." required />
    </div>

    <p class="profile_img"><b>프로필</b></p>  
    <div class="container">
      <label class="input-file-button" for="input-file" >
        업로드
      </label>
      
      <input type="file" name="img" id="input-file" accept="image/*" onchange="setThumbnail(event);" /> 
      
      <div id="image_container">
        <img id="preview" src="">
      </div>

      <div class="category">
            <select name="type" required>
              <option selected hidden value="">스포츠 타입</option>
              <option value="워터스포츠">워터스포츠</option>
              <option value="실내스포츠">실내스포츠</option>
              <option value="야외스포츠">야외스포츠</option>
            </select></br>

            <select name="category" required>
              <option selected hidden value="">스포츠 카테고리</option>
              <option value="수영">수영</option>
              <option value="스쿠버다이빙">스쿠버다이빙</option>
              <option value="서핑">서핑</option>
              <option value="수상레저">수상레저</option>
              <option value="카약">카약</option>
            </select>

      </div>
    </div>

    <div class="address">
      <p style="display: inline-block;"><b><?=$_GET['id']?> 주소</b></p></br>
      <div>
        <input type="text" name="address" id="sample6_address" placeholder="주소" readonly/>
        <input type="button" class="search_button" onclick="sample6_execDaumPostcode()" value="주소 검색"  />
        <input type="text" name="detailed_address" id="sample6_detailAddress" placeholder="상세주소" required /></br>
        <input type="text "name="sigungu" id="sample6_sigungu" placeholder="시/군/구" readonly />
        <input type="text" name="postcode" id="sample6_postcode" placeholder="우편번호" readonly/>
      </div>
    </div>

    <div class="tel">
      <p class="tel_p" style="display: inline-block;"><b><?=$_GET['id']?> 전화번호 </b></p></br>
      <select name="phone_number" required>
        <option selected hidden value="">선택</option>
        <option value="010">010</option>
        <option value="011">011</option>
        <option value="02">02</option>
        <option value="031">031</option>
        <option value="032">032</option>
        <option value="033">033</option>
        <option value="041">041</option>
        <option value="042">042</option>
        <option value="043">043</option>
        <option value="044">044</option>
        <option value="051">051</option>
        <option value="052">052</option>
        <option value="053">053</option>
        <option value="054">054</option>
        <option value="055">055</option>
        <option value="061">061</option>
        <option value="062">062</option>
        <option value="063">063</option>
        <option value="064">064</option>    
      </select>
      
      <input type="text" maxlength="4" name="phone_number_2"  required /> <p style="display:inline-block; vertical-align: middle;"><b>-</b></p>
      <input type="text" maxlength="4" name="phone_number_3" required />
    </div>

    
  
      

    <div class="facility">
      <p><b>시설/경력 정보</b></p>
      <textarea name= "facility" cols="10" row="4" maxlength="40" placeholder='예시) 샤워시설, 수건, 락커, 주차장, 매점' style="resize:none; overflow:auto; width:80%;" required></textarea>
    </div>

    <div class="time">
      <p>평일 운영 시간</p>
      <input name= "weekday" type="text" maxlength="30"  placeholder="예시) 월~금 AM 09:00 ~ PM 07:00" required>
      <p>주말 운영 시간</p>
      <input name= "weekend" type="text" maxlength="30" placeholder="예시) 토 AM 09:00 ~ PM 05:00" required>
      <p>휴무일</p>
      <input name= "holiday" type="text" maxlength="30" placeholder="예시) 일요일 휴뮤 / 공휴일 휴무 " required>
    </div>

    <div class="information">
      <p><?=$_GET['id']?> 소개 정보</p>
      <textarea name="information" cols="10" row="5" maxlength="50" placeholder='예시) 세모스는 스쿠버 다이빙을 전문으로 하는 <?=$_GET['id']?>입니다. ' style="resize:none; overflow:auto; width:80%;" required></textarea>
    </div>

    

    <div class="submit_div" style="margin-top: 5%;">
      <input class="submit" type="submit" value="완료"/>
    </div>

 
  </form>

  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    
  <script>
    function setThumbnail() {
      var file = document.querySelector('#input-file');

      file.onchange = function () { 
        var fileList = file.files ;
              
        // 읽기
        var reader = new FileReader();
        reader.readAsDataURL(fileList [0]);

        //로드 한 후
        reader.onload = function  () {
        document.querySelector('#preview').src = reader.result ;
        }; 
      }; 
    }

    function sample6_execDaumPostcode() {
      new daum.Postcode({
        oncomplete: function(data) {
                    
          var addr = ''; 
    
                    
          if (data.userSelectedType === 'R') { 
            addr = data.roadAddress;
          } else { 
            addr = data.jibunAddress;
          }
    
                    
            document.getElementById('sample6_postcode').value = data.zonecode;
            document.getElementById("sample6_address").value = addr;
            document.getElementById("sample6_sigungu").value = data.sigungu;
                    
            document.getElementById("sample6_detailAddress").focus();
          }
      }).open();
    }


    

  </script>

</body>
</html>
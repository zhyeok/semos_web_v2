<!DOCTYPE HTML>
<html>
<head>
  <title>semos_center</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="insert.css">
</head>
<body>
  
  <div class="top">
    <a href="menu.html">        
      <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
    </a>  

    <a href="index.html" class="semos">
      <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
    </a>  
    
  </div>
  
  <div class="center_register">
    <p style="font-size: 5vw; text-align: center;"><b>세모스 <?=$_GET['id']?> 등록</b></p>
    <p><b><?=$_GET['id']?> 정보를 정확히 적어주세요!</b></p>
  </div>

  <form action="index.php?type=<?=$_GET['type']?>" enctype="multipart/form-data" method="POST">
    
    <div>
      <p style="display: inline-block;"><?=$_GET['id']?> 이름 :</p>
      <input type="text" name="name" placeholder="<?=$_GET['id']?> 이름을 적어주세요" required />
    </div>
    
    <div>
      <p style="display: inline-block;"><?=$_GET['id']?> 주소 :</p>
      <input type="text" name="address" placeholder="ex 수원 영통" required />
    </div>

    <div>
      <p style="display: inline-block;"><?=$_GET['id']?> 전화번호 :</p>
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
      
      <input style="width: 40%;" type="text" name="phone_number_2" placeholder="1234-5678" required />
    </div>

    <div>
      <p style="display: inline-block;">스포츠 타입 :</p>
      <select name="type" required>
        <option selected hidden value="">타입</option>
        <option value="워터스포츠">워터스포츠</option>
        <option value="실내스포츠">실내스포츠</option>
        <option value="야외스포츠">야외스포츠</option>
      </select>
    </div>
  
    <div>
      <p style="display: inline-block;">스포츠 카테고리 :</p>
      <select name="category" required>
        <option selected hidden value="">카테고리</option>
        <option value="수영">수영</option>
        <option value="스쿠버다이빙">스쿠버다이빙</option>
        <option value="서핑">서핑</option>
        <option value="수상레저">수상레저</option>
        <option value="카약">카약</option>
      </select>
    </div>
  
    <div>
      <p style="display: inline-block;"><?=$_GET['id']?> 프로필 이미지 :</p>
      <input style="font-size: 3vw;" type="file" name="img">
    </div>

    <div class="submit_div" style="margin-top: 5%;">
      <input class="submit" type="submit" value="완료"/>
    </div>

 
  </form>

</body>
</html>
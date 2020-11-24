<!DOCTYPE html>
<html>

<head>
  <title>semos.kr</title>
  <link rel="stylesheet" href="./register.css">
  <meta charset="utf-8">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js" ></script>
  <script type="text/javascript" src="./ajax.js" ></script>
</head>

<body>
    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "ily153153";
    $dbname = "semos";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    ?>

    <div class="top">

        <a href="menu.html">        
        <img class="side_bar" src="아이콘_소스/공통_아이콘/메뉴.png" width= "5%" />
        </a>  

        <a href="index.html" class="semos">
        <img src="아이콘_소스/공통_아이콘/세상의-모든-스포츠.png" width="30%"/>
        </a> 
       
    </div>

    <section class="enter" id="회원가입">
        <p class="subject"><b>세모스 회원가입</b></p>
        <form method="POST" action="./register_check.php">
            <article>
                <input class="register" id="user_id" type="text" name="user_id" placeholder="ID" required maxlength="15" /></br>
                <label id="none" class="체크 경고">&cross; 유효한 아이디가 아닙니다. </label>
                <label id="none" class="체크 중복">&cross; 이미 사용중인 아이디입니다.</label>
                <label id="yes" class="체크 가능">&check; 사용가능한 아이디입니다.</label>
                <div><p class="caution">소문자 / 숫자 포함 형태의 5~15자리 이내의 아이디</br> 특수문자는 사용할 수 없습니다.</p></div>

                <input class="register" id="password" type="password" name="user_password" placeholder="PASSWORD" maxlength="15" required  /></br>
                <label id="none" class="nopw">&cross; 유효한 패스워드가 아닙니다. </label>
                <div><p class="caution">특수문자 / 소문자 / 숫자 포함 형태의 8~15자리 이내의 패스워드</br> (사용가능 특수 문자 : #,$,%,&,?,@,!)</p></div>

                <input class="register" id="name" type="text" name="user_name" placeholder="이름" required maxlength="10" /></br>
                <label id="none" class="noname">&cross; 유효한 이름이 아닙니다. </label>
                <div><p class="caution">한글 형태의 2~10자리 이내의 이름.</p></div>
                
                <p class="sex">성별</p>
                <label class="sex"><input type="radio"  id="radio" name="sex" value="남" required />남성</label>
                <label class="sex"><input type="radio"  id="radio" name="sex" value="여" required />여성</label></br>

                <div id="mail">
                    <input class="email" id="email" type="text" name="email_1" placeholder="EMAIL" maxlength="15" required />  <p class="mail">@</p>
                    
                    <select name="email_2">
                        <option selected hidden value="">메일주소</option>
                        <option value="naver.com">naver.com</option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="nate.com">nate.com</option>
                        <option value="daum.net">daum.net</option>
                    </select></br>
                    <label id="none" class="noemail" >&cross; 유효한 이메일이 아닙니다. </label>
                    <div><p class="caution">문자 / 숫자 포함 형태의 4~15자리 이내의 이메일.</p></div>
                </div>   
                
                <div class="button">
                    <input class="submit" type="submit" value="회원가입" />
                <div>
                
            </article>

        </form>
        
    </section>

    <script>
 

    $('section#회원가입 input[name=user_id]').on({
        
        keypress: function(e) {
            if(!((e.which >= 97 && e.which <= 122) || (e.which >= 48 && e.which <= 57))) {
                e.preventDefault();
            }
        },
        focusout: function(e) {
            $(e.target).siblings('label.체크').hide(); 
            if(!$(e.target).val()) {
            }  else if($(e.target).val().replace(/[a-z0-9]/g, '') || $(e.target).val().length < 5 ){
                $(e.target).siblings('label.경고').show();
            }  else {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: {mode: 'select', a: $(e.target).val()},
                    url: './id_check.php',
                    success: function (data) {
                        switch(data) {
                            case 'x':
                               $(e.target).siblings('label.중복').show();
                                break;
                            case 'o':
                                $(e.target).siblings('label.가능').show();
                                break;
                        }
                    },
                    error : function(jqXHR, textStatus, errorThrown) {
                        console.log('ID 중복검사 ajax 실패!');
                    }
                });
            }
        }
    });
    
    
    
    $("#password").on({

        keypress: function(e) {
            if(!((e.which >= 97 && e.which <= 122) || (e.which >= 48 && e.which <= 57) || (e.which >= 35 && e.which <= 38) || (e.which >= 63 && e.which <= 64) || (e.which === 33))) {
            e.preventDefault();
            }
        }, 
        
        focusout: function(e) {
            if(!$(e.target).val()) {
                $(e.target).siblings('label.nopw').hide(); 
            }
            else if(!/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/.test($(e.target).val())) {
                $(e.target).siblings('label.nopw').show(); 
            } 
            else if(/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/.test($(e.target).val())) {
                $(e.target).siblings('label.nopw').hide(); 
            } 
        }
    });

    $("#name").on({

        focusout: function(e) {
            if(!$(e.target).val()) {
                $(e.target).siblings('label.noname').hide(); 
            }
            else if(!/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]{2,10}$/.test($(e.target).val())) {
                $(e.target).siblings('label.noname').show(); 
            } 
            else if(/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]{2,10}$/.test($(e.target).val())) {
                $(e.target).siblings('label.noname').hide(); 
            } 
        }
    });

    $("#email").on({

        focusout: function(e) {
            if(!$(e.target).val()) {
                $(e.target).siblings('label.noemail').hide(); 
            }
            else if(!/^[A-Za-z0-9]{4,15}$/.test($(e.target).val())) {
                $(e.target).siblings('label.noemail').show(); 
            } 
            else if(/^[A-Za-z0-9]{4,15}$/.test($(e.target).val())) {
                $(e.target).siblings('label.noemail').hide(); 
            } 
        }
    });
        
    </script>

</body>
</html>
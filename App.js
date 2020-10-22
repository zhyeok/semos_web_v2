import React, { Component} from 'react';
import './App.css';
import "./index.php";


class App extends Component{
  render() {
    return (
      <>
        <div className= "menu"> 
          
            <img className= "menu_img" src={require("./아이콘_소스/공통_아이콘/메뉴.png")} width="5%" />
          
          <img className= "home_img" src={require("./아이콘_소스/공통_아이콘/세상의-모든-스포츠.png")} width="30%" />
        </div>

        <div className= "search_bar">

          <form className= "form" action="index.php" method="post">
            <input type= "text" required className= "word" autoFocus="" placeholder= " 찾으시는 스포츠 센터 / 강사를 검색해주세요"  />
            <a href="./index.php" > 
              <input type="image" className= 'search_icon' src={require("./아이콘_소스/공통_아이콘/검색.png")} width="5%" /> 
            </a>
          </form>
    
        </div>
      
        <div className="slide">
           <img className= "slide_img" src={require("./아이콘_소스/2홈_이미지.png")} width="100%" />
        </div>

         
          <div className= "select">
            
            <div className= "sport">
              <div className= "sport_icon"> 
              <a href="./center.js">
                <img className= "sport_type" src={require("./아이콘_소스/공통_아이콘/워터스포츠(원).png")} width= "100%" />
              </a>
              </div>

              <div className= "sport_word">
                <p>전체 보기</p>
              </div>
            </div>
        

            <div className= "sport">
              <div className= "sport_icon">
                <img className= "sport_type" src={require("./아이콘_소스/공통_아이콘/수영아이콘(원).png")} width="100%" />
              </div>

              <div className= "sport_word">
                <p>수영</p>
              </div>
            </div>

            <div className= "sport">
              <div className= "sport_icon">
                <img className= "sport_type" src={require("./아이콘_소스/공통_아이콘/스킨스쿠버아이콘(원).png")} width="100%" />
              </div>

              <div className= "sport_word">
                <p>스쿠버다이빙</p>
              </div>
            </div>

            <div className= "sport">
              <div className= "sport_icon">
                <img className= "sport_type" src={require("./아이콘_소스/공통_아이콘/서핑아이콘(원).png")} width="100%" />
              </div>

              <div className= "sport_word">
                <p>서핑</p>
              </div>
            </div>

          </div>
      
        <div className= "product">

          <div>
            <div className= "product_word">
              <p><b>최근 본 상품의 연관 상품</b></p>
            </div>
            
            <div className= "product_small_word">
              <p><b>내가 찾는 센터 / 강사를 한눈에!</b></p>
            </div>
          </div>

          <div className= "center">
            <div className= "product_img">
              <img calss= "center_img" src={require("./아이콘_소스/2홈_이미지2.png")} width="95%" /> 
            </div>

            <div className= "center_word">
              <p><b>[수상레저] 가평 너에게 빠지</b></p>
            </div>

            <div className= "intro">
              <img className= "address" src={require("./아이콘_소스/공통_아이콘/위치.png")} width="14%" /> 
              <p><b>경기 가평</b></p>
            </div>

            <div className= "intro">
              <img className= "heart" src={require("./아이콘_소스/공통_아이콘/찜.png")} width="14%" /> 
              <p><b>59</b></p>
            </div>
          </div>

          <div className= "coach">
            <div className= "product_img">
              <img calss= "center_img" src={require("./아이콘_소스/2홈_이미지3.png")} width="95%" /> 
            </div>

            <div className= "coach_word">
              <p><b>[서핑] 변모스 강사</b></p>
            </div>

            <div className= "intro">
              <img className= "address" src={require("./아이콘_소스/공통_아이콘/위치.png")} width="14%" /> 
              <p><b>경기 수원</b></p>
            </div>

            <div className= "intro">
              <img className= "heart" src={require("./아이콘_소스/공통_아이콘/찜.png")} width="14%" /> 
              <p><b>125</b></p>
            </div>
          </div>

        </div>

      </>
    )
  };
};

export default App;

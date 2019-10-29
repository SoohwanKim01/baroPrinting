<?php
require_once('../_path.php');
$current_menu = '소개' ;
require_once(SKIN_DIR . '/main_layout.php');  // 1단 레이아웃 ,main_layout.php 파일 불러온다
?>
    <html>
    <head>
        <title>바로인쇄</title>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--        <script src="colors.js"></script>-->
    </head>
    <body>

    <div class="text-center mb-4">
        <img src="../img/w3c.jpg">
        <br><br>
        <h2>인쇄에 낯선 이들을 위한 간편주문!</h2>
    </div>

    <h1><a href='intro.php'>바로인쇄 소개</a></h1>

    <!-- fetchPage로 이름명에 맞는 파일들을 연결해서 리스트로 나열한다 -->

    <ol>
        <li><a href="#!useintro.html" onclick= "fetchPage('useintro.html')">출력예약 및 주문하기</a></li>
        <li><a href="#!worktime.html" onclick= "fetchPage('worktime.html')">영업시간</a></li>
        <li><a href="#!bank.html" onclick= "fetchPage('bank.html')">현금결제 안내</a></li>
    </ol>

    <article></article> <!-- 텍스트가 들어갈 공간 -->
    <script>

        // then:응답을 다받았다면 그다음 행동으로 article 공간에 맞는 파일들을 글자로 넣어준다
     function fetchPage(name){
        fetch(name).then(function(response){
            response.text().then(function(text){
                document.querySelector('article').innerHTML = text;
            })
        });
     }

     //#!앞에 기호들을 제거한다
     if(location.hash){

         fetchPage(location.hash.substr(2));

     } else{

     }
    </script>

    </body>
    </html>

<?php
require_once('../google.html');  //google.html:구글 지도를 불러온다
?>

<?php
require_once(SKIN_DIR .'/footer.php');  //footer.php:파일 끝부분 불러온다
?>
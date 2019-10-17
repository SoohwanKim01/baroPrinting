<?php
include_once('./_path.php'); //path.php 파일을 불러온다
$current_menu = '바로인쇄' ;
require_once(SKIN_DIR .'/layout1.php');  // 1단 레이아웃 layout1.php 파일을 불러온다
?>
    <!---- index.php : 홈페이지 메인첫화면 보여주는 파일 ---->

<!---- 본문내용 시작 이 페이지에서는 사진 만 보여준다 ---->


<!-- Carousel:사진 회전형으로 보여주는 방식  그림이 일정시간 지나면 스스로 움직이도록 :JS이용 -->
<div id="demo" class="carousel slide m-3" data-ride="carousel">
  <!-- Indicators:사진이 몇번째인지 보여주는 위치 , 그림 하단의 페이지 부분 -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> 
  <!-- The slideshow :그림을 차례대로 보여주는 부분-->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/firstimage.jpg" alt="첫번째그림" class="w-100 h-100">
    </div>
    <div class="carousel-item">
      <img src="img/secondimage.jpg" alt="두번째그림" class="w-100 h-100">
    </div>
    <div class="carousel-item">
      <img src="img/thirdimage.jpg" alt="세번째그림" class="w-100 h-100">
    </div>
  </div>
  <!-- Left and right controls:사진 왼쪽 오른쪽 이동하는 버튼 ,화살표 모양 버튼  -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Carousel -->

<!---- 본문내용 끝 ----------------------------------->
<?php
require_once(SKIN_DIR . '/footer.php');  // footer.php 를 불러온다
?>
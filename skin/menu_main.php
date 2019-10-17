
<!-- 이 파일은 상단 메뉴를 담당하는 부분 -->

<!-- skin/menu_main.php 시작 -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark px-3">
  <a class="navbar-brand" href="<?php echo ROOT_PATH.'index.php' ;?>">바로인쇄</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" data-target="#navbars" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbars">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($current_menu =='홈피소개') {echo ' active';}?>">
        <a class="nav-link" href="<?php echo MENU_PATH.'/intro.php';?>">소개</a>
      </li>
      <li class="nav-item <?php if($current_menu =='게시판') {echo ' active';}?>">
        <a class="nav-link" href="<?php echo MENU_PATH.'/notice.php';?>">게시판</a>
      </li>
    </ul>
            <ul class="navbar-nav ml-md-auto">
                <!-- 상단 우측 로그인 링크 출력 -->
                <?php
                if (isset($_SESSION['uno'])) {
                    if ($_SESSION['level']==10) {
                        echo '<li class="nav-item"><a class="nav-link" href="' .USER_PATH. '/admin.php">관리자</a></li>' ;
                        echo '<li class="nav-item"><a class="nav-link" href="' .USER_PATH. '/logout.php">로그아웃</a></li>' ;
                    } else {
                        echo '<li class="nav-item"><a class="nav-link" href="' .USER_PATH. '/index.php">정보변경</a></li>' ;
                        echo '<li class="nav-item"><a class="nav-link" href="' .USER_PATH. '/logout.php">로그아웃</a></li>' ;
                    }
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="' .USER_PATH. '/login.php">로그인</a></li>' ;
                }
                ?>

           </ul>
  </div>
</nav>
<!-- skin/menu_main.php 끝 -->

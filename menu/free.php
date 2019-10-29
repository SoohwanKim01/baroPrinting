<?php
require_once('../_path.php');
$current_menu = '게시판'; // 메인메뉴
$side_contents = require_once(SKIN_DIR . '/menu_sub.php'); //사이드 내용에 menu_sub.php 파일을 불러온다
require_once(SKIN_DIR . '/sub_layout.php');  // 2단 레이아웃 sub_layout.php:파일을 불러온다
?>

    <!---- free.php:게시판에서 간편주문을 보여주는 파일------>

    <h3 class="text-center">간편 주문</h3>
    <hr>
<?php
$catno = 2; // 간편주문 분류번호
$results_per_page = 5 ;  // 페이지당 출력수
require_once(YOGI_DIR . '/bbs.php');  // 게시판삽입
?>

<?php
require_once(SKIN_DIR . '/footer.php'); //footer.php 파일을 불러온다
?>
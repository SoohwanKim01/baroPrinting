<?php
require_once('../_path.php');
$current_menu = '게시판'; // 메인메뉴
$side_contents = require_once(SKIN_DIR . '/menu_sub.php'); //사이드 내용에 menu_sub.php 파일을 불러온다
require_once(SKIN_DIR . '/layout2.php');  // 2단 레이아웃 layout2.php:파일을 불러온다
?>

    <!---- free.php:게시판에서 자유게시판을 보여주는 파일------>

    <div class="text-center">
        <h3>간편주문</h3>
        <?php
        $catno = 2; // 자유게시판 분류번호
        require_once(YOGI_DIR . '/bbs.php');  // 게시판삽입
        ?>


    </div>

<?php
require_once(SKIN_DIR . '/footer.php'); //footer.php 파일을 불러온다
?>
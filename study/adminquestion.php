<?php
require_once('../_path.php');
if (isset($_SESSION['uno'])) {  // 로그인 상태면
    $level   = $_SESSION['level'];
    if ($level == 2) {
        $current_menu = '관리자' ;
    } else {
        $current_menu = '정보변경' ;
    }

} else { // 로그인이 안되었으면
    $current_menu = '로그인' ;
}


/*echo $_REQUEST['nickname'] . '님의 상담내용은 ' . $_REQUEST['questioncontent'] . '이군요!';


if (nickname != null && questioncontent != null) {
    localStorage.setItem("nickname", nickname);
    localStorage.setItem("questioncontent", questioncontent);
}*/

$side_contents = require_once(SKIN_DIR . '/menu_sub.php');
require_once(SKIN_DIR . '/sub_layout.php');
require_once(YOGI_DIR . '/admin.question.php');
require_once(SKIN_DIR . '/footer.php');
?>

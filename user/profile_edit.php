<?php
require_once('../_path.php');

if (isset($_SESSION['uno'])) {
    $current_menu = '정보변경' ;
} else {
    $current_menu = '로그인' ;
}    
$side_contents = require_once(SKIN_DIR .'/menu_sub.php') ; // side는 부메뉴로 

require_once(SKIN_DIR .'/layout2.php'); // 2단 레이아웃 사용 시작
require_once(YOGI_DIR .'/user.edit.php'); // 회원정보 수정 
require_once(SKIN_DIR .'/footer.php');  // 레이아웃 닫기

?>

<?php
ob_start(); //세션 공백이나 문자 무시해줌
require_once('../_path.php');
if (isset($_SESSION['uno'])) {
    $current_menu = '정보변경' ;
} else {
    $current_menu = '로그인' ;
}    
$side_contents = require_once(SKIN_DIR .'/menu_sub.php') ; // side는 부메뉴로 

require_once(SKIN_DIR . '/sub_layout.php'); // 2단 레이아웃 사용 시작
require_once(YOGI_DIR .'/user.edit.php'); // 회원정보 수정
require_once(SKIN_DIR .'/footer.php');  // 레이아웃 닫기
?>

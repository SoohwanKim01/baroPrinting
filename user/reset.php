<?php
require_once('../_path.php');
if (isset($_SESSION['uno'])) {
    // 이미 로그인 상태면 
    $current_menu = '정보변경' ;
} else {
    // 로그인이 안되었으면 
    $current_menu = '로그인' ;
}    
$side_contents = require_once(SKIN_DIR .'/menu_sub.php') ;
require_once(SKIN_DIR . '/sub_layout.php');
// 본문 자리는 비워둔다.
require_once(SKIN_DIR .'/footer.php'); 
?>

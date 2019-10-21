<?php
require_once('../_path.php');
if (isset($_SESSION['uno'])) {  // 로그인 상태면 
    $level   = $_SESSION['level'];
    if ($level == 10) {
        $current_menu = '관리자' ;
    } else {
        $current_menu = '정보변경' ;
    }        
} else { // 로그인이 안되었으면
    $current_menu = '로그인' ;
}    
$side_contents = require_once(SKIN_DIR .'/menu_sub.php') ;
require_once(SKIN_DIR .'/layout2.php');
require_once(SKIN_DIR .'/footer.php'); 
?>

<?php
require_once('../_path.php');
if (!isset($_SESSION['uno']) OR $_SESSION['level'] <> 2) {  // 관리자 레벨이 아니면 되돌아 간다.
    echo '<script>history.back()</script>' ;
    exit ;
}

$current_menu = '관리자' ;
$side_contents = require_once(SKIN_DIR . '/menu_sub.php');
require_once(SKIN_DIR . '/sub_layout.php');
require_once(USER_DIR . '/adm_menu1.php');
require_once(SKIN_DIR . '/footer.php');
?>

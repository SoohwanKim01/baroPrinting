<?php

require_once('../_path.php');

if (!isset($_SESSION['uno']) OR $_SESSION['level'] <> 2) {  // 관리자 레벨이 아니면 되돌아 간다.

    echo '<script>history.back()</script>' ; //주소창에 users.adm.php로 바로 들어온경우 자바스크립트 이전페이지로 돌아가게 한다

    exit ; //나가게 한다

}

$current_menu = '관리자' ;

require_once(SKIN_DIR .'/menu_sub.php') ;

require_once(SKIN_DIR . '/sub_layout.php');

require_once(ADMIN_DIR .'/users.sub.php'); // 사용자관리 삽입

require_once(SKIN_DIR .'/footer.php');

?>
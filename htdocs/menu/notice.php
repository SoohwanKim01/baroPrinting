<?php
require_once('../_path.php');
$current_menu = '게시판' ; // 메인메뉴
require_once(SKIN_DIR .'/menu_sub.php') ;
require_once(SKIN_DIR .'/layout2.php');  // 2단 레이아웃
?>
<div class="text-center">
  <h3>공지사항</h3>
  <?php
    $catno = 1; // 공지사항 게시판분류 번호 
    require_once(YOGI_DIR . '/bbs.php');  // 게시판삽입
  ?>
</div>

<?php
require_once(SKIN_DIR .'/footer.php');
?>
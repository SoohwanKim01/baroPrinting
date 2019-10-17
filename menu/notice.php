<?php
require_once('../_path.php'); //_path.php 경로파일 불러온다
$current_menu = '게시판' ; // 메인메뉴
require_once(SKIN_DIR .'/menu_sub.php') ;//menu_sub.php 파일 불러온다
require_once(SKIN_DIR .'/layout2.php');  // 2단 레이아웃
?>

<!------notice.php:게시판에서 공지사항 눌렀을 때 보이는 페이지   ---->


<div class="text-center">
  <h3>공지사항</h3>
  <?php
    $catno = 1; // 공지사항 게시판분류 번호 
    require_once(YOGI_DIR . '/bbs.php');  // 게시판추가삽입
  ?>
</div>

<?php
require_once(SKIN_DIR .'/footer.php');
?>
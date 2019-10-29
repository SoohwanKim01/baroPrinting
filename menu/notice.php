<?php
require_once('../_path.php'); //_path.php 경로파일 불러온다
$current_menu = '게시판' ; // 메인메뉴
require_once(SKIN_DIR .'/menu_sub.php') ;//menu_sub.php 파일 불러온다
require_once(SKIN_DIR . '/sub_layout.php');  // 2단 레이아웃
?>

<!------notice.php:게시판에서 공지사항 눌렀을 때 보이는 페이지   ---->


    <h3 class="text-center">공지사항</h3>
    <hr>
<?php
$catno = 1; // 공지사항 게시판분류 번호
$results_per_page = 5 ;  // 페이지당 게시글 출력수
require_once(YOGI_DIR . '/bbs.php');  // 게시판삽입
?>

<?php
require_once(SKIN_DIR .'/footer.php');
?>
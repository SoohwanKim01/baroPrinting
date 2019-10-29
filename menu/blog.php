<?php
require_once('../_path.php');
$current_menu = '블로그';
require_once(SKIN_DIR . '/main_layout.php');  // 1단 레이아웃 ,main_layout.php 파일 불러온다
ini_set("allow_url_fopen", 1);
include_once('simple_html_dom.php');

$data = file_get_html("http://www.kipes.com/kr/board/board_list.asp?board_name=kipT&board_skin=bbs");

$a = $data->find("table");

echo $a;
foreach ($a as $b){
    echo $b;
    echo "<br>";
}

require_once(SKIN_DIR . '/footer.php');  //footer.php:파일 끝부분 불러온다
?>

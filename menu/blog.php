<?php
require_once('../_path.php');
$current_menu = '블로그';
require_once(SKIN_DIR . '/layout1.php');  // 1단 레이아웃 ,layout1.php 파일 불러온다
ini_set("allow_url_fopen", 1);
include_once(SIMPLE_DIR . '/simple_html_dom.php');

$data = file_get_html("http://printallday.com/blog/?v=38dd815e66db");

$a = $data->find("ul");
echo $a;
foreach ($a as $b){
    echo $b;
    echo "<br>";
}

require_once(SKIN_DIR . '/footer.php');  //footer.php:파일 끝부분 불러온다
?>

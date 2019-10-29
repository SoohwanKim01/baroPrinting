<?php
require_once('../_path.php');
$current_menu = '채팅하기' ;
require_once(SKIN_DIR . '/main_layout.php');  // 1단 레이아웃 ,main_layout.php 파일 불러온다
require_once('./tlk.io.chatting.html'); //tlk이용한 채팅
require_once('./tawk.chatting.html'); //tawk 이용한 채팅
require_once('./ajax.chatting.html'); //ajax 이용한 채팅

require_once(SKIN_DIR .'/footer.php');  //footer.php:파일 끝부분 불러온다
?>

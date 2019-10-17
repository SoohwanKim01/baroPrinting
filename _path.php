<?php
    /*이 파일은 설치 경로의 위치를 정하는 파일 */
    //define('상수명','값'); 을 정해주면 상수는 한번 값을 정해주면 그 값을 그대로 가지고 있는다


    //데이터베이스 접속 정보들.

    define('DB_HOST', '192.168.0.153'); //데이터베이스 접속 아이피
    define('DB_USER', 'dbuser'); //데이터베이스 접속을 위한 아이디
    define('DB_PASS', 'root'); //데이터베이스 접속을 위한 비밀번호
    define('DB_NAME', 'bbs'); //데이터베이스 이름



    //html에서 사용하는 링크폴더 들의 위치

    define('ROOT_PATH', '/');  //루트 경로
    define('CSS_PATH' , '/css'); //css폴더 경로
    define('SKIN_PATH', '/skin'); //skin폴더 경로
    define('USER_PATH', '/user'); //user폴더 경로
    define('MENU_PATH', '/menu'); //menu폴더 경로


    //require,include에 사용하는 절대경로

    $root = $_SERVER['DOCUMENT_ROOT'] ; //전역변수 $
    define('ROOT_DIR' , $root); //루트 디렉토리 경로
    define('YOGI_DIR' , $root . '/yogi'); //yogi 폴더 경로
    define('SKIN_DIR' , $root . '/skin'); //skin 폴더 경로
    define('USER_DIR' , $root . '/user'); //user 폴더 경로


    //웹보드 버전
    define('YOGI', 'y1');

    //세션 시작 안했으면 세션시작
    if(!isset($_SESSION)) { 
        session_start(); 
    }
?>

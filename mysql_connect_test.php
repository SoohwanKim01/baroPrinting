<?php
    $host = '192.168.0.153';
    $user = 'dbuser';
    $pw = 'root';
    $dbName = 'bbs';
    $mysqli = new mysqli($host, $user, $pw, $dbName);
 
    if($mysqli){
        echo "MySQL 접속 성공";
    }else{
        echo "MySQL 접속 실패";
    }
?>

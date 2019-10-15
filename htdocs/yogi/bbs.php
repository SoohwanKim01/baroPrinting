<?php
if (!isset($_GET['mode'])) {
    require(YOGI_DIR . '/bbs.list.php'); // get 인자 없이 들어오면 리스트 
} else {
    switch ($_GET['mode']) {
    case 'add'  ; require(YOGI_DIR . '/bbs.add.php') ; break;
    case 'edit' ; require(YOGI_DIR . '/bbs.edit.php'); break;
    case 'view' ; require(YOGI_DIR . '/bbs.view.php'); break;
    case 'delete' ;
        $bno = $_GET['bno'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러! - bbs.php');
        $query = "DELETE FROM yg_bbs WHERE bno = $bno LIMIT 1" ;
        mysqli_query($dbc, $query) or die('자료삭제 실패!'); 
        echo $_SERVER['PHP_SELF'] ;
        echo("<script>alert('삭제 되었습니다.');</script>");
        echo('<script>location=" '. $_SERVER['PHP_SELF'] .' ";</script>');
        break ;
    }
}   
?>

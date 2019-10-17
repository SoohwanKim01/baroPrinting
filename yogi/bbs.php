<?php
//mode 값이 안왔다면
if (!isset($_GET['mode'])) {
    require(YOGI_DIR . '/bbs.list.php'); // get 인자 없이 들어오면 리스트 :bbs.list 목록을 불러온다
} else {
    switch ($_GET['mode']) {
    case 'add'  ; require(YOGI_DIR . '/bbs.add.php') ; break; //추가를 하면 bbs.add로
    case 'edit' ; require(YOGI_DIR . '/bbs.edit.php'); break; //수정을 하면 bbs.edit으로
    case 'view' ; require(YOGI_DIR . '/bbs.view.php'); break; //조회를 하면 bbs.view 로
    case 'delete' ; //삭제를 하면 
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

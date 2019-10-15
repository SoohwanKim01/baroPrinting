<!---- yogi/bbs.add.php -------->
<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
if (isset($_POST['submit'])) {
    if (empty($_POST['subject'])) { // 제목이 없으면..
        echo("<script>alert('제목을 입력하세요.!!');</script>");
    } else {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(' DB접속 에러!');
        mysqli_query($dbc, "SET NAMES UTF8");
        $subject = mysqli_real_escape_string($dbc, trim($_POST['subject']));
        $content = mysqli_real_escape_string($dbc, trim($_POST['content']));
        if(isset($_SESSION['uno'])) {
            $uno   = $_SESSION['uno'];
            $uname = $_SESSION['uname'];
        } else {
            $uno = 0;
            $uname = '손님';
        }
        $query = "INSERT INTO yg_bbs (catno, datetime, subject, content, uno, writer)
                VALUES ($catno, now(), '$subject', '$content', $uno, '$uname')";
        mysqli_query($dbc, $query) or die ('자료추가 실패!');
        mysqli_close($dbc);
        echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
        exit();
    }
}
$mode = 'add';
require_once(YOGI_DIR . '/bbs.form.php'); // 게시판 입력폼 삽입
?>

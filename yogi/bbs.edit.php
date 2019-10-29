<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러');
mysqli_query($dbc, "SET NAMES UTF8");

//-- (1) 수정화면에서[저장] 눌러서 들어온 것이면
if (isset($_POST['submit'])) {
    $subject = mysqli_real_escape_string($dbc, trim($_POST['subject']));
    $content = mysqli_real_escape_string($dbc, trim($_POST['content']));

    if (empty($subject)) {
        // 제목이 없으면 다시 입력하도록 한다
        echo("<script>alert('제목을 입력하세요.!');</script>");
        $output_form = 'yes';
    }
    else {
        // 제목이 있으면 저장하고 바로 나간다
        $query = "UPDATE yg_bbs SET subject='$subject', content='$content' WHERE bno=".$_GET['bno'];
        mysqli_query($dbc, $query) or die ('자료수정 실패');
        mysqli_close($dbc);
        echo '<script>location="'. $_SERVER['PHP_SELF'].'?'.$pre_url.'"</script> '; // 들어왔던 페이지지로 이동
        exit();
    }
}
//-- (2) 게시글 리스트에서 클릭해서 들어 온 것이면..
else {
    $query = "SELECT * FROM yg_bbs WHERE bno=" . $_GET['bno'] ;
    $result = mysqli_query($dbc, $query) or die('No Data') ;
    $row = mysqli_fetch_array($result);
    $subject = $row['subject'];
    $content = $row['content'];
    $uno = $row['uno'];
    mysqli_close($dbc);
    // 작성자본인글 or 관리자가 아니면 그냥 나간다
    if (!isset($_SESSION['uno']) OR !($uno == $_SESSION['uno'] OR $_SESSION['level'] == 2)) {
        echo '잘못된 접근입니다.';
        exit();
    }
    $output_form = 'yes';
}

// 위에서 $output_form = 'yes' 이면 입력폼을 출력
if ($output_form == 'yes') {
    $edit_mode = true ; // 수정
    $mode = '?mode=edit&bno='.$_GET['bno'].'&'.$pre_url ;
    require_once(YOGI_DIR . '/bbs.form.php'); // 게시판 입력폼 삽입
}
?>

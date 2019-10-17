<?php
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러');
mysqli_query($dbc, "SET NAMES UTF8");

//-- (1) 수정화면에서[저장] 눌러서 들어온 것이면..
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
        echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
        exit();
    }
}
//-- (2) 테이블리스트에서 클릭해서 들어 온 것이면..
else {
    $query = "SELECT * FROM yg_bbs WHERE bno=" . $_GET['bno'] ;
    $result = mysqli_query($dbc, $query) or die('No Data') ;
    while ($row = mysqli_fetch_array($result)) {
      $subject  = $row['subject'];
      $content = $row['content'];
    }
    mysqli_close($dbc);
    $output_form = 'yes';
}

// 위에서 $output_form = 'yes' 이면 입력폼을 출력
if ($output_form == 'yes') {
    $mode = 'edit&bno='.$_GET['bno'] ;
    echo '<h4>자료수정</h4>';
    require_once(YOGI_DIR . '/bbs.form.php'); // 게시판 입력폼 삽입
}
?>

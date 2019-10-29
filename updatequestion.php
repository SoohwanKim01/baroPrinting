<?php
include_once('./_path.php'); //path.php 파일을 불러온다
$current_menu = '바로인쇄';
require_once(SKIN_DIR . '/main_layout.php');  // 1단 레이아웃 main_layout.php 파일을 불러온다
?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    </head>
    <body>
    <?php
    //입력한 값을 나타낸다
    echo $_REQUEST['nickname'] . '님의 상담내용은 ' . $_REQUEST['questioncontent'] . '이군요!';
    ?>

    <!--닉네임과 내용을 수정한다-->
    <form method="POST" action="" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="PUT">
        <br>
        닉네임 <input type="text" name="nickname"/>
        <br>
        상담내용 <input type="text" name="questioncontent"/>
        <br> <input type="submit" value="수정">

    </form>

    <!--DELETE로 입력받은 값을 삭제한다-->
    <form method="POST" action="" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" value="삭제">
    </form>


    <!--완료를 누르면 홈화면으로이동-->
    <form action="index.html" method="POST">
        <input type="submit" value="완료"/>

    </form>


    </body>

    </html>
<?php
/*if (isset($_POST['submit'])) { //설정확인
    if (empty($_POST['nickname'])) { // 제목이 없으면
        echo("<script>alert('닉네임입력하세요.!!');</script>");
    } else {

        $quserid = mysqli_real_escape_string($dbc, trim($_POST['nickname'])); //제목 추가
        $qcontent = mysqli_real_escape_string($dbc, trim($_POST['content'])); //내용 추가
        localStorage.setItem('nickname', 'nickname');
        localStorage.setItem('questioncontent', 'questioncontent');
    }
}*/




?>
<?php
require_once(SKIN_DIR . '/footer.php');  // footer.php 를 불러온다
?>
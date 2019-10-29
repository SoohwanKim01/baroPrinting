<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
if (!isset($_GET['bno'])) {
    echo '<script>alert("잘못된 글번호 입니다!"); </script>';
    echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
    exit;
}

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러!');
mysqli_query($dbc, "SET NAMES UTF8");
$bno = $_GET['bno'];
$query = "SELECT * FROM yg_bbs WHERE bno = $bno" ;
$result = mysqli_query($dbc, $query) or die('DB 쿼리에러-bbs.view.php');
$row = mysqli_fetch_array($result) ;
$uno = $row['uno'];

// [제목]과 [내용] 출력
echo "  <h6 class='text-left font-weight-bold'>" . $row['subject'] . "</h6>\n";
echo "    <div class='border bbs_view'>\n";
echo nl2br($row['content']) ;
echo "\n    </div>\n";

echo '    <div class="text-center">'."\n";
// [목록으로] 버튼 출력 (브라우저 뒤로가기로 작동)
echo '      <button onclick="history.back()">목록으로</button>';
// [수정][삭제]버튼 출력 (작성자 본인 또는 관리자만 버튼 출력)
if (isset($_SESSION['uno'])) {
    if ($uno == $_SESSION['uno'] OR $_SESSION['level'] == 10) {
        echo '      <a href="' .$_SERVER['PHP_SELF'].'?mode=edit&bno='.$bno.'&'.$pre_url. '"><button>수정</button></a>' ."\n";
        echo '      <a href="' .$_SERVER['PHP_SELF'].'?mode=delete&bno='.$bno.'&'.$pre_url. '"' .' onclick="'."return confirm('삭제하시겠습니까?')".'"><button>삭제</button></a>'."\n";
    }
}
echo '   </div>';

// 조회수를 1 증가 시킨다
$hit = $row['hit'] + 1 ;
$query = "UPDATE yg_bbs SET hit='$hit' WHERE bno = $bno" ;
$result = mysqli_query($dbc, $query) or die('DB 조회수 변경에러');
mysqli_close($dbc);
?>
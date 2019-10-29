<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
if (!isset($_GET['bno'])) { 
    echo '<script>alert("잘못된 글번호 입니다!"); </script>'; 
    echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
    exit; 
}
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러! - bbs.delete');
//---- 삭제 전에 본인이 쓴글 맞는지 or 관리자인지 다시 한번 체크 
$bno = $_GET['bno'];
$query = "SELECT bno, uno FROM yg_bbs WHERE bno = $bno LIMIT 1" ;
$result = mysqli_query($dbc, $query) or die('게시글 없음 - bbs.delelete') ;
$row = mysqli_fetch_array($result);
$uno = $row['uno'];
if (!isset($_SESSION['uno']) OR !($uno == $_SESSION['uno'] OR $_SESSION['level'] == 2)) {
   echo '잘못된 접근입니다.';
   mysqli_close($dbc);
   exit();
}
//---- 자료삭제  
$query = "DELETE FROM yg_bbs WHERE bno = $bno LIMIT 1" ;
$result = mysqli_query($dbc, $query) or die('쿼리에러 - bbs.delete');
echo("<script>alert('삭제 되었습니다.');</script>");
echo '<script>location="'. $_SERVER['PHP_SELF'].'?'.$pre_url.'"</script> '; // 들어왔던 페이지지로 이동 
mysqli_close($dbc);
?>

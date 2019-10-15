<?php
if (!isset($_GET['bno'])) { 
    echo '<script>alert("잘못된 글번호 입니다!"); </script>'; 
    echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
    exit; 
}

$bno = $_GET['bno'];
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러!');
mysqli_query($dbc, "SET NAMES UTF8");
$query = "SELECT * FROM yg_bbs WHERE bno=" . $bno ;
$result = mysqli_query($dbc, $query) or die('DB 쿼리에러');
$row = mysqli_fetch_array($result) ;
echo '<h3>' . $row['subject'] . '</h3><br>'; // 제목출력
echo nl2br($row['content']) . '<br><br>' ;  // 내용출력 

// 조회수를 1 증가 시킨다
$hit = $row['hit'] + 1 ;
$query = "UPDATE yg_bbs SET hit='$hit' WHERE bno=". $bno ;
$result = mysqli_query($dbc, $query) or die('DB 조회수 변경에러');
mysqli_close($dbc);
?>

<a href="<?php echo $_SERVER['PHP_SELF'].'?mode=edit&bno='.$bno ; ?>"><button>수정</button></a>  
<a href="<?php echo $_SERVER['PHP_SELF']?>"><button>목록으로</button></a>  
<a href="<?php echo $_SERVER['PHP_SELF'].'?mode=delete&bno='.$bno ; ?>" onclick="return confirm('삭제하시겠습니까?')"><button>삭제</button></a>


<!---- 요기 로그인 시작(yogi/user.login.php) -------->
<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
// 에러메시지 초기화
$error_msg = "";
// 로그인상태가 아니면 로그인 시도
if (!isset($_SESSION['uno'])) {
    if (isset($_POST['submit'])) {
        // DB 접속
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('db접속에러');

        // POST로 넘어온 값을 정리해서 변수에 대입
        $uid  = mysqli_real_escape_string($dbc, trim($_POST['uid']));
        $pass = mysqli_real_escape_string($dbc, trim($_POST['pass']));
        if (!empty($uid) && !empty($pass)) {
            // 입력한 아이디/비번과 맞는 자료가 있는지 검색
            $query = "SELECT uno, uid, uname, level FROM yg_user WHERE uid = '$uid' AND pass = SHA('$pass')";
            $data = mysqli_query($dbc, $query) or die('로그인 아이디 검색에러::19');
            if (mysqli_num_rows($data) == 1) {
                // 검색결과가 1개이면 세션변수에 넣고 메인화면으로 이동
                $row = mysqli_fetch_array($data);
                $_SESSION['uno'] = $row['uno'];
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['level'] = $row['level'];
                echo '<script>location=" ' . ROOT_PATH.'index.html'. ' ";</script>';
            }
            else {
                // 넘어온 아이디/비번이 틀리면
                $error_msg = '아이디/비번을 다시 점검해 보세요.';
            }
        }
        else {
            // 아이디/비번을 입력하지 않았으면
            $error_msg = '아이디/비번을 입력하세요.';
        }
    }
}

// 세션변수가 없으면 다시 로그인폼을 출력
if (empty($_SESSION['uno'])) {
    echo '    <p class="error">' . $error_msg . '</p>';
    require_once(SKIN_DIR . '/user_login.php') ; //로그인 폼 출력 
}
else {
    // 로그인이 되었으면 
    echo('    <p class="login">로그인 되었습니다. ' . $_SESSION['uname'] . ' 님</p>');
}
?>
<!---- 요기 로그인 끝(yogi/user.login.php) -------->

<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
// 세션변수가 없으면 쿠키변수로 대체한다.
if (!isset($_SESSION['uno'])) {
    if (isset($_COOKIE['uno']) && isset($_COOKIE['uid'])) {
        $_SESSION['uno'] = $_COOKIE['uno'];
        $_SESSION['uid'] = $_COOKIE['uid'];
        $_SESSION['uname'] = $_COOKIE['uname'];
        $_SESSION['level'] = $_COOKIE['level'];
    }
}

// 로그인 여부 확인
if (!isset($_SESSION['uno'])) {
    echo '<p>로그인을 먼저 하세요.</p>';
    exit();
}

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (isset($_POST['submit'])) {
    $pass0 = mysqli_real_escape_string($dbc, trim($_POST['pass0'])); // 원래 비번
    $pass1 = mysqli_real_escape_string($dbc, trim($_POST['pass1'])); // 새 비번
    $pass2 = mysqli_real_escape_string($dbc, trim($_POST['pass2'])); // 새 비번확인

    //-- 변경 비번 확인하고 저장
    if (!empty($pass0) && !empty($pass2) && ($pass1 == $pass2)) {
        $query = "SELECT pass FROM yg_user WHERE uno =" .$_SESSION['uno'] .
            " AND pass = SHA('$pass0') LIMIT 1 ;" ;
        $data = mysqli_query($dbc, $query) or die('쿼리에러 user.pw.change.29');
        if (mysqli_num_rows($data) == 1) {
            $query = "UPDATE yg_user SET pass = SHA('$pass2') WHERE uno = " . $_SESSION['uno'];
            mysqli_query($dbc, $query) or die('DB 에러 user.pw.change.32');
            echo '<p>변경되었습니다.</p>';
            mysqli_close($dbc);
            exit();
        }
        echo '<p class="text-danger">변경전 비밀번호가 맞지 않습니다.</p>';
        exit() ;
    } else {
        echo '<p class="text-danger">비밀번호 항목을 모두 채우세요.</p>';
    }
} // End of check for form submission
mysqli_close($dbc);
require_once(SKIN_DIR . '/user_pw_change.php') ;
?>


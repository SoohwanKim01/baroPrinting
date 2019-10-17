<?php
// 세션변수에 로그인 정보가 없으면, 그냥 나간다.
if (!isset($_SESSION['uno'])) {
    echo '<p>로그인이 필요한 서비스입니다.</p>';
    exit();
}

//==== 사용자정보 변경에서 [확인] 눌렀으면 (skin/user_edit.php의 Form 에서 왔으면..)
if (isset($_POST['submit2'])) {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $uid   = mysqli_real_escape_string($dbc, trim($_POST['uid']));
    $uname = mysqli_real_escape_string($dbc, trim($_POST['uname']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

    // 변경된 사용자정보 저장 
    if (!empty($uname)) {
        $query = "UPDATE yg_user SET uname = '$uname', email = '$email' WHERE uno =" .$_SESSION['uno'];
        mysqli_query($dbc, $query) or die('사용자정보 변경실패 - user.edit-19');
        echo '<p>변경되었습니다.</p>';
        mysqli_close($dbc);
        $_SESSION['uname'] = $uname; // 세션,쿠키의 사용자명도 변경 
        setcookie('uname', $row['uname'], time() + (60 * 60 * 24 * 1));
        exit();
    } else {
        echo '<p class="error">회원명 을 입력하세요.</p>';
        mysqli_close($dbc);
        require_once(SKIN_DIR . '/user_edit.php') ; // 사용자 정보변경 form 출력 
        exit();
    }
//==== 비밀번호 검사 통과하면 (skin/user_pw_check.php의 Form 에서 왔으면..)
} elseif (isset($_POST['submit1'])){
    $pass  = $_POST['pass'] ;
    $uno   = $_SESSION['uno'] ;
    $dbc   = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $query = "SELECT uno, uid, uname, level FROM yg_user WHERE uno = '$uno' AND pass = SHA('$pass')";
    $result= mysqli_query($dbc, $query) or die('DB 쿼리에러 user.edit.php-37');
    // 비밀번호가 틀리면 다시 비밀번호 검사 화면 출력 
    if (mysqli_num_rows($result)==0) {
        echo '<p>비밀번호가 틀립니다.</p>';
        mysqli_close($dbc);
        require_once(SKIN_DIR .'/user_pw_check.php') ; // Password 검사 입력폼
        exit();
    }
    // 비밀번호가 맞으면 사용자 정보변경 창 (skin/user_edit.php) 출력 
    $query = "SELECT uid, uname, email FROM yg_user WHERE uno = " . $_SESSION['uno'];
    $data = mysqli_query($dbc, $query) or die('DB에러 - user.edit.php-47');
    $row  = mysqli_fetch_array($data);
    if ($row != NULL) {
        $uid   = $row['uid'];
        $uname = $row['uname'];
        $email = $row['email'];
    } else {
        echo '<p class="error">회원정보에 접근할 수 없습니다.</p>';
        exit();
    }
    require_once(SKIN_DIR . '/user_edit.php') ; // 사용자 정보변경 form
    exit();
//==== 처음 들어 올 때는 비밀번호 검사창 출력 
} else {
    require_once(SKIN_DIR .'/user_pw_check.php') ; // Password 검사 입력폼
}

<!---- yogi/user.signup.php 시작 -------->
<?php
if (isset($_POST['submit'])) {  //- [회원가입신청] 버튼을 클릭해 들어 왔으면 
    // DB 접속
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러');
    // POST로 넘어온 인자내용 보안검사
    $uid   = mysqli_real_escape_string($dbc, trim($_POST['uid']));
    $uname = mysqli_real_escape_string($dbc, trim($_POST['uname']));
    $pass1 = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
    $pass2 = mysqli_real_escape_string($dbc, trim($_POST['pass2']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));

    if (!empty($uid) &&!empty($uname) && !empty($pass1) && !empty($pass2) && ($pass1 == $pass2)) {
        // 이미 등록된 아이디 인지 검사위해 아이디 검색
        $query = "SELECT * FROM yg_user WHERE uid = '$uid'";
        $data  = mysqli_query($dbc, $query);
        if (mysqli_num_rows($data) == 0) {
          // 쿼리결과 = 0 이면 중복 아이디가 아니므로 DB에 추가
          $query = "INSERT INTO yg_user (uid, uname, pass, date, email, level) 
                    VALUES ('$uid','$uname', SHA('$pass1'), NOW(), '$email',1)";
          mysqli_query($dbc, $query) or die('DB 신규회원추가 에러');

          // 축하 메시지 주고 나간다.
          echo '<p>회원가입을 축하합니다. 가입한 아이디로 <a href="login.php">[로그인]</a> 하세요.</p>';
          mysqli_close($dbc);
          exit();
        }
        else {
          // 이미 등록된 동일 아이디가 있으면..
          echo '<p class="error">이미 사용중인 아이디 입니다. 다른 아이디를 사용하세요.</p>';
          $uid = "";
        }
    }
    else {
        echo '<p class="error">아이디,비번중에서 빠진 것이 있는것 같습니다. 체크해 보세요.</p>';
    }
}
// 아이디 중복이나 빠진 내용이 있으면 다시 가입폼을 보여준다.
require_once(SKIN_DIR . '/user_signup.php') ;
?>
<!---- yogi/user.signup.php 끝 -------->
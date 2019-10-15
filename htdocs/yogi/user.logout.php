<?php
  // 로그인 상태면 세션변수를 삭제한다 
  if (isset($_SESSION['uno'])) {
    // 세션 변수 클리어 
    $_SESSION = array();

    // 쿠키변수가 있으면 삭제를 위해 쿠키 만기일을 1시간(3600) 전으로 세팅한다.
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }
    // 세션을 삭제
    session_destroy();
  }
  // 쿠키의 아이디,회원명 삭제 1시간 전으로 세팅 
  setcookie('uno'  , '', time() - 3600);
  setcookie('uid'  , '', time() - 3600);
  setcookie('uname', '', time() - 3600);
  setcookie('level', '', time() - 3600);

?>

<?php
  require_once('../_path.php');
  // 로그인 상태면 세션변수를 삭제한다 
  if (isset($_SESSION['uno'])) {
    $_SESSION = array();  // 세션 변수 클리어 
    session_destroy();    // 세션을 삭제
  }
  echo '<script>location=" ' . ROOT_PATH . ' ";</script>';  // 루트로 이동 
?>

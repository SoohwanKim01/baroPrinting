<?php
switch ($current_menu) {
//홈 메뉴

//바로인쇄를 선택한경우
case '바로인쇄' ;
$sub1 = '' ;
$side = '' ;
break;

//게시판 메뉴를 선택한경우
case '게시판' ;
$sub1 = MENU_PATH. '/notice.php' ;
$sub2 = MENU_PATH. '/free.php' ;
$side = <<<EOL


<!---- 서브메뉴 : 게시판안에서 공지사항과 자유게시판 목록 -------->
		<div class="list-group">
		  <div class="list-group-item text-center text-white bg-secondary">게 시 판</div>
		  <a href="$sub1" class="list-group-item list-group-item-action">공지사항</a>
		  <a href="$sub2" class="list-group-item list-group-item-action">간편주문</a>
		</div>
EOL;
break;
//EOL전까지 내용만 저장

//로그인 메뉴을 선택한 경우
case '로그인' ;
$sub1 = USER_PATH . '/login.php' ;
$sub2 = USER_PATH . '/signup.php' ;
$side = <<<EOL

<!------서브메뉴: 로그인 선택하면 로그인 회원가입 목록  ----------->
		<div class="list-group">
		  <div class="list-group-item text-center text-white bg-secondary">로 그 인</div>
		  <a href="$sub1" class="list-group-item list-group-item-action">로그인</a>
		  <a href="$sub2" class="list-group-item list-group-item-action">회원가입</a>
		</div>

EOL;
break;

//정보변경 메뉴를 선택한 경우
case '정보변경' ;
$sub1 = USER_PATH . '/profile_edit.php';
$sub2 = USER_PATH . '/pw_change.php';
$side = <<<EOL
<!---- 사이드메뉴 :정보변경 선택하면 회원정보변경 비밀번호변경 목록 ------->
		<div class="list-group">
		  <div class="list-group-item text-center text-white bg-secondary">정보변경</div>
		  <a href="$sub1" class="list-group-item list-group-item-action">회원정보변경</a>
		  <a href="$sub2" class="list-group-item list-group-item-action">비밀번호변경</a>
		</div>

EOL;
break;

//관리자 메뉴
case '관리자' ;
$sub1 = ADMIN_PATH .'/users.adm.php';

$side = <<<EOL
<!---- 사이드메뉴 (skin/menu_sub.php) -------->
		<div class="list-group">
		  <div class="list-group-item text-center text-white bg-secondary">관리자메뉴</div>
		  <a href="$sub1" class="list-group-item list-group-item-action">가입회원정보</a>

		</div>

EOL;
break;
//값이 잘못되었을때
default ;
$side = '$current_menu 변수값을 지정하고 require_once()를 호출 하세요.' ;
} // End switch

return $side ;
?>
<!---- 사이드메뉴 종료(skin/menu_sub.php) -------->

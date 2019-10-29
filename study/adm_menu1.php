<!---- adm_menu1.php 시작 ---->
<?php
if (!defined('YOGI') OR ($_SESSION['level'] <> 2)) exit ; // 개별 페이지, 관리자외 접근 불가

$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;           // 현재 페이지번호
$search   = isset($_GET['search']) ? $_GET['search'] : null ;   // 검색어 
$pre_url  = empty($search) ? 'page='.$cur_page : 'page='.$cur_page.'&search='.$search ; // 현재 페이지와 검색어 url 기억 

$mode = isset($_GET['mode']) ? $_GET['mode'] : null ;
switch ($mode) {
  //***** 보기 *****************************************************************************************************
  case 'view' : 
    if (!isset($_GET['uno'])) { 
        echo '<script>alert("잘못된 회원번호 입니다!"); </script>'; 
        echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
        exit; 
    }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러!');
    mysqli_query($dbc, "SET NAMES UTF8");
    $uno = $_GET['uno'];
    $query = "SELECT * FROM yg_user WHERE uno = $uno" ;
    $result = mysqli_query($dbc, $query) or die('DB 쿼리에러');
    $row = mysqli_fetch_array($result) ;
    $uno = $row['uno'];
?>
    <h1 class="h3 mb-3 font-weight-normal text-center my-3">회원정보</h1>
    <table class="table table-sm table-bordered">
    <tbody>
        <tr><th class="bg-light text-right pr-3">번호</th><td class="pl-3"><?php echo $row['uno'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">가입일</th><td class="pl-3"><?php echo $row['date'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">아이디</th><td class="pl-3"><?php echo $row['uid'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">이 름</th><td class="pl-3"><?php echo $row['uname'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">이메일</th><td class="pl-3"><?php echo $row['email'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">등급</th><td class="pl-3"><?php echo $row['level'];?></td></tr>
        <tr><th class="bg-light text-right pr-3">메모</th><td class="pl-3"><?php echo $row['note'];?></td></tr>
    </tbody>
    </table>
    <div class="text-center">
        <button onclick="history.back()">목록으로</button>
<?php    
    echo '      <a href="' .$_SERVER['PHP_SELF'].'?mode=edit&uno='.$uno.'&'.$pre_url. '"><button>수정</button></a>' ."\n";
    echo '      <a href="' .$_SERVER['PHP_SELF'].'?mode=delete&uno='.$uno.'&'.$pre_url. '"' .' onclick="'."return confirm('삭제하시겠습니까?  이 회원의 게시글은 삭제 안합니다.')".'"><button>삭제</button></a>'."\n";
    echo '   </div>';
    break ;
  
  //***** 수정 *****************************************************************************************************
  case 'edit' :

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러');
    mysqli_query($dbc, "SET NAMES UTF8");

    //-- (1) 수정화면에서[저장] 눌러서 들어온 것이면..
    if (isset($_POST['submit'])) {
        $uno   = mysqli_real_escape_string($dbc, trim($_POST['uno']));
        $date  = mysqli_real_escape_string($dbc, trim($_POST['date']));
        $uid   = mysqli_real_escape_string($dbc, trim($_POST['uid']));
        $uname = mysqli_real_escape_string($dbc, trim($_POST['uname']));
        $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
        $level = mysqli_real_escape_string($dbc, trim($_POST['level']));
        $note  = mysqli_real_escape_string($dbc, trim($_POST['note']));
        $pass  = mysqli_real_escape_string($dbc, trim($_POST['pass']));


        // 아이디를 변경한 경우, 변경한 아이디가 사용중인지 검사 
        $query = "SELECT uno, uid FROM yg_user WHERE uid = '$uid' AND uno <> '$uno'" ; // 이 회원 이외에 변경할 아이디가 있는지 SELECT
        $result = mysqli_query($dbc, $query) or die('DB 쿼리에러2');
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) > 0) {
            echo("<script>alert('변경할 아이디는 이미 다른 회원이 사용중입니다. 다른 아이디를 입력하세요!');</script>");
            $output_form = 'yes';
        }
        if (empty($uid) OR empty($uname)) {
            // 제목이 없으면 다시 입력하도록 한다
            echo("<script>alert('아이디, 이름을 입력하세요.!');</script>");
            $output_form = 'yes';
        }
        if ($output_form <> 'yes') {
            // 저장하고 나간다
            $query = "UPDATE yg_user SET uid='$uid', uname='$uname', email='$email', level='$level', note='$note' WHERE uno=$uno LIMIT 1";
            mysqli_query($dbc, $query) or die ('자료수정 실패1');
            // 비밀번호가 있으면 비번만 별도로 다시 변경한다.
            if (!empty($pass)) {
                $query = "UPDATE yg_user SET pass=SHA('$pass') WHERE uno=".$_GET['uno']. ' LIMIT 1';
                mysqli_query($dbc, $query) or die ('비밀번호 변경 실패');
            }
            mysqli_close($dbc);
            echo '<script>location="'. $_SERVER['PHP_SELF'].'?'.$pre_url.'"</script> '; // 들어왔던 페이지지로 이동 
            exit();
        }
    }
    //-- (2) 게시글 리스트에서 클릭해서 들어 온 것이면..
    else {
        if (!isset($_GET['uno'])) { 
            echo '<script>alert("잘못된 회원번호 입니다!"); </script>'; 
            echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
            exit; 
        }
        $uno = $_GET['uno'];
        $query = "SELECT * FROM yg_user WHERE uno=$uno" ;
        $result = mysqli_query($dbc, $query) or die('No Data') ;
        $row = mysqli_fetch_array($result);
        $uno = $row['uno'];
        $date = $row['date'];
        $uid = $row['uid'];
        $uname = $row['uname'];
        $email = $row['email'];
        $level = $row['level'];
        $note = $row['note'];
        mysqli_close($dbc);
        $output_form = 'yes';
    }

    // 위에서 $output_form = 'yes' 이면 입력폼을 출력
    if ($output_form == 'yes') {
        $mode = '?mode=edit&uno='.$_GET['uno'].'&'.$pre_url ;
        //회원정보 수정폼 삽입
?>        
    <form class="needs-validation mx-auto" style="max-width: 600px" method='post' action="<?php echo $_SERVER['PHP_SELF'] . $mode ; ?>">
      <h1 class="h3 mb-3 font-weight-normal text-center my-3">회원정보 수정</h1>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">회원No</label>
        <div class="col-sm-4">
            <input type="text" name="uno" class="form-control" <?php echo "value='$uno'"; ?> readonly>
        </div>
        <label class="col-sm-2 col-form-label">가입일</label>
        <div class="col-sm-4">
            <input type="date" name="date" class="form-control" <?php echo "value='$date'"; ?> readonly >
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">아이디</label>
        <div class="col-sm-10">
          <input type="text" name="uid" class="form-control" <?php echo "value='$uid'"; ?>>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">이름</label>
        <div class="col-sm-10">
          <input type="text" name="uname" class="form-control" <?php echo "value='$uname'"; ?> autocomplete=off autofocus >
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">이메일</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control" <?php echo "value='$email'"; ?>>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">비밀번호</label>
        <div class="col-sm-4">
          <input type="password" name="pass" class="form-control" >
        </div>
        <div class="col-sm-6 text-muted">(비밀번호 변경시에만 새비번 입력)</div>
      </div>
      
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">등급</label>
        <div class="col-sm-2">
          <input type="number"  min="0" max="10" name="level" class="form-control" <?php echo "value='$level'"; ?>>
        </div>
        <div class="col-sm-8 text-muted">(0.탈퇴자 1~9.회원등급  10.관리자)</div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">메모</label>
        <div class="col-sm-10">
          <input type="text" name="note" class="form-control" <?php echo "value='$note'"; ?>>
        </div>
      </div>

      <div class="text-center mt-3">
          <input class="btn btn-secondary" type="submit" name="submit" value="저 장">
          <input class="btn btn-warning" type="button" value="취 소" onclick="history.back()">
      </div>
    </form>
        
<?php        
    }  // if ($output_form == 'yes') {
    break ;
  
  
  //***** 삭제 *****************************************************************************************************
  case 'delete' :
  
    if (!isset($_GET['uno'])) { 
        echo '<script>alert("잘못된 회원번호 입니다!"); </script>'; 
        echo '<script>location=" '. $_SERVER['PHP_SELF'] .' "</script> ';
        exit; 
    }
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러! - admin_menu1.');
    //---- 회원삭제  
    $query = "DELETE FROM yg_user WHERE uno = $uno LIMIT 1" ;
    $result = mysqli_query($dbc, $query) or die('회원삭제에러 - admin_menu1 ');
    echo("<script>alert('삭제 되었습니다.');</script>");
    echo '<script>location="'. $_SERVER['PHP_SELF'].'?'.$pre_url.'"</script> '; // 들어왔던 페이지지로 이동 
    break;

  //***** 회원리스트 *****************************************************************************************************
  default :
?>  
    <h1 class="h3 mb-3 font-weight-normal text-center my-3">가입회원 정보</h1>
    <div class="float-right small mb-2">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="input-group" title="아이디,이름,이메일,메모 검색">
            <input type="text" class="form-control form-control-sm" id="search" name="search" value="<?php echo $search ?>"/>
            <div class="input-group-append">
              <input class="text-secondary" type="submit" name="submit" value="검색" />
            </div>
          </div>
        </form>
    </div>

    <table class="table table-sm border-bottom text-center">
    <thead class="thead-light">
    <tr><th width=60px>번호</th><th width=100px>가입일</th><th width=100px>아이디</th><th  width=100px>이름</th><th width=60px>등급</th><th>메모</th></tr>
    </thead>
    <tbody>
<?php
    if (empty($results_per_page)) {$results_per_page = 10;} // 페이지당 출력수 지정안하면 기본값 10줄로..
    $skip = (($cur_page - 1) * $results_per_page);

    //---- DB접속
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러 in bbs.list.php');
    mysqli_query($dbc, "SET NAMES UTF8");

    //---- 검색결과와 총 갯수, 페이지수 계산
    $query = "SELECT * FROM yg_user WHERE uid LIKE '%$search%' OR  uname LIKE '%$search%' OR  email LIKE '%$search%' OR  note LIKE '%$search%'"  ;
    $result = mysqli_query($dbc, $query);
    $total  = mysqli_num_rows($result);
    $num_pages = ceil($total / $results_per_page);

    //---- 현재 페이지의 내용만 가져 오는 쿼리
    $query  = $query . "  ORDER BY uno DESC LIMIT $skip, $results_per_page";
    $result = mysqli_query($dbc, $query) or die('Query에러 in bbs.list.php');
    if (mysqli_num_rows($result) == 0) $num_pages += 1;  // 마지막 페이지에 1개 있던 글을 지우면 전체페이지+1 해서 빈페이지를 보여줌
    while ($row = mysqli_fetch_array($result)) {
        echo '    <tr>';
        echo ' <td>' . $row['uno'] . '</td>';
        echo ' <td>' . substr($row['date'],2,8) . '</td>';
        echo ' <td class="text-left"><a href="'.$_SERVER['PHP_SELF'].'?mode=view&uno='.$row['uno'].'&'.$pre_url.'">'.$row['uid'].'</a></td>';
        echo ' <td>' . $row['uname'] . '</td>';
        echo ' <td>' . $row['level'] . '</td>';
        echo ' <td class="text-left">'.$row['note'].'</td>';
        echo '</tr>' . "\n";
    }
    echo "  <tbody>\n";
    echo "</table>\n";
    
    //---- 하단에 페이지 링크 생성
    if ($num_pages > 1) {
        echo "  <div class='float-left small'>\n";
        echo generate_page_links($cur_page, $num_pages, $search);
        echo "  </div>";
    }
    mysqli_close($dbc);

  } // End of switch 

//==============================================================
// 테이블 하단의 페이지 링크, 현재페이지 표시 부분 생성 함수
//==============================================================
function generate_page_links($cur_page, $num_pages, $search) {
    $page_links = "  <nav>\n  <ul class='pagination justify-content-left'>\n";
    // 현재 페이지가 1페이지가 아닐때, [이전] 버튼링크 생성
    if ($cur_page > 1) {
        if (empty($search)) {  // 검색어가 없으면
            $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' .$_SERVER['PHP_SELF']. '?page=' .($cur_page - 1).'">이전</a></li>'."\n";
        } else {                    // 검색어가 있으면 
            $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' .$_SERVER['PHP_SELF']. '?page=' .($cur_page - 1).'&search=' .$search.'">이전</a></li>'."\n";
        }
    } else {
        $page_links .= '    <li class="page-item"><a class="page-link text-secondary">이전</a></li>'."\n";
    }

    // 페이지 번호와 링크 생성
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= '    <li class="page-item"><a class="page-link bg-secondary text-white">' .$i.'</a></li>'."\n";
        } else {
            if (empty($search)) {
                $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page='.$i. '">' .$i. '</a></li>'."\n";
            } else {
                $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page='.$i.'&search=' .$search.'">'.$i.'</a></li>'."\n";
            }
        }
    }

    // 현재 페이지가 마지막 페이지가 아닐때, [다음] 링크버튼 생성
    if ($cur_page < $num_pages) {
        if (empty($search)) {
            $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page=' .($cur_page + 1). '">다음</a></li>'."\n";
        } else {
            $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page=' .($cur_page + 1). '&search=' .$search.'">다음</a></li>'."\n";
        }
        $page_links .= "  </ul>\n  </nav>\n";
    } else {
        $page_links .= '    <li class="page-item"><a class="page-link text-secondary">다음</a></li>'."\n";
        $page_links .= "  </ul>\n  </nav>\n";
    }
    return $page_links;
}
?>
<!---- adm_menu1.php 끝 ---->

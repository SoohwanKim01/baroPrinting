<!---- 게시판리스트(yogi/bbs.list.php) 시작 -------->
<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
if (isset($_SESSION['uno'])) {  //회원등급이 1 이상인 경우에만 [추가]버튼 보이게 로그인되었을때만 게시글 입력 가능
    if ($_SESSION['level'] > 0) {
        echo '  <div class="text-right mb-2">'."\n";
        echo '    <a class="btn btn-sm btn-primary" href="'.$_SERVER['PHP_SELF'].'?mode=add&'.$pre_url.'">추가</a>'."\n";
        echo '  </div>'."\n";
    }   }
?>
<table class="table table-sm border-bottom text-center">
    <thead class="thead-light">
    <tr><th width=60px>번호</th><th width=100px>날  짜</th><th>제 목</th><th width=15%>글쓴이</th><th width=60px>조회</th></tr>
    </thead>
    <tbody>
    <?php
    if (empty($results_per_page)) {$results_per_page = 10;} // 페이지당 출력수 지정안하면 기본값 10줄로
    $skip = (($cur_page - 1) * $results_per_page);

    //---- DB접속
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('DB 접속에러 in bbs.list.php');
    mysqli_query($dbc, "SET NAMES UTF8");

    //---- 검색결과와 총 갯수, 페이지수 계산
    if (empty($search)) {
        $query = "SELECT * FROM yg_bbs WHERE catno=$catno" ;
    } else {
        $query = "SELECT * FROM yg_bbs WHERE catno=$catno AND (subject LIKE '%$search%' OR content LIKE '%$search%')" ;
    }
    $result = mysqli_query($dbc, $query) OR die('검색 쿼리 에러 - bbs.list.php');
    $total  = mysqli_num_rows($result);
    $num_pages = ceil($total / $results_per_page);

    //---- 현재 페이지의 내용만 가져 오는 쿼리
    $query  = $query . "  ORDER BY bno DESC LIMIT $skip, $results_per_page";
    $result = mysqli_query($dbc, $query) or die('Query에러 in bbs.list.php');
    if (mysqli_num_rows($result) == 0) $num_pages += 1;  // 마지막 페이지에 1개 있던 글을 지우면 전체페이지+1 해서 빈페이지를 보여줌
    while ($row = mysqli_fetch_array($result)) {
        echo '    <tr>';
        echo ' <td>' . $row['bno'] . '</td>';
        echo ' <td>' . substr($row['datetime'],2,8) . '</td>';
        echo ' <td class="text-left bbslink"><a href="'.$_SERVER['PHP_SELF'].'?mode=view&bno='.$row['bno'].'&'.$pre_url.'">'.$row['subject'].'</a></td>';
        echo ' <td>' . $row['writer'] . '</td>';
        echo ' <td>' . $row['hit'] . '</td>';
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
    ?>
    <div class="float-right small">
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" id="search" name="search" value="<?php echo $search ?>"/>
                <div class="input-group-append">
                    <input class="text-secondary" type="submit" name="submit" value="검색" />
                </div>
            </div>
        </form>
    </div>

    <?php
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
    <!---- 게시판리스트(yogi/bbs.list.php) 끝 -------->

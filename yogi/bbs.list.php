<!---- 게시판리스트(yogi/bbs.list.php) 시작 -------->
<div class="text-right mb-2"><!-- [추가]버튼 -->
    <a class="btn btn-sm btn-primary" href="<?php echo $_SERVER['PHP_SELF'];?>?mode=add">추가</a>
</div>
<table class="table table-sm border-bottom text-center">
  <thead class="thead-light">
  <tr><th>번호</th><th>날짜</th><th>제 목</th><th>글쓴이</th><th>조회수</th></tr>
  </thead>
  <tbody>
<?php
    // 페이지변수가 오면 저장하고, 페이지당 출력 라인수
    $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $results_per_page = 5 ;  // 페이지당 출력수
    $skip = (($cur_page - 1) * $results_per_page);

    // DB접속
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die(' DB 접속에러 in bbs.list.php');
    mysqli_query($dbc, "SET NAMES UTF8");

    // 검색결과와 총 갯수, 페이지수 계산
    $query  = "SELECT * FROM yg_bbs WHERE catno='$catno'" ;
    $result = mysqli_query($dbc, $query);
    $total  = mysqli_num_rows($result);
    $num_pages = ceil($total / $results_per_page);

    // 현재 페이지의 내용만 가져 오는 쿼리
    $query  = $query . "  ORDER BY bno DESC LIMIT $skip, $results_per_page";
    $result = mysqli_query($dbc, $query) or die('Query Error');
    while ($row = mysqli_fetch_array($result)) {
        echo '  <tr>';
        echo ' <td>' . $row['bno'] . '</td>';
        echo ' <td>' . substr($row['datetime'],2,8) . '</td>';
        echo ' <td class="text-left"><a href="'.$_SERVER['PHP_SELF'].'?mode=view&bno='.$row['bno'].'">'.$row['subject'].'</a></td>';
        echo ' <td>' . $row['writer'] . '</td>';
        echo ' <td>' . $row['hit'] . '</td>';
        echo '  </tr>' . "\n";
    }
    echo "  <tbody>\n";
    echo "</table>\n";
    // 하단에 페이지 링크 생성
    if ($num_pages > 1) {
        echo "<div class='text-center'>\n";
        echo generate_page_links($cur_page, $num_pages);
        echo "</div>\n";
    }
    mysqli_close($dbc);

//==============================================================
// 테이블 하단의 페이지 링크, 현재페이지 표시 부분 생성 함수
//==============================================================
function generate_page_links($cur_page, $num_pages) {
    $page_links = "  <nav>\n  <ul class='pagination justify-content-center'>\n";
    // 현재 페이지가 1페이지가 아닐때, [이전] 버튼링크 생성
    if ($cur_page > 1) {
        $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' .$_SERVER['PHP_SELF']. '?page=' .($cur_page - 1).'">이전</a></li>'."\n";
    } else {
        $page_links .= '    <li class="page-item"><a  class="page-link text-secondary">이전</a></li>'."\n";
    }

    // 페이지 번호와 링크 생성
    for ($i = 1; $i <= $num_pages; $i++) {
        if ($cur_page == $i) {
            $page_links .= '    <li class="page-item"><a class="page-link bg-primary text-white">' .$i.'</a></li>'."\n";
        } else {
            $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page=' .$i. '">' .$i. '</a></li>'."\n";
        }
    }

    // 현재 페이지가 마지막 페이지가 아닐때, [다음] 링크버튼 생성
    if ($cur_page < $num_pages) {
        $page_links .= '    <li class="page-item"><a class="page-link text-secondary" href="' . $_SERVER['PHP_SELF'] . '?page=' .($cur_page + 1). '">다음</a></li>'."\n";
        $page_links .= "  </ul>\n  </nav>\n";
    } else {
        $page_links .= '    <li class="page-item"><a class="page-link text-secondary">다음</a></li>'."\n";
        $page_links .= "  </ul>\n  </nav>\n";
    }
    return $page_links;
}
?>
<!---- 게시판리스트(yogi/bbs.list.php) 끝 -------->

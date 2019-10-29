<?php
if (!defined('YOGI')) exit ;
/*개별 페이지 접근 불가 : bbs.php는 데이터베이스파일이므로 주소창에 localhost/bbs.php 입력해도 페이지가 연결이 안되도록 해야한다
따라서 첫화면 index.php에서 정상적으로 들어왔는지 확인후 맞지 않다면 못들어오게 한다*/

/*
아래 5개 (list,add,edit,view,delete) php 파일을 호출할 당시의 page번호,검색어를 $pre_url 변수에 저장해 둔다
추가,수정,보기,삭제등의 화면에서 [취소]나 [목록]으로 전 리스트로 이동할때 페이지와 검색어를 유지해야 하기 때문이다.
 예를들어 3페이지에서 게시글을 수정하고 저장하고 목록으로 왔을 때 1페이지로 이동하는 것을 방지
 예를들어 검색을 한 상태에서 게시글을 보고 목록으로 왔을 때 검색이 풀린 상태로 보이는 것을 방지
 */



echo $pre_url . '<br>' ;
$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;           // 현재 페이지번호 :게시글이 많을 경우 기억하기위해서
//주소줄에 GET변수 'page' 가 있으면 $cur_page 변수에 해당 값을 넣고, 없으면 $cur_page 에 1 을 넣어라

$search   = isset($_GET['search']) ? $_GET['search'] : null ;   // 검색어: 현재의 검색어를 기억하기 위해서
//주소줄에 GET변수 'search' 가 있으면 $search 변수에 그값을 넣고, 없으면 $search 변수에 null (없음)을 넣어라


$pre_url  = empty($search) ? 'page='.$cur_page : 'page='.$cur_page.'&search='.$search ; // 현재 페이지와 검색어 url 기억
//$search 변수가 비었으면 $pre_url 변수에 'page='.$cur_page 값을(즉 페이지만 넣고), 있으면 $pre_url 변수에 검색어까지 넣어라

/*삼항연산자(Conditional Ternary Operator):간단한 if 문을 한줄로 표시하기 위해 종종 사용되는 방법
예)   (조건) ? 참값 : 거짓값     ->if(조건) {참값}else {거짓값}   */


if (!isset($_GET['mode'])) {
    require(YOGI_DIR . '/bbs.list.php'); // get[mode] 인자 없이 들어오면 리스트
} else {
    switch ($_GET['mode']) {
        case 'add'  : require(YOGI_DIR . '/bbs.add.php') ; break; //mode 인자가 add 일때 bbs.add.php
        case 'edit' : require(YOGI_DIR . '/bbs.edit.php'); break; //mode 인자가 edit 일때 bbs.edit.php
        case 'view' : require(YOGI_DIR . '/bbs.view.php'); break; //mode 인자가 view 일때 bbs.view.php
        case 'delete' : require(YOGI_DIR . '/bbs.delete.php'); break; //mode 인자가 delete 일때 bbs.delete.php
    }
}
?>
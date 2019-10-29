<?php

$time = date("ymd_His");

if ($_FILES['uploadFile']['name']) {
    if (!$_FILES['uploadFile']['error']) {
        $filename = $_FILES['uploadFile']['name'];
        //업로드 경로 + 파일명 (파일명 중복되지 말라고 날짜시간 붙여줌)
        $destination = $_SERVER['DOCUMENT_ROOT'] . '/img/editor/' . $time . '_' . $filename;
        $location = $_FILES['uploadFile']['tmp_name']; 
        move_uploaded_file($location, $destination); // 임시폴더에 있던 파일을 이동함
        //썸머노트에 이미지 경로와 파일명을 에디터에 알려줌.
        echo '/img/editor/' . $time . '_' . $filename;
    } else {
        echo $message = '파일 업로드 에러 :  ' . $_FILES['uploadFile']['error'];
    }
}


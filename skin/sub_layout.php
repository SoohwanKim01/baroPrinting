<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>바로인쇄</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH . '/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo EDITOR_PATH . '/summernote-bs4.css' ?>">
    <link rel="stylesheet" href="<?php echo CSS_PATH . '/style.css' ?>">
    <script src="<?php echo JS_PATH . '/jquery-3.3.1.min.js' ?>"></script>
    <script src="<?php echo EDITOR_PATH . '/summernote-bs4.min.js' ?>"></script>
    <script src="<?php echo EDITOR_PATH . '/lang/summernote-ko-KR.js' ?>"></script>
</head>
<body class="d-flex flex-column vh-100">
<!------------ 2단 레이아웃 시작 (skin/layout2.php) --------------->


<!-- 2단 레이아웃 부트스트랩 비율3:9로 맞추기 위해서--------->


<?php require_once('menu_main.php'); ?>
<div class="container">
    <div class="row">
        <!--- 사이드바 들어가는 자리 (skin/layout2.php) ---->
        <div class="col-md-3 order-md-1 mb-4">
            <?php echo $side; ?>

        </div> <!-- col-md-3 -->
        <!--- 본문 들어가는 자리 (skin/layout2.php) ---->
        <div class="col-md-9 order-md-2">

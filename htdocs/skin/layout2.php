<!doctype html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>바로인쇄</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo CSS_PATH . '/style.css'?>"/>
</head>
<body class="d-flex flex-column vh-100">
<!------------ 2단 레이아웃 시작 (skin/layout2.php) --------------->
<?php require_once('menu_main.php'); ?>
<div class="container vh-100">
<div class="row">
  <!--- 사이드바 들어가는 자리 (skin/layout2.php) ---->
  <div class="col-md-3 order-md-1 mb-4">
    <?php echo $side; ?>

  </div> <!-- col-md-3 -->
  <!--- 본문 들어가는 자리 (skin/layout2.php) ---->
  <div class="col-md-9 order-md-2">


<?php
  // 캡차 계산용 상수들 
  define('CAPTCHA_CHARS', 5);     // 캡차용 단어 문자갯수
  define('CAPTCHA_WIDTH', 100);   // 이미지 가로사이즈
  define('CAPTCHA_HEIGHT', 25);   // 이미지 세로사이즈

  // 아스키코드 97~122 사이(a~z)에서 임의의 문자를 define(CAPTCHA_CHARS)에서 지정한갯수 만큼 생성
  $captcha = "";
  for ($i = 0; $i < CAPTCHA_CHARS; $i++) {
    $captcha .= chr(rand(97, 122));
  }

  // 캡차 단어를 세션에 저장 
  session_start();
  $_SESSION['captcha'] = $captcha;

  // 상수에서 설정한 사이즈로 이미지 생성 
  $img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);

  // 이미지 바탕, 글자, 선의 색상 지정 
  $bg_color = imagecolorallocate($img, 255, 255, 255);     // 흰색
  $text_color = imagecolorallocate($img, 0, 0, 0);         // 검정
  $graphic_color = imagecolorallocate($img, 64, 64, 64);   // 회색

  // 바탕색 칠하기
  imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $bg_color);

  // 이미지 안에 랜덤으로 5개의 선긋기
  for ($i = 0; $i < 5; $i++) {
    imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }
  // 이미지 안에 랜덤으로 50개의 점찍기 
  for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $graphic_color);
  }

  // 캡차 문자열 넣기 (이미지,폰트크기,각도,x여백,y여백,색상,폰트파일,캡차단어) *지정한 폰트는 동일폴더에 있어야 함
  $font = 'Courier.ttf';
  imagettftext($img, 20, 0, 5, CAPTCHA_HEIGHT - 5, $text_color, $font, $captcha);

  // PNG 파일로 출력 
  header("Content-type: image/png");
  imagepng($img);

  // 이미지관련 메모리 삭제 (이미지는 이미 브라우저로 갔으므로 필요없음)
  imagedestroy($img);
?>

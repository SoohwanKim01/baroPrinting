<html>

<head>

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >

</head>

<body>

<?php

echo $_REQUEST['nickname'].'님의 상담내용은 '.$_REQUEST['questioncontent'].'이군요!';


?>

<form method="POST" action="" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="PUT">
    <br>
  닉네임  <input type="text" name="nickname" />
    <br>
  상담내용  <input type="text" name="questioncontent"  />
    <br>  <input type="submit"  value = "수정">

</form>

<form method="POST" action="" accept-charset="UTF-8">
    <input name="_method" type="hidden" value="DELETE">
    <input type="submit" value = "삭제">
</form>
<form action="./index.php" method="POST">
    <input type="submit" value="완료"/>
</form>




</body>

</html>

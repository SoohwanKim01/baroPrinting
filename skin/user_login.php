
    <!---- 로그인 스킨 시작 (skin/user_login.php) -------->
    <form class="needs-validation mx-auto" style="max-width: 400px" method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>
      <input type="text" name="uid" class="form-control" placeholder="아이디" value="<?php if (!empty($uid)) echo $uid; ?>" required autofocus>
      <input type="password" name="pass" class="form-control" placeholder="비밀번호" required>
      <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="submit">로 그 인</button> 
    </form>	
    <!---- 로그인 스킨 끝(skin/user_login.php) -------->

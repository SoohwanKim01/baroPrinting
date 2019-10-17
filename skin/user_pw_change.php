<!-------- skin/user_pw_change.php 시작 ---------->
      <h4 class="mb-3  text-center">비밀번호 변경</h4>
      <form class="needs-validation mx-auto" style="max-width: 500px" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3">
          <label for="pass0">이전 비밀번호</label>
          <input type="password" class="form-control" id="pass0" name="pass0" placeholder="이전 비밀번호를 입력하세요" required autofocus>
        </div>
        <div class="mb-3">
          <label for="pass1">새 비밀번호</label>
          <input type="password" class="form-control" id="pass1" name="pass1" required>
        </div>
        <div class="mb-3">
          <label for="pass2">새 비밀번호 확인</label>
          <input type="password" class="form-control" id="pass2" name="pass2" required>
        </div>
        <button class="btn btn-secondary btn-lg btn-block" type="submit" name="submit">확  인</button>
	    </form>
<!-------- skin/user_pw_change.php 끝 ---------->

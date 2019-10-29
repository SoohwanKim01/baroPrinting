<!---- skin/user_signup.php 시작 -------->
<h4 class="mb-3  text-center">회원가입</h4>
<form class="needs-validation mx-auto" style="max-width: 500px" method="post"
      action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="mb-3">
        <label for="uid">아이디</label>
        <input type="text" class="form-control" id="uid" name="uid" value="<?php if (!empty($uid)) echo $uid; ?>"
               required autofocus>
    </div>
    <div class="mb-3">
        <label for="pass1">비밀번호</label>
        <input type="password" class="form-control" id="pass1" name="pass1" required>
    </div>
    <div class="mb-3">
        <label for="pass2">비밀번호 확인</label>
        <input type="password" class="form-control" id="pass2" name="pass2" required>
    </div>
    <div class="mb-3">
        <label for="uname">이름/별명</label>
        <input type="text" class="form-control" id="uname" name="uname"
               value="<?php if (!empty($uname)) echo $uname; ?>" required>
    </div>
    <div class="mb-3">
        <label for="email">이메일</label>
        <input type="text" class="form-control" id="email" name="email"
               value="<?php if (!empty($email)) echo $email; ?>" required>
    </div>
    <div class="mb-3">
        <label for="captcha">아래 로봇방지 글자를 입력하세요</label>
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" id="captcha" name="captcha" autocomplete=off required>
            </div>
            <div class="col-md-5 form-control mx-3">
                <img src="<?php echo 'captcha.php' ?>"/>
            </div>
        </div>
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">회원가입 신청</button>
</form>
<!-- skin/user_signup.php 종료 -->
            
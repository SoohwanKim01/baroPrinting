<!---- 정보변경 시작 (skin/user_edit.php) -------->
<h4 class="mb-3  text-center">가입회원정보</h4>
<form class="needs-validation mx-auto" style="max-width: 500px" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="mb-3">
        <label for="uname">이름/별명</label>
        <input type="text" class="form-control" id="uname" name="uname" value="<?php if (!empty($uname)) echo $uname; ?>" required>
    </div>
    <div class="mb-3">
        <label for="email">이메일</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" required>
    </div>
</form>
<!---- 정보변경 끝 (skin/user_edit.php) -------->

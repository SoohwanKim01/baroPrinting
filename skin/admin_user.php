<!---- 정보변경 시작 (skin/user_edit.php) -------->
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <style>
        table {
            width: 100%;
        }
        table, th, td {
            border: 1px solid #bcbcbc;
        }
    </style>
</head>
<body>
<table>
    <caption>가입회원정보</caption>
    <thead>
    <tr>
        <th>이름</th>
        <th>아이디</th>
    </tr>

    <tr>
        <th> <input type="text" class="form-control" id="uname" name="uname" value="<?php if (!empty($uname)) echo $uname; ?>" required>
        </th>
        <th> <input type="text" class="form-control" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" required>
        </th>
    </tr>
    <tr>
        <th>이2름</th>
        <th>아2이디</th>
    </tr>
    </thead>
</table>
</body>
</html>
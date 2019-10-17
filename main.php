<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title><img src="img/logoimg.jpg"></title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" type="text/css" href="layout.css"/>
</head>
<body>
<div id="wrapper">

    <div id="header">

    </div>
    <div id="contents">
        <p>여기는 <strong>본문</strong> 입니다.<br>

            보통 본문에는 웹페이지의 주된 내용들이 들어가는 곳이므로
            내용을 좀 길게 쓰세요. 그래야 공부할 때 이해하기 편하거든요.
        </p>
        <p>좋은 책은 마음을 풍요롭게 합니다.</p>

        <table>
            <tr>
                <th>도서명</th>
                <th>도서명</th>
                <th>도서명</th>
            </tr>
            <tr>
                <td>누구를 위하여 종은 울리나</td>
                <td rowspan="2">삼중당</td>
                <td>헤밍웨이</td>
            </tr>
            <tr>
                <td>사랑할 때와 죽을 때</td>
                <td>레마르크</td>
            </tr>
            <tr>
                <td>천국에서 온 편지</td>
                <td>누보출판사</td>
                <td>최인호</td>
            </tr>

        </table>


    </div>
    <div id="side">

        <form method="get" action="page1.html" class="login">
            <input type="text" name="uid" placeholder="아이디" required><br>
            <input type="password" name="pass" placeholder="비밀번호" required><br>
            <input type="submit" name="submit" value="로그인"><br>
        </form>
        <ul>
            <li><a href="https://www.naver.com">네이버 홈피가기</a></li>
            <li><a href="https://www.daum.net">다음 홈피가기</a></li>
            <li><a href="./page1.html">표준이 중요한 이유</a></li>
        </ul>
    </div>
    <div id="footer">
        여기는 <em>풋터</em> 입니다.
    </div>
</div>

</body>
</html>
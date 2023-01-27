<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <title> Signup </title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">

</head>
<body>
    <div class="intro_bg">
        <div class="header">
            <div class="logo">
                <a href="#" onclick="location.href='main.php'"><img src="../image/Univerroom.png" width="200" height="70" ></a>
            </div>
            <ul class="nav">
                <li><a href="#" onclick="location.href='maps.php'">지도</a></li>
                <li><a href="#" onclick="location.href='room_list.php'">매물</a></li>
                <li><a href="#" onclick="location.href='chat_list.php'">채팅목록</a></li>
                <li><a href="#" onclick="location.href='inquiry_list.php'">게시판</a></li>
                <li><a href="#" onclick="location.href='login.php'">login</a></li>
            </ul>
        </div>
    </div>

    <div class="signup-wrapper">
        <h2>Signup</h2>
        <form method="post" action="../server/signup_server.php" id="signup-form">
            <input type="text" name="userId" placeholder="Id" id="userId">
            <div class="failure-message hide">아이디는 네글자 이상이여야 합니다.</div>
            <div class="success-message hide">사용할 수 있는 아이디 입니다.</div>
            <input type="text" name="userName" placeholder="Name" id="userName">
            <input type="text" name="userEmail" placeholder="Email" id="userEmail">
            <input type="password" name="userPassword" placeholder="Password" id="userPassword">
            <input type="password" name="userPasswordConfirm" placeholder="Password-confirm" id="userPasswordConfirm">
            <div class="mismatch-message hide">비밀번호 일치 ❌</div>
            <div class="mismatchSc-message hide">비밀번호 일치</div>
            <input type="submit" id="signup_btn" value="가입하기" >
        </form>
    </div>

    <script src="../js/signup.js"></script>
</body>
</html>
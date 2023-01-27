<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
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

    <div class="login-wrapper">
        <h2>Login</h2>
        <form method="post" action="../server/login_server.php" id="login-form">
            <input type="text" name="userId" placeholder="Id" >
            <input type="password" name="userPassword" placeholder="Password">
            <label for="remember-check">
                <input type="checkbox" id="remember-check">아이디 저장하기
            </label>
            <input type="submit" value="로그인">
        </form>
        <div class="toSignup">
            <a href="#" onclick="location.href='signup.php'">회원가입</a>
        </div>
    </div>
</body>
</html>
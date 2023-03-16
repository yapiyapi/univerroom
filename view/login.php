<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <?php
    session_start();
    include('titleBar.php');
    ?>
</head>
<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

    <div class="login-wrapper">
        <h2>Login</h2>
        <form method="post" action="../back/VrfLogin.php" id="login-form">
            <input type="text" name="userId" placeholder="Id" value="<?php 
            if($_COOKIE['id']){
                echo $_COOKIE['id'];
            }?>">
            <input type="password" name="userPassword" placeholder="Password" >
            <label for="remember-check">
                <input type="checkbox" name="checkbox" id="remember-check" <?php if($_COOKIE['id']){
                    echo "checked";
                }?>>아이디 저장하기
            </label>
            <input type="submit" value="로그인">
        </form>
        <div class="toSignup">
            <a href="signup.php">회원가입</a>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <title> Signup </title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css">
    <?php
    session_start();
    include('titleBar.php');
    ?>
</head>
<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

    <div class="signup-wrapper">
        <h2>Signup</h2>
        <form method="post" action="../back/InsertSignup.php" id="signup-form">
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
    <div id="snackbar">이미 존재하는 아이디 혹은 이메일 입니다.</div>

    <script src="../js/signup.js"></script>
    <?php if($_GET['error']==="same") echo '<script>Snackbar_error_same();</script>';?>
</body>
</html>
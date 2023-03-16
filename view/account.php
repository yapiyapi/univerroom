<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> 프로필 </title>
    <link rel="stylesheet" type="text/css" href="../css/account.css">
    <?php
    session_start();
    if ($_SESSION['user_id'] == null){
        echo '<script>alert("로그인 후 이용바랍니다.");location.href="../view/main.php"</script>';
    }
    include('titleBar.php');
    ?>
</head>
<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

    <div class="account-wrapper">
        <h2>프로필</h2>
        <form method="post" action="../back/UpdProfile.php" id="acc-form">
            <label for="room-name">이름:</label>
            <input type="text" name="name" placeholder="이름" value="<?php echo $_SESSION['user_name']?>">
            <label for="room-name">이메일:</label>
            <input type="text" name="email" placeholder="E-mail" value="<?php echo $_SESSION['user_email']?>">
            <input type="submit" value="수정">
        </form>
        <div class="logout">
            <div><a href="../back/logout.php" id="font_red">로그아웃</a></div>
            <div><a href="Ch_pw.php">비밀번호 변경</a></div>
        </div>
    </div>
</body>
</html>
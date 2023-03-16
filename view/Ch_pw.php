<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <title> 비밀번호 변경 </title>
    <link rel="stylesheet" type="text/css" href="../css/Ch_pw.css">
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

    <div class="Ch_pw-wrapper">
        <h2>비밀번호 변경</h2>
        <form method="post" action="../back/UpdPw.php" id="Ch_pw-form">
            <label for="room-name">기존 비밀번호:</label>
            <input type="password" name="Pw_exist" id="Pw_exist" placeholder="기존 비밀번호를 입력해주세요." >
            <label for="room-name">변경할 비밀번호:</label>
            <input type="password" name="Pw_change" id="Pw_change" placeholder="변경할 비밀번호를 입력해주세요.">
            <label for="room-name">변경할 비밀번호 재입력:</label>
            <input type="password" name="Pw_change_R" id="Pw_change_R" placeholder="변경할 비밀번호를 재입력 해주세요.">
            <div class="mismatch-message hide">비밀번호 일치 ❌</div>
            <div class="mismatchSc-message hide">비밀번호 일치</div>
            <input type="submit" id="change_btn" value="수정">
        </form>
    </div>
    <div id="snackbar">기존 비밀번호를 다시 입력해주세요.</div>
    <script src="../js/Ch_pw.js"></script>
    <?php if($_GET['error']==="exist") echo '<script>snackbar();</script>';?>

</body>
</html>
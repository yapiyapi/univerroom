<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <title> 방올리기 </title>
    <link rel="stylesheet" type="text/css" href="../css/room_C.css">
    <?php
    session_start();
    if ($_SESSION['user_id'] == null){
        echo '<script>alert("로그인 후 이용바랍니다.");location.href="../view/main.php"</script>';
    }
    include('titleBar.php');
    ?>
</head>

<body onload="jusoCallBack('','',''); coordinate(0);">
    <div class="intro_bg"><?php titleBar(); ?></div>

        <form action="../back/InsertRoom.php" id="room_form" method="post" enctype="multipart/form-data">

            <img src="../image/app_img/plus_img.png" alt="plus_img" onclick="fileUploadAction();" style='width: 80px; margin-right: 30px;'>
            <input type="file" name="imgFile[]" id="input_imgs" multiple />
            <span class="imgs_wrap"></span><br>

            <hr>

            <label for="room-name">제목:</label>
            <input type="text" id="room-name" name="room-name" placeholder="제목을 적어주세요."><br><br>

            <label for="room-price">위치:</label>
            <div>
                <input type="text" id="roadAddrPart1" placeholder="주소" name="room-location" readonly>
                <input type="button" id="search_loc" value="검색" onclick="goPopup();">
            </div>
            <div><input type="text" id="addrDetail" placeholder="상세주소" name="room-loc-detail"></div><br>
            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="lng" id="lng">

            <label for="room-type">종류:</label>
            <select id="room-type" name="room-type">
                <option value="원룸">원룸</option>
                <option value="투룸">투룸</option>
                <option value="쓰리룸">쓰리룸</option>
            </select><br><br>

            <label for="room-price">가격:</label>
            <input type="text" id="room-price" name="room-price" placeholder="가격을 적어주세요."><br><br>

            <label for="room-description">내용:</label>
            <textarea id="room-description" name="room-description" placeholder="내용을 적어주세요."></textarea><br><br>

            <input type="submit" id="room_submit" value="올리기">
        </form><br><br>

    </div>

    <script src="../js/room_C.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <title> 수정 </title>
    <link rel="stylesheet" type="text/css" href="../css/room_U.css">
    <?php
    session_start();
    if ($_SESSION['user_id'] == null){
        echo '<script>alert("로그인 후 이용바랍니다.");location.href="../view/main.php"</script>';
    }
    include('titleBar.php');
    include("../back/db_univerroom.php");

    $referer = $_SERVER['HTTP_REFERER'];
    $page_id = explode("page_id=", $referer)[1];

    $sql = "SELECT * FROM `room` WHERE seq = $page_id";
    $ret = mysqli_query($mysqli, $sql);

    $row = mysqli_fetch_array($ret);

    $images = explode(",", $row['images']);

    ?>
</head>

<body>
    <div class="intro_bg">
        <?php titleBar(); ?>

        <form action="../back/UpdRoom.php" id="room_form" method="post" enctype="multipart/form-data">

            <img src="../image/app_img/plus_img.png" alt="plus_img" onclick="fileUploadAction();" style='width: 80px; margin-right: 30px;'>
            <input type="file" name="imgFile[]" accept="image/jpeg" id="input_imgs" multiple/>
            <input type="hidden" name="imgFile_exist" id="input_imgs_exist" value="<?php echo implode(',',$images); ?>"/>
            <span class="imgs_wrap">
                <?php
                if (($images[0] === ""));
                else {
                    foreach ($images as $img) {
                        echo "<img src=../image/server_img/" . $img . " alt='이미지 없음'
                                style='margin-right: 10px;'>";
                    }
                }
                ?>
            </span><br>

            <hr>

            <label for="room-name">제목:</label>
            <input type="text" id="room-name" name="room-name" value="<?php echo $row['title']; ?>" placeholder="제목을 적어주세요."><br><br>

            <label for="room-price">위치:</label>
            <input type="text" id="room-location" name="room-location" value="<?php echo $row['location']; ?>" placeholder="위치를 적어주세요."><br><br>

            <label for="room-type">종류:</label>
            <select id="room-type" name="room-type">
                <option value="원룸" <?php if ($row['room_type'] === "원룸") echo "selected" ?>>원룸</option>
                <option value="투룸" <?php if ($row['room_type'] === "투룸") echo "selected" ?>>투룸</option>
                <option value="쓰리룸" <?php if ($row['room_type'] === "쓰리룸") echo "selected" ?>>쓰리룸</option>
            </select><br><br>

            <label for="room-price">가격:</label>
            <input type="text" id="room-price" name="room-price" value="<?php echo $row['price']; ?>" placeholder="가격을 적어주세요."><br><br>

            <label for="room-description">내용:</label>
            <textarea id="room-description" name="room-description" placeholder="내용을 적어주세요."><?php echo $row['contents']; ?></textarea><br><br>

            <input type="submit" id="room_submit" value="수정하기">
            <input type="hidden" name="room-seq" value="<?php echo $page_id; ?>">
        </form><br><br>

    </div>

    <script src="../js/room_C.js"></script>
    <script>
        
    </script>
</body>

</html>
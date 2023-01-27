<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Post </title>
    <link rel="stylesheet" type="text/css" href="../css/inquiry_post.css">
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <?php
        include("../server/db_univerroom.php");

        $uri= $_SERVER['REQUEST_URI'];
        $board_num = explode( '?', $uri );

        $sql = "SELECT * FROM `board` WHERE seq = $board_num[1]";
        $ret = mysqli_query($mysqli , $sql);

        $row = mysqli_fetch_array($ret);

        // 하트
        // global $board_num, $mysqli;
        // $sql = "UPDATE `board` SET `liked`= board.liked + 1 WHERE seq = $board_num[1]";
        // $ret = mysqli_query($mysqli , $sql);
    ?>
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

    <section class="notice">
        <div class="page-title">
            <div class="container_title">
                <!-- 제목 -->
                <div class="title"><?php echo $row['title']; ?></div>
                <!-- 하트 -->
                <div class="heart">
                    <div class="right_area">
                        <a onclick="test()" class="icon heart">
                            <img src="https://cdn-icons-png.flaticon.com/512/812/812327.png" alt="찜하기">
                        </a>
                    </div>
                    <div class="left_area"><?php echo $row['liked']; ?></div>
                </div>
                <!-- 조회수 -->
                <div class="hit"><?php echo "조회 ".$row['hit']; ?></div>
                
            </div>
        </div>
        <!-- 내용 -->
        <div class="page-content">
            <div class="container_con">
                <?php echo $row['content']; ?>
            </div>
        </div>
        <div class="ToList"><a href="inquiry.php" class="gray-button">목록</a></div>

    </section>
    <script src="../js/inquiry_post.js"></script>

</body>
</html>
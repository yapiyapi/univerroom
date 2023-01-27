<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title>Univerroom</title>
    <link rel="stylesheet" type="text/css" href="../css/sellingRoom.css">
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

        <form action="../server/sellingRoom_server.php" method="post">
            <label for="room-name">제목:</label>
            <input type="text" id="room-name" name="room-name"><br><br>
            
            <label for="room-type">종류 선택:</label>
            <select id="room-type" name="room-type">
                <option value="single">원룸</option>
                <option value="double">투룸</option>
                <option value="triple">쓰리룸</option>
            </select><br><br>

            <label for="room-price">가격:</label>
            <input type="text" id="room-price" name="room-price"><br><br>

            <label for="room-description">설명:</label>
            <textarea id="room-description" name="room-description"></textarea><br><br>

            <input type="submit" value="Submit">
        </form>

    </div>
</body>
</html>
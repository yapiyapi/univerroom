<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

	<title> 지도 </title>
    <link rel="stylesheet" type="text/css" href="../css/maps.css">
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

	<div class="map_contents">
        <div class="cell-container">
            <div class="cell">
                <div class="thumbnail">
                    <img src="다운로드.jpeg" alt="thumbnail image">
                </div>
                <div class="cell-content">
                    <h2 class="title">Title</h2>
                    <p class="location">Location</p>
                    <p class="description">Description</p>
                </div>
            </div>
            <div class="cell">
                <div class="thumbnail">
                    <img src="다운로드.jpeg" alt="thumbnail image">
                </div>
                <div class="cell-content">
                    <h2 class="title">Title</h2>
                    <p class="location">Location</p>
                    <p class="description">Description</p>
                </div>
            </div>
            <div class="cell">
                <div class="thumbnail">
                    <img src="다운로드.jpeg" alt="thumbnail image">
                </div>
                <div class="cell-content">
                    <h2 class="title">Title</h2>
                    <p class="location">Location</p>
                    <p class="description">Description</p>
                </div>
            </div>
        </div>

	    <div id="map"></div>
    </div>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=139a12f3e32a29c8511321b2b6ecd804"></script>
    <script src="../js/maps.js"></script>
</body>
</html>

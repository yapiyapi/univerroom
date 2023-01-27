<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title>Univerroom</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
        <form method="get" action="main.html">
            <label class="styled__InputWindow-sc-126ee4m-3 uWfbQ">
                <svg width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M0 0H24V24H0z"></path>
                        <g stroke="#222" stroke-width="2" transform="translate(2 2)">
                            <circle cx="8" cy="8" r="8"></circle>
                            <path stroke-linecap="round" d="M15 14L19.95 18.95"></path>
                        </g>
                    </g>
                </svg>
                <input placeholder="지역 또는 단지명을 입력하세요." value="">
            </label>
        </form>

    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <title> 채팅리스트 </title>
    <link rel="stylesheet" type="text/css" href="../css/chat_list.css">

    <?php
        include("../server/db_univerroom.php");

        $sql = "SELECT * FROM `board` ORDER BY seq DESC";
        $ret = mysqli_query($mysqli , $sql);
    ?>
    <script src="../js/chat_list.js"></script>
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
          <div class="container">
              <h3>채팅리스트</h3>
          </div>
      </div>

      <div class="chat-list">
        <?php
            while($row = mysqli_fetch_array($ret)){
                echo "<div class='chat-item' onclick='open_chat()'>
                      ".$row['seq']."
                      <div class='info'>
                        <h3 class='name'>".$row['title']."</h3>
                        <p class='chat-preview'>".$row['add_date']."</p>
                      </div>
                    </div>";
            }
        ?>
    </section>
    <script src="../js/chat_list.js"></script>

</body>
</html>
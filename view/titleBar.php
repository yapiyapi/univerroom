<?php
    function titleBar() {
        session_start();
        echo '<div class="header">
                  <div class="logo">
                      <a href="main.php"><img src="../image/app_img/Univerroom.png" width="200" height="70"></a>
                  </div>
                  <ul class="nav"><li><a href="maps.php">지도</a></li>';
        if ($_SESSION['user_id'] == null){
            echo '<li><a href="inquiry_list.php">게시판</a></li>
                  <li><a href="login.php">login</a></li>';
        }else{
            echo '<li><a href="room_C.php">방올리기</a></li>
                  <li><a href="chat_list.php">채팅목록</a></li>
                  <li><a href="inquiry_list.php">게시판</a></li>
                  <li><a href="account.php">'.$_SESSION['user_name'].'</a></li>';
        }
        echo '</ul></div>';
        
    }
?>
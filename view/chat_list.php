<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <title> 채팅리스트 </title>
    <link rel="stylesheet" type="text/css" href="../css/chat_list.css">

    <?php
        session_start();
        if ($_SESSION['user_id'] == null){
            echo '<script>alert("로그인 후 이용바랍니다.");location.href="../view/main.php"</script>';
        }
        include('titleBar.php');
        include("../back/db_univerroom.php");
        // session id
        $sess_id = $_SESSION['user_id'];
        // user / chatRoom 
        $sql_chat = "SELECT R.title,R.location,C.seq,C.room_seq,C.msg_from,C.msg_to,C.last_chat,C.add_date,U.Id ,U.name
                        FROM chatRoom C JOIN user U ON U.Id = if( '$sess_id'=msg_from, msg_to,msg_from )
                        JOIN room R ON C.room_seq = R.seq
                        WHERE C.msg_from='$sess_id' OR C.msg_to='$sess_id'
                        ORDER BY C.seq DESC";
        $ret_chat = mysqli_query($mysqli , $sql_chat);
    ?>
    <script src="../js/chat_list.js"></script>
</head>
<body> 

    <div class="intro_bg">
    <?php titleBar(); ?>
    </div>

    <section class="notice">
      <div class="page-title">
          <div class="container">
              <h3>채팅리스트</h3>
          </div>
      </div>

      <div class="chat-list">
        <?php
            while($row = mysqli_fetch_array($ret_chat)){
                echo "<div class='chat-item' onclick='open_chat(".$row['seq'].")'>
                      <div class='info'>
                        <h3 class='name'>".$row['name']."</h3>
                        <p class='chat-title'>".$row['title']."</p>
                        <span class='chat-location'>(".$row['location'].")</span>
                      </div>
                      <p class='chat-preview'>".$row['last_chat']."</p>
                    </div>";
            }
        ?>
    </section>
    <script src="../js/chat_list.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> 매물 </title>
    <link rel="stylesheet" type="text/css" href="../css/room_R.css">
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <?php
    session_start();
    include('titleBar.php');
    include("../back/db_univerroom.php");
    // page_id
    $page_id = $_GET['page_id'];
    // room
    $sql_room = "SELECT * FROM `room` WHERE seq = $page_id";
    $ret_room = mysqli_query($mysqli, $sql_room);
    // user
    $sql_user = "SELECT R.seq,R.add_date,U.Id,U.thumnail,U.name,U.email 
    FROM user U JOIN room R ON U.seq = R.user_seq WHERE R.seq = $page_id;";
    $ret_user = mysqli_query($mysqli, $sql_user);
    // 조회수 UPDATE
    $sql_room_u = "UPDATE room set hit = hit + 1 where seq = $page_id";
    mysqli_query($mysqli, $sql_room_u);

    $row_r = mysqli_fetch_array($ret_room);
    $row_u = mysqli_fetch_array($ret_user);
    // room_imgs
    $images = explode(",", $row_r['images']);


    // 하트
    // global $board_num, $mysqli;
    // $sql = "UPDATE `board` SET `liked`= board.liked + 1 WHERE seq = $board_num[1]";
    // $ret = mysqli_query($mysqli , $sql);
    // chatroom
    //     INSERT INTO chatRoom (title,msg_from,msg_to,add_date)

    // VALUE ('1번방','qwer1','qwer2',NOW())
    // chat
    // INSERT INTO chat (roomNum,userID,chat,add_date)
    // 
    // VALUE (1,'qwer2','안녕하세요',NOW)
    ?>
</head>

<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

    <section class="notice">
        <!-- 제목 -->
        <div class="title"><?php echo $row_r['title']; ?></div>
        <div class="page-title">
            <div class="container_title">
                <!-- 글쓴이 -->
                <img src="../image/app_img/gest.png" id="writter_thumnail" alt="게스트 이미지">
                <div class="writter">
                    <div id="writter_id"><?php echo $row_u['name']; ?></div>
                    <div id="add_date"><?php echo $row_u['add_date']; ?></div>
                </div>
                <?php if ($_SESSION['user_id'] != null) {
                    echo '
                <!-- 하트 -->
                <div class="heart">
                    <div class="right_area">
                        <a onclick="test()" class="icon heart">
                            <img src="https://cdn-icons-png.flaticon.com/512/812/812327.png" alt="찜하기">
                        </a>
                    </div>
                    <div class="left_area">' . $row_r["liked"] . '</div>
                </div>
                <!-- 조회수 -->
                <div class="hit">조회 ' . $row_r['hit'] . '</div>';
                } else {
                    echo '<div class="hit left">조회 ' . $row_r['hit'] . '</div>';
                }  ?>

            </div>
        </div>
        <!-- 이미지 -->
        <div class="container_img">
            <?php
            foreach ($images as $img) {
                echo "<img src=../image/server_img/" . $img . " alt='이미지 없음' style='
                    margin-right:10px; max-width:200px; min-width:200px; '>";
            }
            ?>
        </div>
        <!-- 가격 -->
        <br><br>
        <div class="title_key">가격정보</div>
        <div class="container_con">
            <?php echo $row_r['price']; ?>
        </div>
        <!-- 내용 -->
        <br><br>
        <div class="title_key">상세설명</div>
        <div class="container_con">
            <?php echo $row_r['contents']; ?>
        </div>
        <!-- 위치 -->
        <br><br>
        <div class="title_key">위치정보</div>
        <div class="container_con">
            <?php echo $row_r['location']; ?> (<?php echo $row_r['loc_detail']; ?>)
        </div>
        <!-- map -->
        <div style="width:100%"></div>
        <div id="map" style="width:1100px; margin: auto; height:350px;"></div>
        <!-- 채팅 -->
        <?php
        if ($_SESSION['user_id'] != $row_u['Id']) {
            echo '
            <br><br>
            <div class="title_key">채팅하기</div>
            <div class="container_con">
                ' . $row_u["name"] . '<span style="font-size: 12px; color:gray">(' . $row_u["Id"] . ')</span><br>
                <div style="font-size: 14px; color:gray">' . $row_u["email"] . '</div>
            </div>
            <div class="chat_btn">';
            if ($_SESSION["user_id"] != null) {
                echo '<a onclick="ChatBtn()">채팅하기</a>';
            } else echo '<div>채팅하기</div>';
            echo '</div>';
        }
        ?>

        <!-- btn -->
        <div class="Btn_gray">
            <a href="maps.php">목록</a>
            <?php if ($_SESSION['user_id'] == $row_u['Id']) {
                echo '<a href="room_U.php" >수정</a>
            <a href="../back/DelRoom.php" >삭제</a>';
            }  ?>
        </div>


    </section>
    <script>
        function ChatBtn() {
            $.ajax({
                url: "../back/chatBtn.php",
                type: "get",
                data: {page_id: <?=$page_id?>,
                        oppo_id: '<?=$row_u['Id']?>'}
            }).done(function(data) {
                window.open(`http://192.168.64.128/node?ChatRoom_seq=${data}`, "new", "toolbar=no, menubar=no, scrollbars=yes, resizable=no, width=285, height=420, left=0, top=0");
            });
        }

        $(function() {
            var $likeBtn = $(".icon.heart");
            var liked = $(".left_area");
            // var liked_plus = <?= '$sql_room_u_liked_plus = "UPDATE room set liked = liked + 1 where seq = $page_id";
            //         mysqli_query($mysqli, $sql_room_u_liked_plus);' ?>
            // var liked_minus = <?= '$sql_room_u_liked_plus = "UPDATE room set liked = liked - 1 where seq = $page_id";
            //         mysqli_query($mysqli, $sql_room_u_liked_plus);' ?>;

            $likeBtn.click(function() {
                $likeBtn.toggleClass("active");

                if ($likeBtn.hasClass("active")) {
                    $(this).find("img").attr({
                        src: "https://cdn-icons-png.flaticon.com/512/803/803087.png"
                    });
                    liked_plus;
                } else {
                    $(this).find("i").removeClass("fas").addClass("far");
                    $(this).find("img").attr({
                        src: "https://cdn-icons-png.flaticon.com/512/812/812327.png"
                    });
                    liked_minus;
                }
            });
        });
    </script>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=139a12f3e32a29c8511321b2b6ecd804&libraries=clusterer"></script>
    <script>
        // map
        var map = new kakao.maps.Map(document.getElementById('map'), { // 지도를 표시할 div
            center: new kakao.maps.LatLng(<?php echo $row_r['lat'] ?>, <?php echo $row_r['lng'] ?>), // 지도의 중심좌표
            level: 5 // 지도의 확대 레벨
        });
        var markerPosition = new kakao.maps.LatLng(<?php echo $row_r['lat'] ?>, <?php echo $row_r['lng'] ?>);
        // 마커를 생성합니다
        var marker = new kakao.maps.Marker({
            position: markerPosition
        });
        // 마커가 지도 위에 표시되도록 설정합니다
        marker.setMap(map);
    </script>


</body>

</html>
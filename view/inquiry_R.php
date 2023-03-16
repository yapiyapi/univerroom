<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <title> Post </title>
    <link rel="stylesheet" type="text/css" href="../css/inquiry_R.css">
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <?php
    session_start();
    include('titleBar.php');
    include("../back/db_univerroom.php");

    $page_id = $_GET['page_id'];

    // board
    $sql_board = "SELECT * FROM `board` WHERE seq = $page_id";
    $ret_board = mysqli_query($mysqli, $sql_board);
    // user
    $sql_user = "SELECT B.seq,B.add_date,U.Id,U.name,U.email FROM user U 
        JOIN board B ON U.seq = B.user_seq WHERE B.seq =$page_id;";
    $ret_user = mysqli_query($mysqli, $sql_user);
    // 조회수 UPDATE
    $sql_board_u = "UPDATE board set hit = hit + 1 where seq = $page_id";
    mysqli_query($mysqli, $sql_board_u);

    $row_b = mysqli_fetch_array($ret_board);
    $row_u = mysqli_fetch_array($ret_user);

    // 하트
    // global $board_num, $mysqli;
    // $sql = "UPDATE `board` SET `liked`= board.liked + 1 WHERE seq = $board_num[1]";
    // $ret = mysqli_query($mysqli , $sql);
    ?>
</head>

<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

    <section class="notice">
        <!-- 제목 -->
        <div class="title"><?php echo $row_b['title']; ?></div>
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
                    <div class="left_area">'.$row_b["liked"].'</div>
                </div>
                <!-- 조회수 -->
                <div class="hit">조회 '. $row_b['hit'].'</div>';
                }else{
                    echo '<div class="hit left">조회 '. $row_b['hit'].'</div>';
                }  ?>
                
                

            </div>
        </div>
        <!-- 내용 -->
        <div class="page-content">
            <div class="container_con">
                <?php echo $row_b['content']; ?>
            </div>
        </div>
        <div class="Btn_gray">
            <a href="inquiry_list.php">목록</a>
            <?php if ($_SESSION['user_id'] == $row_u['Id']) {
                echo '<a href="inquiry_U.php" >수정</a>
            <a href="../back/DelInquiry.php" >삭제</a>';
            }  ?>

        </div>

    </section>
    <script src="../js/inquiry_R.js"></script>

</body>

</html>
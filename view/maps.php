<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<title> 지도 </title>
    <link rel="stylesheet" type="text/css" href="../css/maps.css">
    <?php
        session_start();
        include('titleBar.php');
        include("../back/db_univerroom.php");

        $sql = "SELECT `seq`, `thumnail`, `title`,`location`, `room_type`, `price`, `contents` FROM `room` ORDER BY `seq` DESC;";
        $ret = mysqli_query($mysqli , $sql);
    ?>
</head>
<body>
    <div class="intro_bg"><?php titleBar(); ?></div>

	<div class="map_contents">
        <!-- map-list -->
        <div class="cell-container">
            <?php
                while($row = mysqli_fetch_array($ret)){
                    echo '<div class="cell" id="cell_'.$row['seq'].'" onclick="location.href=`../view/room_R.php?page_id='.$row['seq'].'`">
                            <div class="thumbnail">
                                <img src="../image/server_img/'.$row['thumnail'].'" alt="thumbnail image">
                            </div>
                            <div class="cell-content">
                                <h2 class="title">'.$row['title'].'</h2>
                                <p class="location">'.$row['location'].'</p>
                                <p class="description">'.$row['contents'].'</p>
                            </div>
                        </div>';
                }
            ?>
        </div>
        <!-- map -->
	    <div id="map"></div>
    </div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=139a12f3e32a29c8511321b2b6ecd804&libraries=clusterer"></script>
    <script src="../js/maps.js"></script>
</body>
</html>

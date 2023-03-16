<?php
    session_start();
    include("db_univerroom.php");

    $sess_seq = $_SESSION['user_seq'];
    $title = $_POST['room-name'];
    $location = $_POST['room-location'];
    $loc_det = $_POST['room-loc-detail'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $type = $_POST['room-type'];
    $price_string = $_POST['room-price'];
    $price = (int)$price_string;
    $contents = $_POST['room-description'];


    $imgFile = $_FILES['imgFile'];
    
    $uploadDir = "../image/server_img/";
    $fileName = $imgFile['name'];
    $tmpName = $imgFile['tmp_name'];
    
    $fileNames = array();
    
    for($i=0; $i<count($fileName); $i++){
       move_uploaded_file($tmpName[$i], $uploadDir.$fileName[$i]); // 디렉토리에 저장하기
       array_push($fileNames, $fileName[$i]); // 가공해서 배열에 넣기
       $arrayString = implode(",", $fileNames); // 배열을 문자열로 만들기
    }

   $sql = "INSERT INTO `room`(`thumnail`, `images`, `title`,`location`,`loc_detail`, `lat`, `lng`, `room_type`,`price`,`contents`,`user_seq`, `add_date`) 
             VALUES ('$fileNames[0]','$arrayString','$title','$location','$loc_det','$lat','$lng','$type','$price','$contents', $sess_seq, now())";

    $ret = mysqli_query($mysqli , $sql);
?>

<script>
    location.href = "../view/maps.php";
</script>

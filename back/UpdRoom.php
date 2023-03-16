<?php
    include("db_univerroom.php");

    $seq = $_POST['room-seq'];
    $title = $_POST['room-name'];
    $location = $_POST['room-location'];
    $type = $_POST['room-type'];
    $price_string = $_POST['room-price'];
    $price = (int)$price_string;
    $contents = $_POST['room-description'];
    // 이미지
    $imgFile = $_FILES['imgFile'];
    $imgFile_exist = $_POST['imgFile_exist'];
    
    $uploadDir = "../image/server_img/";
    $fileName = $imgFile['name'];
    $tmpName = $imgFile['tmp_name'];
    
    $fileNames = array();
    
    for($i=0; $i<count($fileName); $i++){
       move_uploaded_file($tmpName[$i], $uploadDir.$fileName[$i]); // 디렉토리에 저장하기
       array_push($fileNames, $fileName[$i]); // 가공해서 배열에 넣기
       $arrayString = implode(",", $fileNames); // 배열을 문자열로 만들기
    }
    if(strlen($arrayString)===0) { $images_str = $imgFile_exist;}
    else {$images_str=$arrayString;}
    $img_arr = explode(",", $images_str);
    
    $sql = "UPDATE `room` SET `thumnail`='$img_arr[0]',`images`='$images_str',`title`='$title',
        `location`='$location',`room_type`='$type',`price`='$price',`contents`='$contents',
        `add_date`= now() WHERE `seq`=$seq";
    $ret = mysqli_query($mysqli , $sql);
?>

<script>
    location.href = "../view/maps.php";
</script>

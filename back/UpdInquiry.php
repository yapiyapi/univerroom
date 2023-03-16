<?php
    include("db_univerroom.php");

    $seq = $_POST['inquiry-seq'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $sql = "UPDATE `board` SET `title`='$title',`content`='$content',`add_date`= now() 
        WHERE `seq`=$seq";
    $ret = mysqli_query($mysqli , $sql);
?>

<script>
    location.href = "../view/inquiry_list.php";
</script>

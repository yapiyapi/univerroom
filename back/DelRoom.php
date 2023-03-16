<?php

include("db_univerroom.php");

$referer = $_SERVER['HTTP_REFERER'];
$page_id = explode("page_id=", $referer)[1];

$sql = "DELETE FROM `room` WHERE `seq` = $page_id";

$ret = mysqli_query($mysqli , $sql);

?>

<script>
    alert("삭제 완료!!");
    location.href = "../view/maps.php";
</script>
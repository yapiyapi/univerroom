<?php

include("db_univerroom.php");

$title = $_POST['title'];
$contents = $_POST['contents'];
$user_seq = 1;

$sql = "INSERT INTO `board`(`title`, `content`, `add_date`, `user_seq`) VALUES ('$title','$contents',NOW(),1)";

$ret = mysqli_query($mysqli , $sql);

?>
<script>
    alert("hi");
    location.href = "../view/inquiry.php";
</script>


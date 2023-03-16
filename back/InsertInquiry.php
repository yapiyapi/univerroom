<?php
session_start();
include("db_univerroom.php");

$title = $_POST['title'];
$contents = $_POST['contents'];
$user_seq = $_SESSION['user_seq'];

$sql = "INSERT INTO `board`(`title`, `content`, `add_date`, `user_seq`) VALUES ('$title','$contents',NOW(),$user_seq)";

$ret = mysqli_query($mysqli , $sql);

?>
<script>
    location.href = "../view/inquiry_list.php";
</script>


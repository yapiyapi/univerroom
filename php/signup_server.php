<?php

include("db_univerroom.php");

$Id = $_POST['userId'];
$password = $_POST['userPassword'];
$name = $_POST['userName'];
$email = $_POST['userEmail'];

$sql = "INSERT INTO `user`(`Id`, `password`, `name`, `email`, `join_date`) VALUES ('$Id','$password','$name','$email',now())";
$ret = mysqli_query($mysqli , $sql);

?>

<script>
    alert("회원가입 완료!!");
    location.href = "../view/login.php";
</script>
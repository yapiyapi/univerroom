<?php

include("db_univerroom.php");

$Id = $_POST['userId'];
$password= $_POST['userPassword'];
$password = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
$name = $_POST['userName'];
$email = $_POST['userEmail'];

$sql_same = "SELECT * FROM user where Id = '$Id' or email = '$email'";
$order = mysqli_query($mysqli, $sql_same);

if(mysqli_num_rows($order) === 0){
    $sql = "INSERT INTO `user`(`Id`, `password`, `name`, `email`, `join_date`) VALUES ('$Id','$password','$name','$email',now())";
    $ret = mysqli_query($mysqli , $sql);
}else{
    header("location: ../view/signup.php?error=same");
    exit();
}

?>

<script>
    alert("회원가입 완료!!");
    location.href = "../view/login.php";
</script>
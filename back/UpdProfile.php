<?php
    session_start();
    include("db_univerroom.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_SESSION['user_id'];

    $sql = "UPDATE `user` SET `name`='$name',`email`='$email'
        WHERE `Id`='$id'";
    $ret = mysqli_query($mysqli , $sql);

    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    header('location: ../view/main.php');
?>
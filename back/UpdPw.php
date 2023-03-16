<?php
    session_start();
    include("db_univerroom.php");

    $Pw_exist = $_POST['Pw_exist'];
    $Pw_change = $_POST['Pw_change'];
    $Pw_c_hash = password_hash($Pw_change, PASSWORD_DEFAULT);


    $id = $_SESSION['user_id'];
    $pw = $_SESSION['user_pw'];

    if(password_verify($Pw_exist,$pw)){
        $sql = "UPDATE `user` SET `password`='$Pw_c_hash' WHERE `Id`='$id'";
        $ret = mysqli_query($mysqli , $sql);
    }else{
        header('location: ../view/Ch_pw.php?error=exist');
        exit();
    }

    $_SESSION['user_pw'] = $Pw_c_hash;

    header('location: ../view/main.php');
?>
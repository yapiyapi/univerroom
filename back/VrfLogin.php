<?php

include("db_univerroom.php");
session_start();

$Id_post = $_POST['userId'];
$Pw_post = $_POST['userPassword'];
$checkbox = $_POST['checkbox'];

$sql = "SELECT * FROM `user` WHERE `Id`='$Id_post'";
$ret = mysqli_query($mysqli , $sql);  

if(mysqli_num_rows($ret)===1){
    $row = mysqli_fetch_assoc($ret);
    $seq = $row['seq'];
    $id = $row['Id'];
    $name = $row['name'];
    $email = $row['email'];
    $pw_hash = $row['password'];

    if(password_verify($Pw_post,$pw_hash)){ // login 성공
        // session
        $_SESSION['user_seq'] = $seq;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_id'] = $id;
        $_SESSION['user_pw'] = $pw_hash;
        $_SESSION['user_email'] = $email;
        // cookie
        if($checkbox==="on"){
            setcookie('id',$id,time()+(86400),'/');
        }
        header("location: ../view/main.php");
        exit();    
    }else{   // login 실패
        echo "<script>
                alert('패스워드 또는 아이디가 일치하지 않습니다.');
                location.href = '../view/login.php';
            </script>"; 
    }
}
?>
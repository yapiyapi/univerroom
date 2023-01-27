<?php

include("db_univerroom.php");

$Id_post = $_POST['userId'];
$Pw_post = $_POST['userPassword'];

$sql = "SELECT * FROM `user` WHERE `Id`='$Id_post'";
$ret = mysqli_query($mysqli , $sql);  

while($row = mysqli_fetch_array($ret)){
    $pw = $row['password'];
}
if($sql && $pw===$Pw_post){
    // 로그인 성공 
    echo "<script>
            location.href = '../view/main.php';
         </script>";
} else {
    // 로그인 실패 
    echo "<script>
            alert('패스워드 또는 아이디가 일치하지 않습니다.');
            location.href = '../view/login.php';
        </script>";
}
?>
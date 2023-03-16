<?php
session_start();
include("../back/db_univerroom.php");
// msg
$id = $_GET['id'];
$msg = $_GET['msg'];
$ChatRoom_seq = $_GET['ChatRoom_seq'];
$sql = "INSERT INTO `chat`(`ChatRoom_seq`, `userID`, `msg`, `add_date`) 
VALUES ($room_seq,'$id','$msg',NOW())";
$sql_R = "UPDATE chatRoom SET last_chat = '$msg' WHERE seq = $ChatRoom_seq";

mysqli_query($mysqli , $sql);
mysqli_query($mysqli , $sql_R);
?>
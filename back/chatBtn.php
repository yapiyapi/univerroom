<?php
session_start();
include("../back/db_univerroom.php");
// session_id 
$session_id = $_SESSION['user_id'];
// page_seq 게시물 번호
$page_id = $_GET['page_id'];
// oppo_id
$oppo_id = $_GET['oppo_id'];
$isset = true;
// chatRoom Select
$sql_chatR = "SELECT seq,room_seq,msg_from,msg_to FROM chatRoom";
$ret_chatR = mysqli_query($mysqli, $sql_chatR);
// chatRoom Select MAX(seq)
$sql_chatR_Max = "SELECT MAX(seq) AS seq FROM chatRoom";
$ret_chatR_Max = mysqli_query($mysqli, $sql_chatR_Max);
$row_max = mysqli_fetch_array($ret_chatR_Max);
// chatRoom Insert
$sql_chatR_insert = "INSERT INTO chatRoom (room_seq,msg_from,msg_to,add_date)
            VALUE ('$page_id','$session_id','$oppo_id',NOW())";
// 메세지를 보낸사람, 받는 사람이 기존 데이터베이스에 있거나 || 같은 게시물에 대한 chatRoom이 없으면　（ 출력 )
while ($row_c = mysqli_fetch_array($ret_chatR)) {
    $room_seq = $row_c['room_seq'];
    $msg_from = $row_c['msg_from'];
    $msg_to = $row_c['msg_to'];
    if ((($msg_from === $session_id && $msg_to === $oppo_id) || ($msg_to === $session_id && $msg_from === $oppo_id))) {
        if($page_id === $room_seq){
            echo $row_c['seq'];
            $isset = false;
        }
    }
}
if($isset){
    $ret_chatR_insert = mysqli_query($mysqli, $sql_chatR_insert);
    echo $row_max['seq'] + 1;
}
?>
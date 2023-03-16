<?php
session_start();
include("../back/db_univerroom.php");
// ChatRoom_seq
$ChatRoom_seq = $_GET['ChatRoom_seq'];
// chat
$sql_c = "SELECT c.*,u.name FROM chats c JOIN user u 
ON c.userID = u.Id
WHERE ChatRoom_seq = $ChatRoom_seq
ORDER BY add_date asc;";
$ret_c = mysqli_query($mysqli, $sql_c);

$Chat_data = array();
while($row_c = mysqli_fetch_array($ret_c)){
    array_push($Chat_data,[
        "userID" => $row_c[2],
        "userName" => $row_c[5],
        "msg" => $row_c[3]
    ]);
}
echo json_encode($Chat_data);
?>
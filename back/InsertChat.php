<?php

include("db_univerroom.php");

$msg = $_POST['msg'];
$sql = "INSERT INTO chat (`ChatRoom_seq`, `userID`, `msg`,`add_date`)
              VALUES (1,'qwer1','".$msg."',NOW())";
$row = mysqli_query($mysqli, $sql);
?>

<script>
    location.href = "../view/chat.php?room_page=1";
</script>
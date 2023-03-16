<?php
session_start();
echo json_encode([$_SESSION['user_id'],$_SESSION['user_name']])
?>

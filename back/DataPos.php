<?php

    require_once('db.php');
    $db = new MysqliDb("127.0.0.1", "root", "rkwhrdms4!", "univerroom");
    $users = $db->get('room');
    header("Content-Type: application/json");
    print_r(json_encode($users));

?>
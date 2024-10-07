<?php
    session_start();

    include "../../function/connect.php";

    $select = sprintf("SELECT `user_id` FROM `users` WHERE `login` = '%s'", $_SESSION['login']);
    $select_result = $connect->query($select);
    $select_row = $select_result->fetch_assoc();
    $id_user = $select_row['user_id'];

    $chars = '0123456789';
    $number = substr(str_shuffle($chars), 0, 5);

    $sql = sprintf("INSERT INTO `application`(`application_id`, `user_id`, `number`, `status`, `num_car`, `message`) VALUES (NULL, '%s', '%s', '%s', '%s', '%s')",
    $id_user, $number, "Новый", $_POST['number'], $_POST['message']);

    $connect->query($sql);

    header("Location: /profile/");
    exit;
?>
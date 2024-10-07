<?php
    session_start();

    include '../../function/connect.php';

    $data = $connect->query(sprintf("SELECT `login` FROM `users` WHERE `login` = '%s'", $_POST['login']));

    if ($data->num_rows) {
        header ("Location: /register/index.php?message=Пользователь с таким логином уже существует");
        exit;
    } else {
        $sql = sprintf("INSERT INTO `users`(`user_id`, `login`, `password`, `surname`, `name`, `patronymic`, `email`, `phone`, `role`) 
        VALUES (NULL,'%s','%s','%s','%s','%s','%s','%s','Пользователь')",
            $_POST['login'],
            $_POST['password'],
            $_POST['surname'],
            $_POST['name'],
            $_POST['patronymic'],
            $_POST['email'],
            $_POST['phone']
           
        );
        
        if(!$connect -> query($sql)){
            echo "Ошибка добавления данных";
        }

        $_SESSION['login'] = $_POST['login'];
        $_SESSION['role'] = "Пользователь";

        header ("Location: /profile/");
        exit;
    }
?>


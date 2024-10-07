<?php
include "connect.php";

function fnGetProfile($login) {
    global $connect;

        $sql = sprintf("SELECT `surname`, `name`, `patronymic`, `phone` FROM `users` WHERE `login` = '%s'", $login);
        if(!$result = $connect->query($sql)){
            echo "Ошибка получения данных";
        }

        $row = $result->fetch_assoc();
        $data = sprintf('<p><span class="fw-semibold">Фамилия:</span> %s</p>
            <p><span class="fw-semibold">Имя:</span> %s</p>
            <p><span class="fw-semibold">Отчество:</span> %s</p>
            <p><span class="fw-semibold">Телефон:</span> %s</p>',
            $row["surname"], $row["name"], $row["patronymic"], $row["phone"]);
        return $data;
}
function fnGetCardProfile($login) {

    global $connect;
    
    $select = sprintf("SELECT `user_id` FROM `users` WHERE `login` = '%s'", $login);
    $select_result = $connect->query($select);
    $select_row = $select_result->fetch_assoc();
    $id = $select_row['user_id'];

    $data = '<div class="cards">';

    $sql = sprintf("SELECT `number`, `num_car`, `message`, `status` FROM `application` INNER JOIN `users`
    ON `application`.`user_id` = `users`.`user_id` WHERE `application`.`user_id` = '%s' ORDER BY `application_id` DESC", $id);

    if(!$result = $connect->query($sql)){
        echo "Ошибка получения данных";
    }



    while($row = $result->fetch_assoc()){
        if($row['status'] == 'Отменен'){
            $data .= sprintf('<div class="card w-100 mb-3 mt-3 text-body-tertiary">
            <div class="card-body">
                <h5 class="card-title">Нарушение №%s</h5>
                <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
                <p class="card-text">%s</p>
            </div>
        </div>', $row['number'], $row['status'], $row['num_car'], $row['message']);
        }elseif($row['status'] == 'Подтвержден'){
                $data .= sprintf('<div class="card w-100 mb-3 mt-3 text-success">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold"Статус:></span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span>%s</p>
                    <p class="card-text"></p>
                </div>
            </div>', $row['number'], $row['status'], $row['num_car'], $row['message']);
        }else{
            $data .= sprintf('<div class="card w-100 mb-3 mt-3">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold"Статус:></span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>', $row['number'], $row['status'], $row['num_car'], $row['message']);
        }
    }

    $data .= "</div>";
    return $data;
}
function fnGetCardAdmin(){
    global $connect;

    $data = '<div class="cards">';

    $sql = "SELECT `application_id`, `surname`, `name`, `patronymic`, `number`, `num_car`, `message`, `status`
    FROM `application` INNER JOIN `users` ON `application`.`user_id` = `users`.`user_id` ORDER BY `application_id` DESC";

    
    if(!$result = $connect->query($sql)){
        echo "Ошибка получения данных";
    }else{
        while($row = $result->fetch_assoc()){
            if($row['status'] == 'Отменен'){
                $data .= sprintf('<div class="card w-100 mb-3 mt-3 text-body-tertiary">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>',
            $row['number'],$row['surname'], $row['name'], $row['patronymic'], $row['status'], $row['num_car'], $row['message']);
            }elseif($row['status'] == 'Подтвержден'){
                $data .= sprintf('<div class="card w-100 mb-3 mt-3 text-body-tertiary">
                <div class="card-body">
                    <h5 class="card-title">Нарушение №%s</h5>
                    <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                    <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
                    <p class="card-text">%s</p>
                </div>
            </div>',
            $row['number'],
            $row['surname'],
            $row['name'],
            $row['patronymic'],
            $row['status'],
            $row['num_car'],
            $row['message']);
            }else{
                $data .= sprintf('<div class="card w-100 mb-3 mt-3 text-body-tertiary">
                    <div class="card-body">
                        <h5 class="card-title">Нарушение №%s</h5>
                        <p class="mb-1"><span class="fw-semibold">Фамилия:</span> %s</p>
                        <p class="mb-1"><span class="fw-semibold">Имя:</span> %s</p>
                        <p class="mb-1"><span class="fw-semibold">Отчество:</span> %s</p>
                        <p class="mb-1"><span class="fw-semibold">Статус:</span> %s</p>
                        <p class="mb-1"><span class="fw-semibold">Гос номер автомобиля:</span> %s</p>
                        <p class="card-text">%s</p>
                        <div class="d-flex align-items-center justify-content-between cards_btn"> 
                            <a href="controllers/updateApplication.php?id=%s&action=success" 
                            class="card-link btn btn-success-outline mb-3 mt-3 shadow-sm p-3 rounded-pill fw-bold">Подтвердить</a>
                            <a href="controllers/updateApplication.php?id=%s&action=cancel" 
                            class="card-link btn btn-success-outline border border-success mb-3 mt-3 shadow-sm p-3 rounded-pill fw-bold">Отменить</a>
                        </div>
                    </div>
                </div>',
                $row['number'],
                $row['surname'],
                $row['name'],
                $row['patronymic'],
                $row['status'],
                $row['num_car'],
                $row['message'],
                $row['application_id'],
                $row['application_id']);
            }
        }
        $data .= "</div>";
        return $data;
    
    
}
}

?>



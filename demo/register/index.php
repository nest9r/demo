<?php
    session_start();
    if(isset($_SESSION['login'])){
        header("Location: /profile/");
        exit;
    }
    include "../inc/header.php";
?>
<section class="page">
    <div class="container p-3">
        <?php
            if(isset($_GET['message'])){
                echo "<div class='border border-danger text-danger text-center pt-4 pb-4 mb-3'>
                {$_GET['message']}
                </div>";
            }
        ?>
        <h1 class="text-center mb-3 text-success-emphasis display-1">Регистрация</h1>
        <form action="/admin/controllers/registration.php" method="post" class="m-auto needs-validation" novalidate>
            <div class="mb-3">
                <label for="surname" class="form-label fs-5">Фамилия</label>
                <input type="text" class="form-control shadow-sm p-3 " pattern="[а-яА-Я]+" id="surname" title="Фамилия может содержать только буквы." name="surname" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="name" class="form-label fs-5">Имя</label>
                <input type="text" class="form-control shadow-sm p-3 " id="name" pattern="[а-яА-Я]+" title="Имя может содержать только буквы." name="name" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="patronymic" class="form-label fs-5">Отчество</label>
                <input type="text" class="form-control shadow-sm p-3" id="patronymic" pattern="[а-яА-Я]+" name="patronymic" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="login" class="form-label fs-5">Логин</label>
                <input type="text" class="form-control shadow-sm p-3 " pattern="[a-zA-Z0-9]+" id="login" title="Логин может содержать только латинские буквы и цифры" name="login" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+7(999)-999-99-99">
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5">Пароль</label>
                <input type="password" class="form-control shadow-sm p-3 " minlength="1" id="password" name="password" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="passwordrepeat" class="form-label fs-5">Повторите пароль</label>
                <input type="password" class="form-control shadow-sm p-3 " minlength="1" id="passwordrepeat" name="passwordrepeat" required>
            </div>
            <div class="invalid-feedback">
                Поле обязательно для заполнения
            </div>
            <input type="submit" class="btn btn-success mb-3 mt-3 w-100 shadow-sm p-3 fs-2  fw-bold" value="Войти">
            
        </form>
    </div>
</section>
<?php
    include "../inc/footer.php";
?>
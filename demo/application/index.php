<?php
    session_start();
    if(!isset($_SESSION['login'])){
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
        <h1 class="text-center mb-3 text-success-emphasis display-1">Подача заявления</h1>
        <form action="/admin/controllers/addApplication.php" method="post" class="m-auto needs-validation" novalidate>
            <div class="mb-3">
                <label for="numbercar" class="form-label">Номер автомобиля</label>
                <input type="text" class="form-control" id="numbercar" name="number" placeholder="D999KE">
            </div>
            <div class="valid-feedback">
                Поле обязательно для заполнения
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fs-5">Описание</label>
                <input type="text" class="form-control shadow-sm p-3 " id="description" name="message" required>
            </div>
            <div class="valid-feedback">
                Поле обязательно для заполнения
            </div>
            <input type="submit" class="btn btn-success mb-3 mt-3 w-100 shadow-sm p-3 fs-2 rounded-pill fw-bold" value="Отправить">
            
        </form>
    </div>
</section>
<?php
    include "../inc/footer.php";
?>
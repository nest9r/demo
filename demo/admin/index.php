<?php
    session_start();
    if($_SESSION['role'] != "Администратор"){
        header("Location: /profile/");
        exit;
    }
    include "../inc/header.php";
    include "../function/function.php";
?>
<section class="page">
    <div class="container p-3">
        <h1 class="text-center mb-3 text-success-emphasis display-1">Панель администратора</h1>
        <?php echo fnGetCardAdmin();?>
    </div>
</section>
<?php
    include "../inc/footer.php";
?>
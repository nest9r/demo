<?php
    session_start();
    include "inc/header.php";
?>
<body>
    <div class="container p-3 text-center" >
        <h1 class="mt-3 mb-4 text-black display-1">Нарушениям.Нет</h1>
        <p class="p-1 pt-4 display-6 text-black">Информационная система для помощи полиции 
            по современной фиксации нарушений правил дорожного движения.
        </p>
    </div>
    <div class="container p-2 mb-5 text-center">
        <a href="/auth/" class="btn btn-success text-success-emphais bg-light w-75 p-3 fs-2 fw-bold shadow-lg text-black">
            Подать заявление
        </a>
    </div>
</body>
<?php
    include "inc/footer.php";
?>

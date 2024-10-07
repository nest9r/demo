<footer class="sticky-bottom bg-dark text-light">
    <div class="container-fluid p-3 pt-3">
        <p>@Нарушениям.Нет<br>2024</p>
    </div>
</footer>
</main>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
<script src="/assets/bootstrap/js/bootstrap.js"></script>
    <script>
    // Example starter Javascript for disabling form submissions if there are invalid fields
        (() => { 
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission 
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

                form.classList.add('was-validated') 
                }, false)
            })
            })()
    </script>
</body>

</html>
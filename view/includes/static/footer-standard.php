</div>

<?php
if (file_exists(view('includes/footer/script-'.route(0))))
    require_once  view('includes/footer/script-'.route(0));
    ?>


<script>
    function showMessage($message,$iserr = false){
        Swal.fire({
            text: $message,
            icon: $iserr ? "error":"success",
            showConfirmButton: false,
        });
    }
</script>
</body>
</html>
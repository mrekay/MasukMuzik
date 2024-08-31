<script>

    function login(){

        var formData = $('#login-form').serialize();

        $.ajax({
            dataType: "json",
            url: "/app/user/login",
            type: "POST",
            data: formData,
            success: function (response) {
                showMessage(response.message);
                setTimeout(function () {
                    window.location.href = "/";
                }, 1000);
            },
            error: function (response) {
                showMessage(response.responseJSON.message, true);
            }
        });
    }

</script>
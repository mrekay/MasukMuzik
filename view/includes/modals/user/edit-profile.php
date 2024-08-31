<style>
    #update-user-form {
        background-color: rgb(10, 13, 15);
        color: white !important;
    }
</style>
<!-- CreatePlaylist Modal -->
<div class="modal fade" id="updateUser" tabindex="-1">
    <div class="modal-dialog modal-black">
        <div class="modal-content bg-black text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Çalma Listesi Oluştur/Düzenle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="update-user-form" class="modal-body text-white">
                <input type="hidden" id="editing_playlist_id" name="playlist_id" value="0">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="col" class="text-white">Adınız</th>
                    </tr>
                    <tr>
                        <td><input name="name" type="text" placeholder="Adınızı giriniz"
                                   class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-white">Soyadınız</th>
                    </tr>
                    <tr>
                        <td><input name="surname" type="text" placeholder="Soyadınızı giriniz"
                                   class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-white">Parolanız</th>
                    </tr>
                    <tr>
                        <td><input name="password" type="password" placeholder="Boş bırakırsanız güncellenmez"
                                   class="form-control"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div class="modal-footer">
                <button onclick="updateUserInfo()" type="button" class="btn btn-primary">Güncelle</button>
            </div>
        </div>
    </div>
</div>
<script>

    function updateUserInfo() {
        $.ajax({
            dataType: 'json',
            url: 'app/user/update',
            type: 'POST',
            data: $('#update-user-form').serialize(),
            success: function (response) {
                $('#updateUser').modal('hide');
                showMessage(response.message);
            },
            error: function (response) {
                showMessage(response.responseJSON.message, true);
            }
        });

    }

   function showUpdateUser() {
            $('#updateUser').modal('show');
            $.ajax({
                dataType: 'json',
                url: 'app/user/select',
                type: 'post',
                success: function (response) {
                    $('#update-user-form input[name="name"]').val(response.data.name);
                    $('#update-user-form input[name="surname"]').val(response.data.surname);
                },
                error: function (response) {
                    showMessage(response.responseJSON.message, true);
                }
            });
        }

</script>
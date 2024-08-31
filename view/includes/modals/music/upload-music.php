<style>
    #upload-music-form {
        background-color: rgb(10, 13, 15);
        color: white !important;
    }
</style>
<!-- CreatePlaylist Modal -->
<div class="modal fade" id="uploadMusic" tabindex="-1">
    <div class="modal-dialog modal-black">
        <div class="modal-content bg-black text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Müzik Yükle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="upload-music" class="modal-body text-white">
                <input type="hidden" name="playlist_id" value="0">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="col" class="text-white">Müzik adı</th>
                    </tr>
                    <tr>
                        <td><input name="music_name" type="text" placeholder="Çalma listesi adı giriniz"
                                   class="form-control"></td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-white">Müzik Dosyası</th>
                    </tr>
                    <tr>
                        <td><input name="music_file" type="file" class="form-control"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div class="modal-footer">
                <button onclick="uploadMusic()" type="button" class="btn btn-primary btn-music-upload">Yükle</button>
            </div>
        </div>
    </div>
</div>
<script>

    function uploadMusic() {
        var formData = new FormData();
        formData.append('music_name',$('#upload-music input[name="music_name"]').val());
        formData.append('playlist_id',$('.playlist-content').attr('data-id'));
        formData.append('music_file',$('#upload-music input[name="music_file"]')[0].files[0]);
        console.log($('#upload-music input[name="music_file"]')[0].files[0])

        $.ajax({
            dataType: 'json',
            url: 'app/music/upload',
            type: 'POST',
            data: formData,
            processData: false,  // jQuery'nin veriyi işlemesini engeller
            contentType: false,  // İçerik türünün otomatik olarak ayarlanmasını engeller
            success: function (response) {
                getPlayLists();
                reloadMusics();
                $('#uploadMusic').modal('hide');
                $('.btn-music-upload').addClass('disabled');
                resetUploadMusicForm();

                showMessage(response.message);
            },
            error: function (response) {
                showMessage(response.responseJSON.message, true);
            }
        });
    }

    function showUploadMusic() {
        resetUploadMusicForm();
        $('#uploadMusic').modal('show');
    }

    function resetUploadMusicForm() {
        $('.btn-music-upload').removeClass('disabled');
        $('#upload-music').trigger('reset');
    }

</script>
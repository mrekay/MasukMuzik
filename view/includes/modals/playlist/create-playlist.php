<style>
    #create-playlist-form {
        background-color: rgb(10, 13, 15);
        color: white !important;
    }
</style>
<!-- CreatePlaylist Modal -->
<div class="modal fade" id="createPlaylist" tabindex="-1">
    <div class="modal-dialog modal-black">
        <div class="modal-content bg-black text-white">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Çalma Listesi Oluştur/Düzenle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="create-playlist-form" class="modal-body text-white">
                <input type="hidden" id="editing_playlist_id" name="playlist_id" value="0">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th scope="col" class="text-white">Çalma listesi adı</th>
                    </tr>
                    <tr>
                        <td><input name="playlist_name" type="text" placeholder="Çalma listesi adı giriniz"
                                   class="form-control"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div class="modal-footer">
                <button onclick="createPlaylist()" type="button" class="btn btn-primary">Oluştur</button>
            </div>
        </div>
    </div>
</div>
<script>

    function createPlaylist() {
        $.ajax({
            dataType: 'json',
            url: 'app/playlist/update',
            type: 'POST',
            data: $('#create-playlist-form').serialize(),
            success: function (response) {
                getPlayLists();
                $('#createPlaylist').modal('hide');
                if ($('#editing_playlist_id').val()>0)
                    showPlaylist($('#editing_playlist_id').val());
                resetCreatePlaylistForm();
                showMessage(response.message);
            },
            error: function (response) {
                showMessage(response.responseJSON.message, true);
            }
        });

    }

    function showCreatePlayList() {
        $('#createPlaylist').modal('show');
    }

    function resetCreatePlaylistForm() {
        $('#editing_playlist_id').val(0);
        $('#create-playlist-form').trigger('reset');
    }

    function editPlayList(playlistID){
        resetCreatePlaylistForm();
        showCreatePlayList();
$('#editing_playlist_id').val(playlistID);
        $.ajax({
            dataType: 'json',
            url: 'app/playlist/select',
            type: 'POST',
            data: {playlist_id: playlistID},
            success: function (response) {
                $('#create-playlist-form input[name="playlist_name"]').val(response.data.playlist_info.name);
            },
            error: function (response) {
                showMessage(response.responseJSON.message, true);
            }
        });
    }

</script>
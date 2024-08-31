<?php

$music = new music();
if ($action == "upload") {

    $name = $req->post('music_name');
    $playlist_id = $req->post('playlist_id');
    $file = $_FILES['music_file'];


    if (empty($name)) {
        returnErrorMessage("Müzik ismi boş olamaz.");
    }

    if (empty($playlist_id)) {
        returnErrorMessage("Geçersiz Playlist");
    }

    if (empty($file)) {
        returnErrorMessage("Dosya seçilmedi.");
    }

    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (!in_array($file_extension, ['mp3', 'ogg', 'wav'])) {
        returnErrorMessage("Geçersiz dosya formatı. Sadece mp3, ogg ve wav kabul edilmektedir.");
    }

    $user_dir = "user_files/" . $CurrentUser->id;
    if (!file_exists($user_dir)) {
        mkdir($user_dir, 0777, true);
    }

    $music_dir = $user_dir . "/musics";
    if (!file_exists($music_dir)) {
        mkdir($music_dir, 0777, true);
    }

    $unique_id = uniqid();

    $new_file_name = $music_dir . "/" . $unique_id . "." . $file_extension;

    if (!move_uploaded_file($file['tmp_name'], $new_file_name)) {
        returnErrorMessage("Dosya yüklenirken bir hata oluştu.");
    } else {

        // Set the properties of the music class
        $music->name = $name;
        $music->path = $new_file_name;
        $music->user_id = $CurrentUser->id;
        $music->unique_id = $unique_id;

        // Add the music
        $music_id = $music->addMusic();
        $music->id = $music_id;
        $music->addToPlaylist($playlist_id);

        returnSuccessMessage("Müzik başarıyla yüklendi.");
    }

} else if ($action=="delete"){
    $pl_id = $req->post('music_id');

    if (!empty($pl_id) && $pl_id > 0 && !is_numeric($pl_id)) {
        returnErrorMessage('Geçersiz Müzik', 400);
    }

    $music->id = $pl_id;
    $music->user_id = $CurrentUser->id;
    $music->deleteMusic();

    returnSuccessMessage('İşlem başarıyla gerçekleştirildi');

}
else {
    return returnErrorMessage("Geçersiz İşlem");
}
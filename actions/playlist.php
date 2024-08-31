<?php

$pl = new playlist();
if ($action == "selectList") {

    $pl_list = $pl->selectList($CurrentUser->id);

    returnSuccessMessage('İşlem başarıyla gerçekleştirildi', $pl_list);
} else if ($action == "select") {

    $pl_id = $req->post('playlist_id');

    if (!empty($pl_id) && $pl_id > 0 && !is_numeric($pl_id)) {
        returnErrorMessage('Geçersiz Playlist', 400);
    }

    $pl->id = $pl_id;
    $pl->user_id = $CurrentUser->id;
    $playlist_info= $pl->select();

    $data = [
        'playlist_info' => $playlist_info,
        'playlist_musics' => $pl->getMusics()
    ];


    returnSuccessMessage('İşlem başarıyla gerçekleştirildi', $data);
}  else if ($action == "update") {
    $pl_id = $req->post('playlist_id');
    $pl_name = $req->post('playlist_name');

    if (empty($pl_name)) {
        returnErrorMessage('Playlist Adı Boş Olamaz', 400);
    }

    $pl->name = $pl_name;
    $pl->user_id = $CurrentUser->id;

    if ($pl_id <= 0)
        $pl->insert();
    else {
        $pl->id = $pl_id;
        $pl->update();
    }

    returnSuccessMessage('İşlem başarıyla gerçekleştirildi');

} else if ($action=="delete"){
    $pl_id = $req->post('playlist_id');

    if (!empty($pl_id) && $pl_id > 0 && !is_numeric($pl_id)) {
        returnErrorMessage('Geçersiz Playlist', 400);
    }

    $pl->id = $pl_id;
    $pl->user_id = $CurrentUser->id;
    $pl->delete();

    returnSuccessMessage('İşlem başarıyla gerçekleştirildi');

} else{
    return returnErrorMessage("Geçersiz İşlem");
}
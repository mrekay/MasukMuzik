<?php

class playlist
{

    public $id,$name,$user_id,$is_private,$create_date;

    public function select(){
        global $db;
        $sql = "SELECT * FROM tbl_playlists WHERE id = :id AND user_id = :user_id";

        $params = [
            'id' => $this->id,
            'user_id' => $this->user_id
        ];

        $result = $db->query($sql, $params)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function insert(){
        global $db;

        $data = [
            'name' => $this->name,
            'user_id' => $this->user_id,
            'is_private' => $this->is_private??0
        ];

        $db->insert('tbl_playlists', $data);
    }

    public function update(){
        global $db;

        $data = [
            'name' => $this->name,
            'is_private' => $this->is_private??0
        ];

        $condition = "user_id = :user_id AND id = :playlist_id";

        $params = [
            'user_id' => $this->user_id,
            'playlist_id' => $this->id
        ];

        $db->update('tbl_playlists', $data, $condition, $params);
    }

    public function delete(){
        global $db;

        $condition = "user_id = :user_id AND id = :playlist_id";

        $params = [
            ':user_id' => $this->user_id,
            ':playlist_id' => $this->id
        ];

        $db->delete('tbl_playlists', $condition, $params);
    }

    public function selectList($user_id){
        global $db;
        $sql = "SELECT * FROM tbl_playlists WHERE user_id = :user_id";

        $params = [
            'user_id' => $user_id
        ];

        $result = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getMusics(){
        global $db;
        $sql = "SELECT m.* FROM tbl_muzik_playlist mp
            JOIN tbl_muzik m ON mp.music_id = m.id
            WHERE mp.playlist_id = :playlist_id";

        $params = [
            'playlist_id' => $this->id,
        ];

        $result = $db->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

}
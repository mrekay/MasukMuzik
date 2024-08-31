<?php

class music
{

    public $id,$name,$unique_id,$path,$user_id,$muzik_length,$create_date;

    public function getMusic(){
        global $db;
        $sql = "SELECT * FROM tbl_muzik WHERE id = :id AND user_id = :user_id";

        $params = [
            'id' => $this->id,
            'user_id' => $this->user_id
        ];

        $result = $db->query($sql, $params)->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addMusic()
    {
       global $db;

        $data = [
            'unique_id' => $this->unique_id,
            'name' => $this->name,
            'path' => $this->path,
            'user_id' => $this->user_id
            ];

        $db->insert('tbl_muzik', $data);
        return $db->lastInsertId();
    }

    public function addToPlaylist($playlist_id)
    {
        global $db;

        $data = [
            'playlist_id' => $playlist_id,
            'music_id' => $this->id,
            'user_id' => $this->user_id
        ];

        $db->insert('tbl_muzik_playlist', $data);
    }

    public function deleteMusic()
    {
        global $db;

        /* müziği sil */
        $condition = "user_id = :user_id AND id = :id";

        $params = [
            'user_id' => $this->user_id,
            'id' => $this->id
        ];

        $db->delete('tbl_muzik', $condition, $params);


        /* playlistlerdende  sil */
        $condition = "user_id = :user_id AND music_id = :music_id";

        $params = [
            'user_id' => $this->user_id,
            'music_id' => $this->id
        ];

        $db->delete('tbl_muzik_playlist', $condition, $params);
    }

    public function updateMusic()
    {
        global $db;

        // Prepare the data
        $data = [
            'name' => $this->name
        ];

        // Prepare the condition
        $condition = "user_id = :user_id AND id = :music_id";

        // Prepare the parameters
        $params = [
            'user_id' => $this->user_id,
            'music_id' => $this->id
        ];

        // Execute the query and update the record
        $db->update('tbl_muzik', $data, $condition, $params);
    }

}
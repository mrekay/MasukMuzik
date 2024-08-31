<?php

class user
{

    public $id,$name,$surname,$username,$password,$create_date;

    public function select()
    {
        global $db;

        $query = "SELECT * FROM tbl_users WHERE id = :id";
        $params = ['id' => $this->id];

        $result = $db->query($query, $params)->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->surname = $result['surname'];
            $this->username = $result['username'];
            $this->password = $result['password'];
            $this->create_date = $result['create_date'];
        }
    }

    public function hasUser($username){
        global $db;

        $query = "SELECT * FROM tbl_users WHERE username = :username";
        $params = ['username' => $username];

        $result = $db->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        return $result ? true : false;
    }

    public function register($username,$name,$surname,$password){
        global $db;

        $data = [
            'username' => $username,
            'name' => $name,
            'surname' => $surname,
            'password' => $password
        ];

        $db->insert('tbl_users', $data);
        return $db->lastInsertId();
    }

    public function loginCheck($username, $password)
    {
        global $db;

        $query = "SELECT * FROM tbl_users WHERE username = :username AND password = :password";
        $params = ['username' => $username, 'password' => $password];

        $result = $db->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        return $result['id'] ?? 0;
    }

    public function update(){
        global $db;

        $data = [
            'name' => $this->name,
            'surname' => $this->surname,
            'password' => $this->password
        ];

        $condition = "id = :id";
        $params = ['id' => $this->id];

        $db->update('tbl_users', $data, $condition, $params);
    }

}
<?php

class database
{
    private $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function insert($table, $data)
    {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        $this->query($sql, $data);
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data, $condition, $params = [])
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key=:$key,";
            $params[":$key"] = $value; // Add the value to the params array
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE $condition";

        $this->query($sql, $params);
    }

    public function delete($table, $condition, $params = [])
    {
        $sql = "DELETE FROM $table WHERE $condition";
        $this->query($sql, $params);
    }
}
<?php
require_once 'Koneksi.php';

class CrudRepo
{
    private $conn;

    public function getConnection()
    {
        return $this->conn;
    }

    private $table;

    public function __construct($table)
    {
        $db = new Koneksi();
        $this->conn = $db->connect();
        $this->table = $table;
    }

    public function getAll()
    {
        $result = $this->conn->query("SELECT * FROM {$this->table}");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getByNik($nik)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE NIK = ?");
        $stmt->bind_param("s", $nik);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), '?'));
        $types = str_repeat("s", count($data));
        $values = array_values($data);

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }

    public function update($nik, $data)
    {
        $fields = implode(" = ?, ", array_keys($data)) . " = ?";
        $types = str_repeat("s", count($data)) . "s";
        $values = array_values($data);
        $values[] = $nik;

        $stmt = $this->conn->prepare("UPDATE {$this->table} SET $fields WHERE NIK = ?");
        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }

    public function delete($nik)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE NIK = ?");
        $stmt->bind_param("s", $nik);
        return $stmt->execute();
    }
}

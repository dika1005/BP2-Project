<?php
class Koneksi
{
    private $host = 'localhost';
    private $dbname = 'pweb2';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // Cek error koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

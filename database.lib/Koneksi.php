<?php

class Koneksi {
    private $host = "localhost";
    private $db = "pweb2";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        } else {
            echo "Koneksi berhasil";
        }
        
        return $this->conn;
    }
}

new Koneksi();

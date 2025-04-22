<?php
require_once 'Koneksi.php'; // Sesuaikan path ke file Koneksi.php

try {
    $db = new Koneksi(); // Pastikan class Koneksi ada di file Koneksi.php
    $connection = $db->getConnection(); // Asumsikan ada method getConnection()

    $query = "SELECT * FROM admin"; // Query untuk mengambil semua data dari tabel admin
    $stmt = $connection->prepare($query);
    $stmt->execute();

    $result = $stmt->get_result(); // Ambil hasil query sebagai objek mysqli_result
    $results = $result->fetch_all(MYSQLI_ASSOC); // Ambil hasil sebagai array asosiatif

    if (!empty($results)) {
        foreach ($results as $row) {
            echo "<pre>";
            print_r($row); // Cetak setiap baris data
            echo "</pre>";
        }
    } else {
        echo "Tabel admin kosong.";
    }
} catch (Exception $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
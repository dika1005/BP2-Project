<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);

    margin: 0;
    padding: 20px;
}

.container {
    max-width: 500px;
    background: linear-gradient(135deg, #9FB3DF ,rgb(139, 183, 255)100%);
    margin: auto;
    padding: 37px;
    border-radius: 5px;
}

h2 {
    text-align: center;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"],
input[type="number"],
select,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color:rgb(164, 53, 238);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #4cae4c;
}
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Registrasi Pengguna</h2>
        <form action="register.php" method="POST">
            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="umur">Umur:</label>
            <input type="number" id="umur" name="umur" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <label for="tinggi_badan">Tinggi Badan (cm):</label>
            <input type="number" id="tinggi_badan" name="tinggi_badan" required>

            <label for="berat_badan">Berat Badan (kg):</label>
            <input type="number" id="berat_badan" name="berat_badan" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <input type="submit" value="Daftar">
        </form>
    </div>
</body>
</html>
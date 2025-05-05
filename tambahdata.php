<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($koneksi, "INSERT INTO tb_mahasiswa (npm, nama, prodi, email, alamat) 
                              VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')");

    if ($insert) {
        // Redirect langsung tanpa alert
        header("Location: tampildata.php");
        exit;
    } else {
        $error_message = "Gagal menambahkan data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <style>
        /* CSS sama seperti sebelumnya */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 40px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #444;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        button {
            margin-top: 20px;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
        }
        .back:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Data Mahasiswa</h2>
    <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
    <form method="POST">
        <label>NPM</label>
        <input type="text" name="npm" required>

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Program Studi</label>
        <select name="prodi" required>
            <option value="">-- Pilih Prodi --</option>
            <option value="Pendidikan Informatika">Pendidikan Informatika</option>
            <option value="Pendidikan Matematika">Pendidikan Matematika</option>
            <option value="Pendidikan Biologi">Pendidikan Biologi</option>
            <option value="Pendidikan Fisika">Pendidikan Fisika</option>
            <option value="Pendidikan IPA">Pendidikan IPA</option>
            <option value="Statistika">Statistika</option>
        </select>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <button type="submit" name="submit">Simpan</button>
        <a href="index.php" class="back">← welcome</a>
    </form>
</div>
</body>
</html>

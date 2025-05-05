<?php
include 'koneksi.php';
$npm = $_GET['npm'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE npm='$npm'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f2f9ff, #e0ecff);
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
            background-color: #ffc107;
            color: #333;
            border: none;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #e0a800;
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
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <label>NPM</label>
        <input type="text" name="npm" value="<?= $data['npm'] ?>" readonly>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Program Studi</label>
        <input type="text" name="prodi" value="<?= $data['prodi'] ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea>

        <button type="submit" name="update">Update</button>
        <a href="index.php" class="beck">kembali ke daftar</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        // Tidak perlu mendeklarasikan ulang $npm, karena sudah ada dalam GET
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        $update = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET nama='$nama', prodi='$prodi', email='$email', alamat='$alamat' WHERE npm='$npm'");
        if ($update) {
            echo "<script>alert('Data berhasil diupdate'); window.location='tampildata.php';</script>";
        } else {
            echo "<script>alert('Gagal update data');</script>";
        }
    }
    ?>
</div>
</body>
</html>

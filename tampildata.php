<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef3f7;
            margin: 0;
            padding: 30px;
        }
        .container {
            max-width: 960px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: #333;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-add {
            background-color: #28a745;
            color: white;
            margin-bottom: 20px;
            display: inline-block;
        }
        .btn-add:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Data Mahasiswa Baru</h2>

    <!-- Tombol Tambah Data -->
    <a href="tambahdata.php" class="btn btn-add">+ Tambah Data</a>
     <a href="index.php" class="btn btn-add">+Welcome</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa ORDER BY npm ASC");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['npm']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['prodi']; ?></td>
                <td><?= $data['email']; ?></td>
                <td><?= $data['alamat']; ?></td>
                <td>
                    <a href="editdata.php?npm=<?= $data['npm']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapustada.php?npm=<?= $data['npm']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>

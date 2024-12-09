<?php
require_once 'customer.php';
require_once 'BarangCustomer.php';

$barangCustomer = new barangCustomer();

// Menangani form tambah customer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $No_Telepon = $_POST['No_Telepon'];
    $barangCustomer->tambahCustomer($nama, $alamat, $No_Telepon);
    header('Location: index.php'); // Redirect untuk mencegah resubmission
}

// Menangani penghapusan customer
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $barangCustomer->hapusCustomer($id);
    header('Location: index.php'); // Redirect setelah menghapus
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Customer</title>
</head>
<body>
<div class="container">
    <h1>Pencatatan Customer</h1>
    <form method="POST" action="">
        <div>
            <label for="nama">Nama Customer:</label><br>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <div>
            <label for="No_Telepon">No Telepon:</label><br>
            <input type="text" id="No_Telepon" name="No_Telepon" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-add">Tambah Customer</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barangCustomer->getCustomer() as $customer): ?>
                <tr>
                    <td><?= $customer['id'] ?></td>
                    <td><?= $customer['nama'] ?></td>
                    <td><?= $customer['alamat'] ?></td>
                    <td><?= $customer['No_Telepon'] ?></td>
                    <td>
                        <a href="?hapus=<?= $customer['id'] ?>" class="btn btn-delete">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>

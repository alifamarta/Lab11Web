<?php
require_once '../../class/database.php';
include_once '../../class/form.php';

$config = include '../../class/config.php';
$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);

if (isset($_POST['submit'])) {
    $nama = $db->escapeString($_POST['nama']);
    $kategori = $db->escapeString($_POST['kategori']);
    $harga_jual = $db->escapeString($_POST['harga_jual']);
    $harga_beli = $db->escapeString($_POST['harga_beli']);
    $stok = $db->escapeString($_POST['stok']);

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok,)";
    $sql .= "VALUES ('{$nama}, {$kategori}, {$harga_jual}, {$harga_beli}, {$stok}')";

    $result = $db->query($sql);

    if (!$result) {
        echo "error"; 
    } else {
        header('location: index.php');
    }
}
?>

<?php include '../../template/header.php'; ?>

<div class="main">
    <h1>Tambah Barang</h1>
    <form action="tambah.php" method="post" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" />
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <option value="Komputer">Komputer</option>
                <option value="Elektronik">Elektronik</option>
                <option value="Handphone">Handphone</option>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" />
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" />
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" />
        </div>
        <div class="submit">
            <input type="submit" name="submit" value="Simpan">
        </div>
    </form>
</div>

<?php 
    include '../../template/footer.php'; 
    $db->closeConnection();
?>
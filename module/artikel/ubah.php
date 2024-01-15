<?php
error_reporting(E_ALL);
require '../../class/database.php';
include '../../class/form.php';

$config = include '../../class/config.php';
$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);

if (isset($_POST['submit'])) {
    $nama = $db->escapeString($_POST['nama']);
    $kategori = $db->escapeString($_POST['kategori']);
    $harga_jual = $db->escapeString($_POST['harga_jual']);
    $harga_beli = $db->escapeString($_POST['harga_beli']);
    $stok = $db->escapeString($_POST['stok']);

    $sql = 'UPDATE data_barang SET ';
    $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
    $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
    $sql .= "WHERE id_barang = '{$id}'";
    $result = $db->query($sql);

    header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = $db->query($sql);
if (!$result)
    die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

?>

<?php include '../../template/header.php' ?>

<h1>Ubah Barang</h1>
<div class="main">
    <form method="post" action="ubah.php" enctype="multipart/form-data">
        <div class="input">
            <label>Nama Barang</label>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
        </div>
        <div class="input">
            <label>Kategori</label>
            <select name="kategori">
                <?php
                    $option = [
                        'Komputer' => 'Komputer',
                        'Elektronik' => 'Elektronik',
                        'Hand Phone' => 'Hand Phone'
                    ];
                    echo form::generateUbah($data['kategori'], $option);
                ?>
            </select>
        </div>
        <div class="input">
            <label>Harga Jual</label>
            <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" />
        </div>
        <div class="input">
            <label>Harga Beli</label>
            <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" />
        </div>
        <div class="input">
            <label>Stok</label>
            <input type="text" name="stok" value="<?php echo $data['stok']; ?>" />
        </div>
        <div class="submit">
            <input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>" />
            <input type="submit" name="submit" value="Simpan" />
        </div>
    </form>
</div>

<?php 
    require '../../template/footer.php';
    $db->closeConnection(); 
?>
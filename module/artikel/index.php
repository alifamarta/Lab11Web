<?php
require '../../class/database.php';
include '../../class/form.php';

$config = include '../../class/config.php';

$db = new Database($config['host'], $config['username'], $config['password'], $config['db_name']);
$sql = 'SELECT * FROM data_barang';
$result = $db->query($sql);
?>

<?php
require '../../template/header.php';
?>
<div class="main">
    <h1>Data Barang</h1>
        <a href="tambah.php">Tambah Barang</a>
        <?php
            echo form::generateTable($result)
            ?>
</div>
<?php 
    require '../../template/footer.php';
    $db->closeConnection();
?>

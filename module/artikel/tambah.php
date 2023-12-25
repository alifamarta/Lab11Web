<?php
require_once '../../class/database.php';
include_once '../../class/form.php';

$db = new Database();

if (isset($_POST['submit'])) {
    $data_mhs = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'no_telp' => $_POST['no telp'],
        'alamat' => $_POST['alamat']
    ];

    $db->insert('mahasiswa', $data_mhs);
}

include '../../template/header.php';
$form = new Form("", "Input Form");
$form ->addField('nim', 'Nim');
$form->addField('nama', 'Nama');
$form->addField('no telp', 'Nomor Telepon');
$form->displayForm();
include '../../template/footer.php';
<?php
error_reporting(E_ALL);
require '../../class/database.php';
require '../../class/config.php';

$db = new Database("localhost", "root", "", "latihan1");

$id = $_GET['id'];
$result = $db->query("DELETE FROM data_barang WHERE id_barang = '{$id}'");
header('location: index.php');

$db->closeConnection();
?>
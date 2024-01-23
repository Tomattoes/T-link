<?php 
include '../koneksi.php';

$user = $_GET['user'];
$id = $_GET['id'];
$tgl = date('Y-m-d');
mysqli_query($koneksi, "INSERT INTO likefoto VALUES('', '$id', '$user', '$tgl')");
header("Location:view.php?id=$id");
?>
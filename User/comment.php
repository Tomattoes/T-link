<?php 
include '../koneksi.php';

$user = $_POST['user'];
$id = $_POST['id'];
$komentar = $_POST['komentar'];
$tgl = date('Y-m-d');
mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('', '$id', '$user', '$komentar', '$tgl')");
header("Location:view.php?id=$id");
?>
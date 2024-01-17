<?php 
$id = $_GET['id'];

include '../koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID = '$id' ") ;
$row = mysqli_fetch_array($data);

$foto = $row['Foto'];
if(file_exists('../file/'.$foto))
{
    unlink('../file/'.$foto) ;
}
$query = "DELETE FROM foto where FotoID ='$id'";
$result = mysqli_query($koneksi, $query);

if(!$result) {
    die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
}else {
    echo "<script>alert('Data berhasil dihapus!'); window.location='create.php';</script>";
}
?>
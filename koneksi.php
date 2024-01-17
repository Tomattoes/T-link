<?php 
$koneksi = mysqli_connect("localhost","root","","p_gallery");
if (mysqli_connect_errno()) {
    echo "Koneksi Database Gagal : " . mysqli_connect_error();
}
?>
<?php

include '../koneksi.php';

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(UserID) as kodeTerbesar, Email, Username FROM user");
$data = mysqli_fetch_array($query);

$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tanggal'];
$tgl = $_POST['tgl_pendaftaran'];
$role = 'user';

if ($email == $data['Email']) {
    echo "<script>
    alert('Email ini sudah digunakan, silahkan gunakan Email lain!'); window.location='../sign-up.php';
    </script>";
} else if ($username == $data['Username']) {
    echo "<script>
    alert('Username ini sudah digunakan, silahkan gunakan Username lain!'); window.location='../sign-up.php';
    </script>";
} else {
    mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password','$email','$nama','$alamat','$tanggal','$tgl','$role')");
    echo "<script>
    alert('Berhasil Sign-up, silakan Log In!'); window.location='../sign-in.php';
    </script>";
}

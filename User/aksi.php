<?php
include '../koneksi.php';
if ($_POST['upload']) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $user = $_POST['user'];

    if (isset($_POST['publish'])) {
        $publish = $_POST['publish'];
    } else {
        $publish = 0;
    }

    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $lokasi = 'file/';
    $album = $_POST['IdAlbum'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 9000000) {
            move_uploaded_file($file_tmp, '../file/' . $nama);
            $query = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$nama','$judul','$deskripsi','$tanggal','$lokasi','$publish','$album','$user')");
            if ($query) {
                echo "<script>alert('FILE BERHASIL DI UPLOAD'); window.location='create.php'</script>";
            } else {
                echo "<script>alert('GAGAL MENGUPLOAD GAMBAR'); window.location='foto.php'</script>";
            }
        } else {
            echo "<script>alert('UKURAN FILE TERLALU BESAR'); window.location='foto.php'</script>";
        }
    } else {
        echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); window.location='foto.php'</script>";
    }
} elseif ($_POST['simpan']) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $user = $_POST['user'];

    $query = mysqli_query($koneksi, "INSERT INTO album VALUES('', '$judul','$deskripsi','$tanggal','$user')");
    if ($query) {
        echo "<script>alert('ALBUM BERHASIL DI BUAT'); window.location='create.php'</script>";
    } else {
        echo "<script>alert('GAGAL MEMBUAT ALBUM'); window.location='album.php'</script>";
    }
} elseif ($_POST['albm']) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $user = $_POST['user'];
    $publish = 0;
    $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $lokasi = 'file/';
    $album = $_POST['album'];
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 9000000) {
            move_uploaded_file($file_tmp, '../file/' . $nama);
            $query = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$nama','$judul','$deskripsi','$tanggal','$lokasi','$publish','$album','$user')");
            if ($query) {
                echo "<script>alert('FILE BERHASIL DI UPLOAD'); window.location='viewAlbum.php?id=$album;'</script>";
            } else {
                echo "<script>alert('GAGAL MENGUPLOAD GAMBAR'); window.location='FotoAlbum.php'</script>";
            }
        } else {
            echo "<script>alert('UKURAN FILE TERLALU BESAR'); window.location='FotoAlbum.php'</script>";
        }
    } else {
        echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); window.location='FotoAlbum.php'</script>";
    }
}

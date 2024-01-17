<?php
session_start();

include '../koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM user WHERE Email='$email' AND Password='$password' ");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['role'] == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['NamaLengkap'] = $data['NamaLengkap'];
        $_SESSION['Email'] = $data['Email'];
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['role'] = "admin";
        header("location:../admin");
    } else if ($data['role'] == "user") {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['NamaLengkap'] = $data['NamaLengkap'];
        $_SESSION['Email'] = $data['Email'];
        $_SESSION['UserID'] = $data['UserID'];
        $_SESSION['role'] = "user";
        header("location:../user");
    } else {
        echo "<script>
    alert('Gagal Log In!'); window.location='../sign-in.php';
    </script>";
    }
} else {
    echo "<script>
    alert('Gagal Log In!'); window.location='../sign-in.php';
    </script>";
}

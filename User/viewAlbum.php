<?php
include 'layout/header.php';
$album = $_GET['id'];
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <?php
            include '../koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$album' AND UserID='$user'");
            $data = mysqli_fetch_array($sql); {
            ?>
                <h1 class="fw-light"><?= $data['NamaAlbum']; ?></h1>
                <p class="lead text-body-secondary"><?= $data['Deskripsi']; ?>.</p>
            <?php } ?>
            <p>
                <a href="FotoAlbum.php?id=<?= $album; ?>" class="btn btn-secondary my-2">Tambahkan Foto Ke Dalam Album Ini</a>
            </p>
        </div>
    </div>
</section>

<div class="album py-5 bg-body-tertiary">
    <div class="container">

        <div class="row mb-3 text-center">
            <?php
            include '../koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE AlbumID='$album' AND UserID='$user'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col-6 col-sm-3 themed-grid-col">
                    <a href="view.php?id=<?= $data['FotoID']; ?>">
                        <img src="../<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" alt="" width="160px">
                    </a>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
<?php
include 'layout/footer.php';
?>
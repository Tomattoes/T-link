<?php
include 'layout/header.php';
?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Album</h1>
            <p class="lead text-body-secondary">Buat Album dan abadikan momen berharga anda dengan mudah di Album Thread link kapanpun dan dimanapun.</p>
            <p>
                <a href="album.php" class="btn btn-primary my-2">Buat Album</a>
                <a href="foto.php" class="btn btn-secondary my-2">Upload Foto</a>
            </p>
        </div>
    </div>
</section>

<div class="album py-5 bg-body-tertiary">
    <div class="container">

        <h3 class="text-center mb-3">Album</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            include '../koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$user'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $data['NamaAlbum']; ?></text>
                        </svg>
                        <div class="card-body">
                            <p class="card-text"><?= $data['Deskripsi']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="viewAlbum.php?id=<?= $data['AlbumID']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="hapus.php?id=<?= $data['AlbumID']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Album Ini ?')" class="btn btn-sm btn-outline-secondary"><i class="bi bi-trash"></i></a>
                                </div>
                                <small class="text-body-secondary"><?= $data['TanggalDibuat']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <hr class="mt-4">

        <h3 class="text-center mb-3">Foto</h3>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            include '../koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$user'");
            while ($data = mysqli_fetch_array($sql)) {
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="../<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>">
                        <div class="card-body">
                            <h4 class="card-text"><?= $data['JudulFoto']; ?></h4>
                            <p class="card-text"><?= $data['DeskripsiFoto']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="view.php?id=<?= $data['FotoID']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                    <a href="hapus.php?id=<?= $data['FotoID']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Foto Ini ?')" class="btn btn-sm btn-outline-secondary"><i class="bi bi-trash"></i></a>
                                </div>
                                <small class="text-body-secondary"><?= $data['TanggalUnggah']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
<?php
include 'layout/footer.php';
?>
<?php
include 'layout/header.php';
$id = $_GET['id'];
?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card mb-3">
            <div class="row g-0">
                <?php
                include '../koneksi.php';
                $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$id'");
                $data = mysqli_fetch_array($sql); {
                ?>
                    <div class="col-md-4">
                        <img src="../<?= $data['LokasiFile']; ?><?= $data['Foto']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="p-2 col-6">
                                    <img src="../file/IMG-20220725-WA0001.jpg" class="img rounded-circle" width="40px" alt="">
                                    <span class="text-xl mx-2">Ye Ming.</span>
                                </div>
                                <div class="dropdown col-6 text-end">
                                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-list"></i>
                                    </a>
                                    <ul class="dropdown-menu text-small">
                                        <li><a class="dropdown-item" href="foto.php"><i class="bi bi-download"></i> Download</a></li>
                                        <li><a class="dropdown-item" href="foto.php"><i class="bi bi-plus"></i> Tambahkan Ke Album</a></li>
                                        <li><a class="dropdown-item" href="album.php"><i class="bi bi-images"></i> Publish</a></li>
                                        <li><a class="dropdown-item" href="album.php"><i class="bi bi-bookmark-check"></i> Simpan</a></li>
                                        <li><a class="dropdown-item" href="profile.php"><i class="bi bi-trash"></i> Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h3 class="card-title text-secondary"><?= $data['JudulFoto']; ?></h3>
                            <p class="card-text"><?= $data['DeskripsiFoto']; ?></p>
                            <p class="card-text" style="text-align: right;"><small class="text-body-secondary"><?= $data['TanggalUnggah']; ?></small></p>
                            <form action="comment.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="btn btn-circle btn md btn-default">
                                        <?php
                                        $user = $_SESSION['UserID'];
                                        $foto = $data['FotoID'];
                                        $sql = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE UserID='$user' and FotoID='$foto'");
                                        $cek = mysqli_num_rows($sql);
                                        if ($cek > 0) { ?>
                                            <a class="text-secondary"><i class="bi bi-heart-fill" style="color: red;"></i></a>
                                        <?php
                                        } else { ?>
                                            <a class="text-secondary" href="like.php?user=<?= $_SESSION['UserID'] ?>&id=<?= $data['FotoID'] ?>"><i class="bi bi-heart"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <input type="text" name="komentar" class="form-control" placeholder="type here to comment" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="
                                bi bi-send"></i></button>
                                    <input type="hidden" class="form-control" placeholder="type here to comment" aria-label="Recipient's username" aria-describedby="button-addon2" name="user" value="<?= $user ?>">
                                    <input type="hidden" class="form-control" placeholder="type here to comment" aria-label="Recipient's username" aria-describedby="button-addon2" name="id" value="<?= $id ?>">
                                </div>
                            </form>
                            <hr>
                            <div class="card">
                                <?php
                                include '../koneksi.php';
                                $sql = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON user.UserID=komentarfoto.UserID WHERE komentarfoto.FotoID='$id'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <div class="row p-2 m-2">
                                        <div class="col-3">
                                            <img src="../file/IMG-20220725-WA0001.jpg" class="img rounded-circle" width="25px" alt="">
                                            <span class="text-xl mx-2"><strong><?= $data['Username']; ?></strong></span>
                                        </div>
                                        <div class="col-9">
                                            <span class="text-body-secondary"><?= $data['IsiKomentar']; ?></span>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- <div class="btn-group">
                                <a href="view.php?id=<?= $data['FotoID']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                                <a href="hapus.php?id=<?= $data['FotoID']; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Foto Ini ?')" class="btn btn-sm btn-outline-secondary"><i class="bi bi-trash"></i></a>
                            </div> -->
                        </div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>
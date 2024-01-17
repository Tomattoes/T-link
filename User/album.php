<?php
include 'layout/header.php';
?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Album Foto</h5>
                <form action="aksi.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul Album</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1"></textarea>
                        <input type="hidden" name="tanggal" class="form-control" id="exampleInputPassword1" value="<?= $date; ?>">
                        <input type="hidden" name="user" class="form-control" id="exampleInputPassword1" value="<?= $user; ?>">
                    </div>
                    <input type="submit" name="simpan" value="Buat" class="btn btn-primary"></input>
                </form>
                <div class="mt-3">
                    <a href="foto.php" class="card-link">Upload Foto</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>
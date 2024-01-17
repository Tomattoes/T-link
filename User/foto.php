<?php
include 'layout/header.php';
?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Foto</h5>
                <form action="aksi.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" id="inputGroupFile02">
                        <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul Foto</label>
                        <input type="text" name="judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control" id="exampleInputPassword1"></textarea>
                        <input type="hidden" name="tanggal" class="form-control" id="exampleInputPassword1" value="<?= $date; ?>">
                        <input type="hidden" name="user" class="form-control" id="exampleInputPassword1" value="<?= $user; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Publish Foto</label>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Ya</label>
                            <input type="radio" value="1" name="publish" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <label for="exampleInputEmail2" class="form-label">Tidak</label>
                            <input type="radio" value="0" name="publish" id="exampleInputEmail2" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tambahkan ke Album</label>
                        <select name="IdAlbum" id="" class="form-control">
                            <option value="0"></option>
                            <?php
                            include '../koneksi.php';
                            $sql = mysqli_query($koneksi, "SELECT * FROM album");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?= $data['AlbumID']; ?>"><?= $data['NamaAlbum']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <input type="submit" name="upload" value="Upload" class="btn btn-primary"></input>
                </form>
                <div class="mt-3">
                    <a href="album.php" class="card-link">Buat Album Foto</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>
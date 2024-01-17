<?php
include 'layout/header.php';
$album = $_GET['id'];
?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Foto</h5>
                <form action="aksi.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="file" name="file" class="form-control" id="inputGroupFile02">
                        <input type="hidden" name="album" class="form-control" id="inputGroupFile02" value="<?= $album; ?>">
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
                    <input type="submit" name="albm" value="Upload" class="btn btn-primary"></input>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php';
?>
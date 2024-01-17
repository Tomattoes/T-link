<?php 
include 'layout/header.php';
$id = $_SESSION['UserID'];
?>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <?php 
                    include '../koneksi.php';
                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=$id");
                    $data = mysqli_fetch_array($sql); {
                    ?>
                    <img src="../assets/img/IMG-20220725-WA0001.jpg" alt="" class="rounded-circle" width="200px">
                    <h1 class="fw-light"><?= $data['NamaLengkap']; ?></h1>
                    <p class="lead text-body-secondary"><?= $data['Email']; ?></p>
                    <p class="lead text-body-black">100 following</p>
                    <p>
                        <a href="#" class="btn btn-primary my-2">Share</a>
                        <a href="#" class="btn btn-secondary my-2">Edit Profile</a>
                    </p>
                    <?php } ?>
                </div>
            </div>
        </section>

<?php include 'layout/footer.php' ?>

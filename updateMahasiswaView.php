<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    .wrapper {
        width: 500px;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Isikan data di bawah.</p>

                    <?php
                        // Periksa apakah ada parameter yang diterima dari POST
                        if(isset($_POST['nim']) && isset($_POST['kode_mk']) && isset($_POST['nama']) && isset($_POST['nilai'])) {
                            // Ambil nilai yang dipassing dari POST
                            $nim = $_POST['nim'];
                            $kode_mk = $_POST['kode_mk'];
                            $nama = $_POST['nama'];
                            $nilai = $_POST['nilai'];
                        } else {
                            echo "<p>Parameter tidak ditemukan.</p>";
                        }
                    ?>

                    <form action="updateMahasiswaDo.php" method="post">
                        <!-- Gunakan input hidden untuk mem-passing nim -->
                        <input type="hidden" name="nim" value="<?php echo $nim;?>">
                        <input type="hidden" name="kode_mk" value="<?php echo $nim;?>">
                        <label>Nama Mahasiswa</label>
                        <p><?php echo $nama;?></p>
                        <label>Kode MK</label>
                        <p><?php echo $kode_mk;?></p>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="mobile" name="nilai" class="form-control" value="<?php echo $nilai; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
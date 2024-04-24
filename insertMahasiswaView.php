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
                        <h2>Add New Data</h2>
                    </div>
                    <p>isikan data di bawah ini.</p>
                    <form action="insertMahasiswaDo.php" method="post">
                        <?php

                            $host = 'localhost';
                            $user = 'root';
                            $pass = ''; 
                            $db   = 'sait_db_uts';

                            $koneksi = mysqli_connect($host, $user, $pass, $db);

                            if (mysqli_connect_errno()) {
                                echo "Koneksi database gagal: " . mysqli_connect_error();
                                exit();
                            }

                            $query = "SELECT * from mahasiswa";
                            $query2 = "SELECT * from matakuliah";
                            $result = mysqli_query($koneksi, $query);

                     
                            echo '<div class="form-group">';
                            echo '<label>Nama Mahasiswa</label>';
                            echo '<select name="nim" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row["nim"].'">'.$row["nama"].'</option>';
                            }

                            echo '</select>';
                            echo '</div>';

                            $result = mysqli_query($koneksi, $query2);


                            echo '<div class="form-group">';
                            echo '<label>kode_mk</label>';
                            echo '<select name="kode_mk" class="form-control">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="'.$row["kode_mk"].'">'.$row["kode_mk"].'</option>';
                            }

                            echo '</select>';
                            echo '</div>';


                            echo '<div class="form-group">';
                            echo '<label>Nilai</label>';
                            echo '<input type="text" name="nilai" class="form-control">';
                            echo '</div>';
                            // curl_close($curl);
                            ?>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
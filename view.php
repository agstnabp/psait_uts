<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .wrapper{
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color: #fff;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .add-button {
            margin-bottom: 20px;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            border-top: none !important;
            border-bottom: 1px solid #dee2e6 !important;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="float-left">Data Nilai Mahasiswa SV TRPL </h2>
                            <a href="insertMahasiswaView.php" class="btn btn-light float-right add-button"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    <div class="scroll">
                        <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_uts/api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Nama</th>";
                                        echo "<th>Nim</th>";
                                        echo "<th>Kode_mk</th>";
                                        echo "<th>Nilai</th>";
                                        echo "<th>Aksi</th>";

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["nama"]} </td>";
                                        echo "<td> {$json["data"][$i]["nim"]} </td>";
                                        echo "<td> {$json["data"][$i]["kode_mk"]} </td>";
                                        echo "<td> {$json["data"][$i]["nilai"]} </td>";
                                        echo "<td>";
                                        echo '<form action="updateMahasiswaView.php" method="post">';
                                            echo '<input type="hidden" name="nim" value="'.$json["data"][$i]["nim"].'">';
                                            echo '<input type="hidden" name="kode_mk" value="'.$json["data"][$i]["kode_mk"].'">';
                                            echo '<input type="hidden" name="nama" value="'.$json["data"][$i]["nama"].'">';
                                            echo '<input type="hidden" name="nilai" value="'.$json["data"][$i]["nilai"].'">';
                                            echo '<button type="submit" class="btn btn-link" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></button>';
                                        echo '</form>';
                                        echo '<form action="deleteMahasiswaDo.php" method="post">';
                                            echo '<input type="hidden" name="nim" value="'.$json["data"][$i]["nim"].'">';
                                            echo '<input type="hidden" name="kode_mk" value="'.$json["data"][$i]["kode_mk"].'">';
                                            echo '<input type="hidden" name="nama" value="'.$json["data"][$i]["nama"].'">';
                                            echo '<input type="hidden" name="nilai" value="'.$json["data"][$i]["nilai"].'">';
                                            echo '<button type="submit" class="btn btn-link" " title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo '</form>';
                                        // echo '<a href="deleteMahasiswaDo.php?id_mhs='. $json["data"][$i]["id_mhs"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        // echo '<a href="updateMahasiswaView.php?nim='.urlencode(json_encode($json["data"][$i]['nim'])).  ' class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p>
    <p>
    <p>


</body>

</html>
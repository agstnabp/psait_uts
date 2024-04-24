<?php


if(isset($_POST['nim']) && isset($_POST['kode_mk']) && isset($_POST['nilai'])) {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    // echo "<p>NIM: $nim</p>";
    // echo "<p>Kode MK: $kode_mk</p>";
    // echo "<p>Nilai: $nilai</p>";
} 

//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://localhost/sait_uts/api.php?nim='.$nim.'&kode_mk='.$kode_mk;
// echo $url;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

echo "<br>Sukses Menghapus Data !";
echo "<br><a href=view.php> OK </a>";

?>
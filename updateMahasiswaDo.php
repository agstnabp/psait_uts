<?php

// Pastikan koneksi ke database
require_once 'config.php';  // Pastikan config.php mengatur koneksi dengan benar

if (isset($_POST['nim']) && isset($_POST['kode_mk']) && isset($_POST['nilai'])) {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    echo "<p>NIM: $nim</p>";
    echo "<p>Kode MK: $kode_mk</p>";
    echo "<p>Nilai: $nilai</p>";

    // URL endpoint REST API
    $url = 'http://localhost/UTS_PSAIT/uts_sait_restAPI2.php?nim=' . $nim . '&kode_mk=' . $kode_mk;

    // Inisialisasi Curl
    $ch = curl_init($url);

    // Data JSON yang akan dikirim
    $jsonData = array(
        'nim' => $nim,
        'kode_mk' => $kode_mk,
        'nilai' => $nilai,
    );

    // Encode data ke JSON
    $jsonDataEncoded = json_encode($jsonData);

    // Set Curl untuk POST request
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    // Eksekusi Curl dan dapatkan hasilnya
    $result = curl_exec($ch);

    // Cek jika Curl mengalami error
    if (curl_errno($ch)) {
        echo "<p>Error Curl: " . curl_error($ch) . "</p>";
    } else {
        // Decode hasil JSON
        $resultDecoded = json_decode($result, true);

        if (is_array($resultDecoded)) {
            if (isset($resultDecoded["status"]) && isset($resultDecoded["message"])) {
                echo "<center><br>status : {$resultDecoded["status"]}";
                echo "<br>message : {$resultDecoded["message"]}";
                echo "<br>Sukses Menambah Data!";
            } else {
                echo "<p>Respons JSON tidak memiliki kunci yang diharapkan.</p>";
            }
        } else {
            echo "<p>Respons dari server bukan JSON yang valid.</p>";
        }
    }

    curl_close($ch);

    echo "<br><a href='view.php'> OK </a>";
} else {
    echo "<p>Data yang dikirim tidak lengkap.</p>";
}

?>

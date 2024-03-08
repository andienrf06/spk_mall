<?php
session_start();

// Definisikan weighted supermatrix
$weighted_supermatrix = array(
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Bali Collection']) ? $_SESSION['normalized_row_totals_lokasi']['Bali Collection'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Bali Collection']) ? $_SESSION['normalized_row_totals_harga']['Bali Collection'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Bali Collection']) ? $_SESSION['normalized_row_totals_pesaing']['Bali Collection'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_sidewalk']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Park 23']) ? $_SESSION['normalized_row_totals_lokasi']['Park 23'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Park 23']) ? $_SESSION['normalized_row_totals_harga']['Park 23'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Park 23']) ? $_SESSION['normalized_row_totals_pesaing']['Park 23'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta']) ? $_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta']) ? $_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta']) ? $_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall']) ? $_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall']) ? $_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall']) ? $_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre']) ? $_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre']) ? $_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre']) ? $_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria']) ? $_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Mall Bali Galeria']) ? $_SESSION['normalized_row_totals_harga']['Mall Bali Galeria'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria']) ? $_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset']) ? $_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset']) ? $_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset']) ? $_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Village']) ? $_SESSION['normalized_row_totals_lokasi']['Seminyak Village'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Seminyak Village']) ? $_SESSION['normalized_row_totals_harga']['Seminyak Village'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Village']) ? $_SESSION['normalized_row_totals_pesaing']['Seminyak Village'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Square']) ? $_SESSION['normalized_row_totals_lokasi']['Seminyak Square'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Seminyak Square']) ? $_SESSION['normalized_row_totals_harga']['Seminyak Square'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Square']) ? $_SESSION['normalized_row_totals_pesaing']['Seminyak Square'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali']) ? $_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali']) ? $_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali']) ? $_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Level21 Mall']) ? $_SESSION['normalized_row_totals_lokasi']['Level21 Mall'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Level21 Mall']) ? $_SESSION['normalized_row_totals_harga']['Level21 Mall'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Level21 Mall']) ? $_SESSION['normalized_row_totals_pesaing']['Level21 Mall'] : 0,
    ),

    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plza Renon']) ? $_SESSION['normalized_row_totals_lokasi']['Lippo Plza Renon'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Lippo Plza Renon']) ? $_SESSION['normalized_row_totals_harga']['Lippo Plza Renon'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plza Renon']) ? $_SESSION['normalized_row_totals_pesaing']['Lippo Plza Renon'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Living World Denpasar']) ? $_SESSION['normalized_row_totals_lokasi']['Living World Denpasar'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Living World Denpasar']) ? $_SESSION['normalized_row_totals_harga']['Living World Denpasar'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Living World Denpasar']) ? $_SESSION['normalized_row_totals_pesaing']['Living World Denpasar'] : 0,
    ),
    array(
        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall']) ? $_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall']) ? $_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall']) ? $_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall'] : 0,
    ),
    array(
        isset($_SESSION['normalized_row_totals_bc']['Lokasi']) ? $_SESSION['normalized_row_totals_bc']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_samasta']['Lokasi']) ? $_SESSION['normalized_row_totals_samasta']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Lokasi']) ? $_SESSION['normalized_row_totals_sidewalk']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_park23']['Lokasi']) ? $_SESSION['normalized_row_totals_park23']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_lippokuta']['Lokasi']) ? $_SESSION['normalized_row_totals_lippokuta']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_discovery']['Lokasi']) ? $_SESSION['normalized_row_totals_discovery']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_bw']['Lokasi']) ? $_SESSION['normalized_row_totals_bw']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_mbg']['Lokasi']) ? $_SESSION['normalized_row_totals_mbg']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_lipposunset']['Lokasi']) ? $_SESSION['normalized_row_totals_lipposunset']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_village']['Lokasi']) ? $_SESSION['normalized_row_totals_village']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_square']['Lokasi']) ? $_SESSION['normalized_row_totals_square']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_tsm']['Lokasi']) ? $_SESSION['normalized_row_totals_tsm']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_level']['Lokasi']) ? $_SESSION['normalized_row_totals_level']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_plaza']['Lokasi']) ? $_SESSION['normalized_row_totals_plaza']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_living']['Lokasi']) ? $_SESSION['normalized_row_totals_living']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_ramayana']['Lokasi']) ? $_SESSION['normalized_row_totals_ramayana']['Lokasi'] : 0,
        0, 0, 0,
    ),
    array(
        isset($_SESSION['normalized_row_totals_bc']['Harga']) ? $_SESSION['normalized_row_totals_bc']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_samasta']['Harga']) ? $_SESSION['normalized_row_totals_samasta']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Harga']) ? $_SESSION['normalized_row_totals_sidewalk']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_park23']['Harga']) ? $_SESSION['normalized_row_totals_park23']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_lippokuta']['Harga']) ? $_SESSION['normalized_row_totals_lippokuta']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_discovery']['Harga']) ? $_SESSION['normalized_row_totals_discovery']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_bw']['Harga']) ? $_SESSION['normalized_row_totals_bw']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_mbg']['Harga']) ? $_SESSION['normalized_row_totals_mbg']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_lipposunset']['Harga']) ? $_SESSION['normalized_row_totals_lipposunset']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_village']['Harga']) ? $_SESSION['normalized_row_totals_village']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_square']['Harga']) ? $_SESSION['normalized_row_totals_square']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_tsm']['Harga']) ? $_SESSION['normalized_row_totals_tsm']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_level']['Harga']) ? $_SESSION['normalized_row_totals_level']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_plaza']['Harga']) ? $_SESSION['normalized_row_totals_plaza']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_living']['Harga']) ? $_SESSION['normalized_row_totals_living']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_ramayana']['Harga']) ? $_SESSION['normalized_row_totals_ramayana']['Harga'] : 0,
        0, 0, 0,
    ),
    array(
        isset($_SESSION['normalized_row_totals_bc']['Pesaing']) ? $_SESSION['normalized_row_totals_bc']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_samasta']['Pesaing']) ? $_SESSION['normalized_row_totals_samasta']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Pesaing']) ? $_SESSION['normalized_row_totals_sidewalk']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_park23']['Pesaing']) ? $_SESSION['normalized_row_totals_park23']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_lippokuta']['Pesaing']) ? $_SESSION['normalized_row_totals_lippokuta']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_discovery']['Pesaing']) ? $_SESSION['normalized_row_totals_discovery']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_bw']['Pesaing']) ? $_SESSION['normalized_row_totals_bw']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_mbg']['Pesaing']) ? $_SESSION['normalized_row_totals_mbg']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_lipposunset']['Pesaing']) ? $_SESSION['normalized_row_totals_lipposunset']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_village']['Pesaing']) ? $_SESSION['normalized_row_totals_village']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_square']['Pesaing']) ? $_SESSION['normalized_row_totals_square']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_tsm']['Pesaing']) ? $_SESSION['normalized_row_totals_tsm']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_level']['Pesaing']) ? $_SESSION['normalized_row_totals_level']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_plaza']['Pesaing']) ? $_SESSION['normalized_row_totals_plaza']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_living']['Pesaing']) ? $_SESSION['normalized_row_totals_living']['Pesaing'] : 0,
        isset($_SESSION['normalized_row_totals_ramayana']['Pesaing']) ? $_SESSION['normalized_row_totals_ramayana']['Pesaing'] : 0,
        0, 0, 0,
    ),
);

// Fungsi untuk mengalikan dua matriks
function multiplyMatrices($matrix1, $matrix2)
{
    $result = array();
    $rows1 = count($matrix1);
    $cols2 = count($matrix2[0]);
    $cols1 = count($matrix1[0]);

    for ($i = 0; $i < $rows1; $i++) {
        for ($j = 0; $j < $cols2; $j++) {
            $result[$i][$j] = 0;
            for ($k = 0; $k < $cols1; $k++) {
                $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
            }
        }
    }
    return $result;
}

// Mulai iterasi
$previousMatrix = $weighted_supermatrix;
$maxIterations = 1000; // Tentukan jumlah maksimal iterasi
$threshold = 0.0001; // Ambil threshold sesuai kebutuhan Anda

for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
    // Kalikan matriks dengan dirinya sendiri
    $nextMatrix = multiplyMatrices($previousMatrix, $weighted_supermatrix);

    // Periksa apakah nilai dalam matriks sudah tidak berubah per baris
    $isConverged = true;
    foreach ($previousMatrix as $i => $row) {
        $rowDiff = array_map(function ($prev, $next) {
            return abs($prev - $next);
        }, $row, $nextMatrix[$i]);

        if (max($rowDiff) > $threshold) {
            $isConverged = false;
            break;
        }
    }

    // Jika sudah konvergen, berhenti
    if ($isConverged) {
        break;
    }

    // Gunakan hasil perkalian sebagai matriks sebelumnya untuk iterasi berikutnya
    $previousMatrix = $nextMatrix;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Pusat Perbelanjaan Modern</title>

    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="navb-logo">
                <img src="img\logo.png" alt="Logo">
            </div>

            <div class="navb-items d-none d-xl-flex gap-3">

                <div class="navb-items d-none d-xl-flex">
                    <a href="index.php">Beranda</a>
                </div>

                <div class="navb-items d-none d-xl-flex">
                    <a href="search.php">Pencarian</a>
                </div>

                <div class="item dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nilai Bobot Alternatif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
                        <a class="dropdown-item" href="nilaibobotlokasi.php">Berdasarkan Lokasi</a>
                        <a class="dropdown-item" href="nilaibobotharga.php">Berdasarkan Harga</a>
                        <a class="dropdown-item" href="nilaibobotpesaing.php">Berdasarkan Pesaing</a>
                    </div>
                </div>

                <div class="item dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nilai Bobot Kriteria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
                        <a class="dropdown-item" href="nilaibobotbalicollection.php">Berdasarkan Bali Collection</a>
                        <a class="dropdown-item" href="nilaibobotsamasta.php">Berdasarkan Samasta Lifestyle Village</a>
                        <a class="dropdown-item" href="nilaibobotsidewalk.php">Berdasarkan Sidewalk Jimbaran</a>
                        <a class="dropdown-item" href="nilaibobotpark23.php">Berdasarkan Park 23</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                    </div>
                </div>

                <div class="item dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rekomendasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
                        <a class="dropdown-item" href="weightedsupermatriks.php">Hasil Nilai Bobot</a>
                        <a class="dropdown-item" href="hasilakhir.php">Hasil Rekomendasi</a>
                    </div>
                </div>
            </div>

            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-4 mt-4">Hasil Rekomendasi</h2>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th> <!-- Kolom kosong di pojok kiri atas -->
                        <?php
                        // Menampilkan label kolom
                        $rowLabels = array('A01', 'A02', 'A03', 'A04', 'A05', 'A06', 'A07', 'A08', 'A09', 'A10', 'A11', 'A12', 'A13', 'A14', 'A15', 'A16', 'K1', 'K2', 'K3');
                        foreach ($rowLabels as $label) {
                            echo "<th>$label</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan matriks
                    foreach ($nextMatrix as $rowIndex => $row) {
                        echo "<tr>";
                        echo "<th>" . $rowLabels[$rowIndex] . "</th>"; // Label baris
                        foreach ($row as $value) {
                            printf("<td>%d</td>", intval($value));
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Menginisialisasi array untuk menyimpan nilai maksimum dan indeks baris yang dimulai dengan huruf 'A'
    $maxValues = array();
    // Mengisi array nilai maksimum dan indeks baris
    foreach ($nextMatrix as $rowIndex => $row) {
        if (strpos($rowLabels[$rowIndex], 'A') === 0) { // Memeriksa apakah baris dimulai dengan huruf 'A'
            $maxValues[$rowLabels[$rowIndex]] = max($row);
        }
    }

    // Mengurutkan nilai maksimum dari yang tertinggi ke yang terendah
    arsort($maxValues);
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-3 mt-4">Hasil Perangkingan Pusat Perbelanjaan Modern</h2>
            </div>
        </div>

        <div class="table table-striped">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Peringkat</th>
                        <th>Kode Mall</th>
                        <th>Nama Mall</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan peringkat 1-3
                    $rank = 1;
                    foreach ($maxValues as $rowLabel => $mallName) {
                        $mallName = '';
                        switch ($rowLabel) {
                            case 'A01':
                                $mallName = 'Bali Collection';
                                break;
                            case 'A02':
                                $mallName = 'Samasta Lifestyle Village';
                                break;
                            case 'A03':
                                $mallName = 'Sidewalk Jimbaran';
                                break;
                            case 'A04':
                                $mallName = 'Park 23';
                                break;
                            case 'A05':
                                $mallName = 'Lippo Mall Kuta';
                                break;
                            case 'A06':
                                $mallName = 'Discovery Shopping Mall';
                                break;
                            case 'A07':
                                $mallName = 'Beachwalk Shopping Centre';
                                break;
                            case 'A08':
                                $mallName = 'Mall Bali Galeria';
                                break;
                            case 'A09':
                                $mallName = 'Lippo Plaza Sunset';
                                break;
                            case 'A10':
                                $mallName = 'Seminyak Village';
                                break;
                            case 'A11':
                                $mallName = 'Seminyak Square';
                                break;
                            case 'A12':
                                $mallName = 'Trans Studio Mall Bali';
                                break;
                            case 'A13':
                                $mallName = 'Level21 Mal';
                                break;
                            case 'A14':
                                $mallName = 'Lippo Plaza Renon';
                                break;
                            case 'A15':
                                $mallName = 'Living World Denpasar';
                                break;
                            case 'A16':
                                $mallName = 'Ramayana Bali Mall';
                                break;
                            default:
                                $mallName = 'Unknown';
                                break;
                        }
                        echo "<tr><td>$rank</td><td>$rowLabel</td><td>$mallName</td></tr>";
                        $rank++;
                        if ($rank > 3) break; // Menampilkan hanya 3 peringkat teratas
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
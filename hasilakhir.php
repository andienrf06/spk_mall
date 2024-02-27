<?php
session_start();

// Definisikan weighted supermatrix
$weighted_supermatrix = array(
    array(
        0, 0, 0,
        isset($_SESSION['normalized_row_totals_bc']['Lokasi']) ? $_SESSION['normalized_row_totals_bc']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_bc']['Harga']) ? $_SESSION['normalized_row_totals_bc']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_bc']['Pesaing']) ? $_SESSION['normalized_row_totals_bc']['Pesaing'] : 0,
    ),
    array(
        0, 0, 0,
        isset($_SESSION['normalized_row_totals_samasta']['Lokasi']) ? $_SESSION['normalized_row_totals_samasta']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_samasta']['Harga']) ? $_SESSION['normalized_row_totals_samasta']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_samasta']['Pesaing']) ? $_SESSION['normalized_row_totals_samasta']['Pesaing'] : 0,
    ),
    array(
        0, 0, 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Lokasi']) ? $_SESSION['normalized_row_totals_sidewalk']['Lokasi'] : 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Harga']) ? $_SESSION['normalized_row_totals_sidewalk']['Harga'] : 0,
        isset($_SESSION['normalized_row_totals_sidewalk']['Pesaing']) ? $_SESSION['normalized_row_totals_sidewalk']['Pesaing'] : 0,
    ),
    array(
        isset($_SESSION['normalized_row_totals_lokasi']['Bali Collection']) ? $_SESSION['normalized_row_totals_lokasi']['Bali Collection'] : 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village'] : 0,
        isset($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran'] : 0,
        0, 0, 0
    ),
    array(
        isset($_SESSION['normalized_row_totals_harga']['Bali Collection']) ? $_SESSION['normalized_row_totals_harga']['Bali Collection'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village'] : 0,
        isset($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran'] : 0,
        0, 0, 0
    ),
    array(
        isset($_SESSION['normalized_row_totals_pesaing']['Bali Collection']) ? $_SESSION['normalized_row_totals_pesaing']['Bali Collection'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village']) ? $_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village'] : 0,
        isset($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran']) ? $_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran'] : 0,
        0, 0, 0
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

// Fungsi untuk melakukan transpose matriks
function transposeMatrix($matrix)
{
    $transposedMatrix = array();
    foreach ($matrix as $rowIndex => $row) {
        foreach ($row as $colIndex => $value) {
            $transposedMatrix[$colIndex][$rowIndex] = $value;
        }
    }
    return $transposedMatrix;
}

// Mulai iterasi
$previousMatrix = $weighted_supermatrix;
while (true) {
    // Kalikan matriks dengan dirinya sendiri
    $nextMatrix = multiplyMatrices($previousMatrix, $weighted_supermatrix);

    // Periksa apakah nilai dalam matriks sudah tidak berubah per baris
    $threshold = 0.0001; // Ambil threshold sesuai kebutuhan Anda
    $isConverged = true;
    foreach ($previousMatrix as $i => $row) {
        $rowDiff = array_map(function ($prev, $next) {
            return abs($prev - $next);
        }, $row, $nextMatrix[$i]);

        // Periksa konvergensi per baris
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

// Setelah iterasi selesai, lanjutkan dengan menampilkan matriks
$transposedMatrix = transposeMatrix($nextMatrix);

// Nama baris yang ingin ditampilkan
$rowLabels = array('A1', 'A2', 'A3', 'K1', 'K2', 'K3');

// Membuat array untuk menyimpan peringkat
$rankings = array();

// Menghitung peringkat untuk setiap baris A1, A2, dan A3
foreach ($transposedMatrix as $rowIndex => $row) {
    if ($rowIndex < 3) { // Hanya pertimbangkan baris A1, A2, dan A3
        // Buat salinan untuk diurutkan
        $sortedRow = $row;
        rsort($sortedRow);

        // Mendapatkan nilai terbesar dan indeksnya
        $maxValue = $sortedRow[0];
        $maxIndex = array_search($maxValue, $row);

        // Menyimpan peringkat
        $rankings[$rowLabels[$rowIndex]] = $maxIndex + 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi</title>
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

                <!-- <div class="navb-items d-none d-xl-flex">
            <a href="pilihmall.php">Pilih Mall</a>
        </div> -->

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
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                    </div>
                </div>

                <div class="item dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rekomendasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
                        <a class="dropdown-item" href="weightedsupermatriks.php">Hasil Weighted Supermatrix</a>
                        <a class="dropdown-item" href="hasilakhir.php">Hasil Rekomendasi</a>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="/img/logo-variant.png" alt="Logo">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>

                        <div class="modal-body">

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="index.php">Beranda</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="search.php">Pencarian</a>
                            </div>

                            <div class="navb-items d-none d-xl-flex">
                                <a href="pilihmall.php">Pilih Mall</a>
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
                                    <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                                    <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                                    <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                                    <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
                                    <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                                    <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                                    <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                                    <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                                    <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                                    <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                                    <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                                    <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                                </div>
                            </div>

                            <div class="item dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Rekomendasi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
                                    <a class="dropdown-item" href="weightedsupermatriks.php">Hasil Weighted Supermatrix</a>
                                    <a class="dropdown-item" href="hasilakhir.php">Hasil Rekomendasi</a>
                                </div>
                            </div>
                        </div>

                        <div class="mobile-modal-footer">

                            <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-4 mt-4">Hasil Rekomendasi</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- <h2 class="mb-4 mt-4">Unweighted Supermatrix dan Weighted Supermatrix</h2> -->
                </div>
            </div>
            <!-- Tabel untuk menampilkan hasil matriks -->
            <table border='1'>
                <thead>
                    <tr>
                        <th></th> <!-- Kolom kosong di pojok kiri atas -->
                        <!-- Menampilkan label kolom -->
                        <?php foreach ($rowLabels as $label) : ?>
                            <th><?= $label ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data baris dan sel akan berbeda karena matriks sudah ditranspose -->
                    <?php foreach ($transposedMatrix as $rowIndex => $row) : ?>
                        <tr>
                            <th><?= $rowLabels[$rowIndex] ?></th> <!-- Label baris -->
                            <?php foreach ($row as $value) : ?>
                                <td><?= sprintf("%.6f", $value) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Tampilkan peringkat -->
            <h2>Peringkat</h2>
            <ul>
                <?php foreach ($rankings as $label => $ranking) : ?>
                    <li><?= $label ?>: <?= $ranking ?></li>
                <?php endforeach; ?>
            </ul>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();
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

            <div class="navb-items d-none d-xl-flex">
                <div class="item">
                    <a href="index.php">Beranda</a>
                </div>

                <div class="item">
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
                <h1 class="mb-4 mt-4">Hasil Rekomendasi</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 mt-4">Weighted Supermatrix</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo number_format($_SESSION['eigenvector_balicollection']['Location'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_balicollection']['Price'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_balicollection']['Competitor'] / 2, 5, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td>A2</td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                                <td><?php echo number_format($_SESSION['eigenvector_samasta']['Location'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_samasta']['Price'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_samasta']['Competitor'] / 2, 5, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <td>0</td>
                                <td>0</td>
                                <td>1</td>
                                <td><?php echo number_format($_SESSION['eigenvector_sidewalk']['Location'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_sidewalk']['Price'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_sidewalk']['Competitor'] / 2, 5, '.', ''); ?></td>
                            </tr>
                            <tr>
                                <td>K1</td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>1</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>K2</td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>1</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>K3</td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        // Inisialisasi matriks dengan nilai yang sudah diberikan
        $weighted_supermatrix = [
            [1, 0, 0, $_SESSION['eigenvector_balicollection']['Location'] / 2, $_SESSION['eigenvector_balicollection']['Price'] / 2, $_SESSION['eigenvector_balicollection']['Competitor'] / 2],
            [0, 1, 0, $_SESSION['eigenvector_samasta']['Location'] / 2, $_SESSION['eigenvector_samasta']['Price'] / 2, $_SESSION['eigenvector_samasta']['Competitor'] / 2],
            [0, 0, 1, $_SESSION['eigenvector_sidewalk']['Location'] / 2, $_SESSION['eigenvector_sidewalk']['Price'] / 2, $_SESSION['eigenvector_sidewalk']['Competitor'] / 2],
            [$_SESSION['eigenvector_lokasi']['Bali Collection'] / 2, $_SESSION['eigenvector_lokasi']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_lokasi']['Sidewalk Jimbaran'] / 2, 1, 0, 0],
            [$_SESSION['eigenvector_harga']['Bali Collection'] / 2, $_SESSION['eigenvector_harga']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_harga']['Sidewalk Jimbaran'] / 2, 0, 1, 0],
            [$_SESSION['eigenvector_pesaing']['Bali Collection'] / 2, $_SESSION['eigenvector_pesaing']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_pesaing']['Sidewalk Jimbaran'] / 2, 0, 0, 1]
        ];

        $epsilon = 0.00001; // Nilai toleransi untuk perbedaan angka

        // Iterasi untuk mencapai limit supermatrix
        $limit_reached = false;
        while (!$limit_reached) {
            $new_matrix = $weighted_supermatrix; // Salin matriks yang ada
            $limit_reached = true; // Asumsikan batas sudah tercapai

            // Simpan nilai kolom terlebih dahulu
            $column_sums = array_map('array_sum', $weighted_supermatrix);
            $num_rows = count($weighted_supermatrix);
            $num_cols = count($weighted_supermatrix[0]);

            // Iterasi setiap kolom dalam matriks
            for ($col_key = 0; $col_key < $num_cols; $col_key++) {
                $sum = 0; // Reset jumlah untuk setiap kolom
                // Hitung total untuk kolom saat ini
                for ($row_key = 0; $row_key < $num_rows; $row_key++) {
                    $sum += $weighted_supermatrix[$row_key][$col_key];
                }

                // Hitung nilai yang diharapkan untuk kolom saat ini
                $expected_value = $sum / $num_rows;

                // Periksa apakah perbedaan antara nilai aktual dan nilai yang diharapkan lebih besar dari epsilon
                if (abs($column_sums[$col_key] - $num_rows * $expected_value) > $epsilon) {
                    $limit_reached = false; // Jika ada perbedaan yang signifikan, batas belum tercapai
                }

                // Atur nilai semua elemen dalam kolom menjadi nilai yang diharapkan
                for ($row_key = 0; $row_key < $num_rows; $row_key++) {
                    $new_matrix[$row_key][$col_key] = $expected_value;
                }
            }

            // Perbarui matriks dengan matriks baru untuk iterasi berikutnya
            $weighted_supermatrix = $new_matrix;
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 mt-4">Hasil Limit Supermatrix</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <?php
                                foreach ($weighted_supermatrix[0] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>A2</td>
                                <?php
                                foreach ($weighted_supermatrix[1] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <?php
                                foreach ($weighted_supermatrix[2] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K1</td>
                                <?php
                                foreach ($weighted_supermatrix[3] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K2</td>
                                <?php
                                foreach ($weighted_supermatrix[4] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K3</td>
                                <?php
                                foreach ($weighted_supermatrix[5] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
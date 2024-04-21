<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_tsm'])) {
    $_SESSION['comparison_results_tsm'] = [];
}

$mallsToShow = $_SESSION['selected_malls'] ?? [];
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
                        <a class="dropdown-item" href="nilaibobotlokasi.php">Berdasarkan Ukuran</a>
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
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotpark23.php">Berdasarkan Park 23</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                        <a class="dropdown-item" href="nilaibobotsamasta.php">Berdasarkan Samasta Lifestyle Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotsidewalk.php">Berdasarkan Sidewalk Jimbaran</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Trans Studio Mall Bali</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_tsm" class="form-control" value="A12 - Trans Studio Mall Bali" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="kriteria_tsm1">Kriteria 1:</label>
                    <select name="kriteria_tsm" class="form-select">
                        <?php
                        $tenants_tsm = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_tsm as $tenant_tsm) {
                            $selected = in_array($tenant_tsm, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_tsm\" $selected>$tenant_tsm</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="comparison_tsm1">Nilai Perbandingan:</label>
                    <select name="comparison_tsm" class="form-select">
                        <option value="1">1 - Kedua kriteria sama pentingnya</option>
                        <option value="2">2 - Nilai antara dua nilai (1 dan 3) yang berdekatan</option>
                        <option value="3">3 - Kriteria yang satu sedikit lebih penting</option>
                        <option value="4">4 - Nilai dua nilai (3 dan 5) yang berdekatan</option>
                        <option value="5">5 - Kriteria yang satu lebih penting</option>
                        <option value="6">6 - Nilai antara dua nilai (5 dan 7) yang berdekatan</option>
                        <option value="7">7 - Kriteria yang satu lebih mutlak penting</option>
                        <option value="8">8 - Nilai antara dua nilai (7 dan 9) yang berdekatan</option>
                        <option value="9">9 - Kriteria yang satu jelas lebih mutlak penting</option>
                    </select>
                </div>

                <div class="col">
                    <label for="kriteria_tsm2">Kriteria 2:</label>
                    <select name="kriteria_tsm2" class="form-select">
                        <?php
                        foreach ($tenants_tsm as $tenant_tsm) {
                            echo "<option value=\"$tenant_tsm\">$tenant_tsm</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Check if alternatif_tsm is set
            if (isset($_POST['alternatif_tsm'])) {
                // Get input values
                $alternatif_tsm = $_POST['alternatif_tsm'];
                $kriteria_tsm = $_POST['kriteria_tsm'];
                $comparison_value_tsm = $_POST['comparison_tsm'];
                $kriteria_tsm2 = $_POST['kriteria_tsm2'];

                // Retrieve comparison_tsm results from session
                $comparison_results_tsm = $_SESSION['comparison_results_tsm'];

                // Check if the comparison_tsm result_tsm for this combination of kriteria_tsm and kriteria_tsm2 already exists
                $exists = false;
                foreach ($comparison_results_tsm as $key_tsm => $result_tsm) {
                    if ($result_tsm['kriteria_tsm'] == $kriteria_tsm && $result_tsm['kriteria_tsm2'] == $kriteria_tsm2) {
                        $exists = true;
                        // Update the comparison_tsm value
                        $comparison_results_tsm[$key_tsm][$alternatif_tsm] = $comparison_value_tsm;
                        break; // Break the loop after updating the comparison_tsm value
                    } elseif ($result_tsm['kriteria_tsm'] == $kriteria_tsm2 && $result_tsm['kriteria_tsm2'] == $kriteria_tsm) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_tsm[$key_tsm][$alternatif_tsm] = $comparison_value_tsm;
                        // Update the inverse comparison value
                        $comparison_results_tsm[$key_tsm][$alternatif_tsm] = 1 / $comparison_value_tsm;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_tsm result_tsm doesn't exist, add it to the comparison_tsm results array
                if (!$exists) {
                    $comparison_results_tsm[] = array(
                        'kriteria_tsm' => $kriteria_tsm,
                        'kriteria_tsm2' => $kriteria_tsm2,
                        $alternatif_tsm => $comparison_value_tsm
                    );
                }


                // Update the comparison_tsm results in the session
                $_SESSION['comparison_results_tsm'] = $comparison_results_tsm;
            } else {
                // Action if alternatif_tsm is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<th>$tenant_tsm</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesTsm = array_fill_keys($tenants_tsm, 0);

            // Loop through each tenant for comparison_tsm results
            foreach ($tenants_tsm as $tenant_tsm1) {
                echo "<tr>";
                echo "<th>$tenant_tsm1</th>";
                $totalRowTsm = 0; // Total for this row

                foreach ($tenants_tsm as $tenant_tsm2) {
                    $comparisonValueTsm = null;
                    $isInverseTsm = false; // Flag to check if the comparison_tsm is inverse

                    foreach ($comparison_results_tsm as $result_tsm) {
                        if (($result_tsm['kriteria_tsm'] == $tenant_tsm1 && $result_tsm['kriteria_tsm2'] == $tenant_tsm2)) {
                            $comparisonValueTsm = $result_tsm[$alternatif_tsm];
                            break;
                        } elseif (($result_tsm['kriteria_tsm'] == $tenant_tsm2 && $result_tsm['kriteria_tsm2'] == $tenant_tsm1)) {
                            $comparisonValueTsm = 1 / $result_tsm[$alternatif_tsm]; // Take the inverse
                            $isInverseTsm = true;
                            break;
                        }
                    }

                    if ($comparisonValueTsm !== null) {
                        if ($isInverseTsm) {
                            echo "<td>" . number_format($comparisonValueTsm, 5, '.', '') . "</td>"; // Display inverse comparison_tsm value
                        } else {
                            echo "<td>" . number_format($comparisonValueTsm, 5, '.', '') . "</td>"; // Display comparison_tsm value
                        }
                        $totalValuesTsm[$tenant_tsm2] += $comparisonValueTsm; // Fix here, use tenant_tsm2 as key_tsm for totalValuesTsm
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_tsm
            echo "<tr><th>Total</th>";
            $totalTotalTsm = 0;
            foreach ($tenants_tsm as $tenant_tsm) {
                $totalTotalTsm += $totalValuesTsm[$tenant_tsm];
                echo "<th>" . number_format($totalValuesTsm[$tenant_tsm], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<th>$tenant_tsm</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsTsm = array_fill_keys($tenants_tsm, 0);

            // Counting the number of tenants$tenants_tsm
            $numMallsTsm = count($tenants_tsm);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsTsm = [];

            // Loop through each ten$tenant_tsm for comparison results
            foreach ($tenants_tsm as $tenant_tsm1) {
                echo "<tr>";
                echo "<th>$tenant_tsm1</th>";
                $rowTotalTsm = 0; // Menyimpan total per baris

                foreach ($tenants_tsm as $tenant_tsm2) {
                    $comparisonValueTsm = null;

                    foreach ($comparison_results_tsm as $result_tsm) {
                        if (($result_tsm['kriteria_tsm'] == $tenant_tsm1 && $result_tsm['kriteria_tsm2'] == $tenant_tsm2)) {
                            $comparisonValueTsm = $result_tsm[$alternatif_tsm];
                            break;
                        } elseif (($result_tsm['kriteria_tsm'] == $tenant_tsm2 && $result_tsm['kriteria_tsm2'] == $tenant_tsm1)) {
                            $comparisonValueTsm = 1 / $result_tsm[$alternatif_tsm]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueTsm !== null) {
                        // Calculate the normalized value
                        $normalizedValueTsm = $comparisonValueTsm / $totalValuesTsm[$tenant_tsm2];
                        echo "<td>" . number_format($normalizedValueTsm, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsTsm[$tenant_tsm2] += $normalizedValueTsm;

                        // Add to row total
                        $rowTotalTsm += $normalizedValueTsm;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalTsm = $rowTotalTsm / $numMallsTsm;
                $normalizedRowTotalsTsm[$tenant_tsm1] = $normalizedRowTotalTsm; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalTsm, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_tsm
            echo "<tr><th>Total</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<th>" . number_format($columnTotalsTsm[$tenant_tsm], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueTsm = array_sum($columnTotalsTsm) / $numMallsTsm;
            echo "<th>" . number_format($eigenValueTsm, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsTsm as $tenant_tsm => $rowTotalTsm) {
            //     echo "<li><strong>$tenant_tsm:</strong> " . number_format($rowTotalTsm, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_tsm'] = $normalizedRowTotalsTsm;

            // Calculate Lambda Max
            $lambdaMaxTsm = 0;
            foreach ($tenants_tsm as $tenant_tsm) {
                $lambdaMaxTsm += $totalValuesTsm[$tenant_tsm] * $normalizedRowTotalsTsm[$tenant_tsm];
            }

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexTsm  = 0;
            switch ($numMallsTsm) {
                case 1:
                    $randomConsistencyIndexTsm  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexTsm  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexTsm  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexTsm  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexTsm  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexTsm  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexTsm  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexTsm  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexTsm  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexTsm  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexTsm  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexTsm  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexTsm  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexTsm  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexTsm  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CITsm = ($lambdaMaxTsm - $numMallsTsm) / ($numMallsTsm - 1);


            // Calculate Consistency Ratio (CR)
            $CRTsm = $CITsm / $randomConsistencyIndexTsm; // You need to define RI according to your matrix size

            // Show consistency results
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CITsm, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsTsm elemen: " . $randomConsistencyIndexTsm . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRTsm, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRTsm < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
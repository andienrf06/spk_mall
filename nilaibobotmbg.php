<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_mbg'])) {
    $_SESSION['comparison_results_mbg'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Mall Bali Galeria</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_mbg" class="form-control" value="A08 - Mall Bali Galeria" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="kriteria_mbg1">Kriteria 1:</label>
                    <select name="kriteria_mbg" class="form-select">
                        <?php
                        $tenants_mbg = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_mbg as $tenant_mbg) {
                            $selected = in_array($tenant_mbg, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_mbg\" $selected>$tenant_mbg</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="comparison_mbg1">Nilai Perbandingan:</label>
                    <select name="comparison_mbg" class="form-select">
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
                    <label for="kriteria_mbg2">Kriteria 2:</label>
                    <select name="kriteria_mbg2" class="form-select">
                        <?php
                        foreach ($tenants_mbg as $tenant_mbg) {
                            echo "<option value=\"$tenant_mbg\">$tenant_mbg</option>";
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
            // Check if alternatif_mbg is set
            if (isset($_POST['alternatif_mbg'])) {
                // Get input values
                $alternatif_mbg = $_POST['alternatif_mbg'];
                $kriteria_mbg = $_POST['kriteria_mbg'];
                $comparison_value_mbg = $_POST['comparison_mbg'];
                $kriteria_mbg2 = $_POST['kriteria_mbg2'];

                // Retrieve comparison_mbg results from session
                $comparison_results_mbg = $_SESSION['comparison_results_mbg'];

                // Check if the comparison_mbg result_mbg for this combination of kriteria_mbg and kriteria_mbg2 already exists
                $exists = false;
                foreach ($comparison_results_mbg as $key_mbg => $result_mbg) {
                    if ($result_mbg['kriteria_mbg'] == $kriteria_mbg && $result_mbg['kriteria_mbg2'] == $kriteria_mbg2) {
                        $exists = true;
                        // Update the comparison_mbg value
                        $comparison_results_mbg[$key_mbg][$alternatif_mbg] = $comparison_value_mbg;
                        break; // Break the loop after updating the comparison_mbg value
                    } elseif ($result_mbg['kriteria_mbg'] == $kriteria_mbg2 && $result_mbg['kriteria_mbg2'] == $kriteria_mbg) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_mbg[$key_mbg][$alternatif_mbg] = $comparison_value_mbg;
                        // Update the inverse comparison value
                        $comparison_results_mbg[$key_mbg][$alternatif_mbg] = 1 / $comparison_value_mbg;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_mbg result_mbg doesn't exist, add it to the comparison_mbg results array
                if (!$exists) {
                    $comparison_results_mbg[] = array(
                        'kriteria_mbg' => $kriteria_mbg,
                        'kriteria_mbg2' => $kriteria_mbg2,
                        $alternatif_mbg => $comparison_value_mbg
                    );
                }


                // Update the comparison_mbg results in the session
                $_SESSION['comparison_results_mbg'] = $comparison_results_mbg;
            } else {
                // Action if alternatif_mbg is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<th>$tenant_mbg</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesMbg = array_fill_keys($tenants_mbg, 0);

            // Loop through each tenant for comparison_mbg results
            foreach ($tenants_mbg as $tenant_mbg1) {
                echo "<tr>";
                echo "<th>$tenant_mbg1</th>";
                $totalRowMbg = 0; // Total for this row

                foreach ($tenants_mbg as $tenant_mbg2) {
                    $comparisonValueMbg = null;
                    $isInverseMbg = false; // Flag to check if the comparison_mbg is inverse

                    foreach ($comparison_results_mbg as $result_mbg) {
                        if (($result_mbg['kriteria_mbg'] == $tenant_mbg1 && $result_mbg['kriteria_mbg2'] == $tenant_mbg2)) {
                            $comparisonValueMbg = $result_mbg[$alternatif_mbg];
                            break;
                        } elseif (($result_mbg['kriteria_mbg'] == $tenant_mbg2 && $result_mbg['kriteria_mbg2'] == $tenant_mbg1)) {
                            $comparisonValueMbg = 1 / $result_mbg[$alternatif_mbg]; // Take the inverse
                            $isInverseMbg = true;
                            break;
                        }
                    }

                    if ($comparisonValueMbg !== null) {
                        if ($isInverseMbg) {
                            echo "<td>" . number_format($comparisonValueMbg, 5, '.', '') . "</td>"; // Display inverse comparison_mbg value
                        } else {
                            echo "<td>" . number_format($comparisonValueMbg, 5, '.', '') . "</td>"; // Display comparison_mbg value
                        }
                        $totalValuesMbg[$tenant_mbg2] += $comparisonValueMbg; // Fix here, use tenant_mbg2 as key_mbg for totalValuesMbg
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_mbg
            echo "<tr><th>Total</th>";
            $totalTotalMbg = 0;
            foreach ($tenants_mbg as $tenant_mbg) {
                $totalTotalMbg += $totalValuesMbg[$tenant_mbg];
                echo "<th>" . number_format($totalValuesMbg[$tenant_mbg], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<th>$tenant_mbg</th>";
            }
            echo "<th>Eigen</th>";

            // Array to store column totals
            $columnTotalsMbg = array_fill_keys($tenants_mbg, 0);

            // Counting the number of tenants$tenants_mbg
            $numMallsMbg = count($tenants_mbg);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsMbg = [];

            // Loop through each ten$tenant_mbg for comparison results
            foreach ($tenants_mbg as $tenant_mbg1) {
                echo "<tr>";
                echo "<th>$tenant_mbg1</th>";
                $rowTotalMbg = 0;

                foreach ($tenants_mbg as $tenant_mbg2) {
                    $comparisonValueMbg = null;

                    foreach ($comparison_results_mbg as $result_mbg) {
                        if (($result_mbg['kriteria_mbg'] == $tenant_mbg1 && $result_mbg['kriteria_mbg2'] == $tenant_mbg2)) {
                            $comparisonValueMbg = $result_mbg[$alternatif_mbg];
                            break;
                        } elseif (($result_mbg['kriteria_mbg'] == $tenant_mbg2 && $result_mbg['kriteria_mbg2'] == $tenant_mbg1)) {
                            $comparisonValueMbg = 1 / $result_mbg[$alternatif_mbg]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueMbg !== null) {
                        // Calculate the normalized value
                        $normalizedValueMbg = $comparisonValueMbg / $totalValuesMbg[$tenant_mbg2];
                        echo "<td>" . number_format($normalizedValueMbg, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsMbg[$tenant_mbg2] += $normalizedValueMbg;

                        // Add to row total
                        $rowTotalMbg += $normalizedValueMbg;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalMbg = $rowTotalMbg / $numMallsMbg;
                $normalizedRowTotalsMbg[$tenant_mbg1] = $normalizedRowTotalMbg; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalMbg, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_mbg
            echo "<tr><th>Total</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<th>" . number_format($columnTotalsMbg[$tenant_mbg], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueMbg = array_sum($columnTotalsMbg) / $numMallsMbg;
            echo "<th>" . number_format($eigenValueMbg, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsMbg as $tenant_mbg => $rowTotalMbg) {
            //     echo "<li><strong>$tenant_mbg:</strong> " . number_format($rowTotalMbg, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_mbg'] = $normalizedRowTotalsMbg;

            // Calculate Lambda Max
            $lambdaMaxMbg = 0;
            foreach ($tenants_mbg as $tenant_mbg) {
                $lambdaMaxMbg += $totalValuesMbg[$tenant_mbg] * $normalizedRowTotalsMbg[$tenant_mbg];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxMbg, 5, '.', '') . "</p>";

            // Calculate random consistency values based on the number of tenant elements
            $randomConsistencyIndexMbg  = 0;
            switch ($numMallsMbg) {
                case 1:
                    $randomConsistencyIndexMbg  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexMbg  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexMbg  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexMbg  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexMbg  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexMbg  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexMbg  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexMbg  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexMbg  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexMbg  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexMbg  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexMbg  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexMbg  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexMbg  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexMbg  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIMbg = ($lambdaMaxMbg - $numMallsMbg) / ($numMallsMbg - 1);


            // Calculate Consistency Ratio (CR)
            $CRMbg = $CIMbg / $randomConsistencyIndexMbg; // You need to define RI according to your matrix size

            // Show consistency results
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIMbg, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsMbg elemen: " . $randomConsistencyIndexMbg . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRMbg, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRMbg < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_lipposunset'])) {
    $_SESSION['comparison_results_lipposunset'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Lippo Plaza Sunset</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_lipposunset" class="form-control" value="A09 - Lippo Plaza Sunset" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="kriteria_lipposunset1">Kriteria 1:</label>
                    <select name="kriteria_lipposunset" class="form-select">
                        <?php
                        $tenants_lipposunset = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_lipposunset as $tenant_lipposunset) {
                            $selected = in_array($tenant_lipposunset, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_lipposunset\" $selected>$tenant_lipposunset</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="comparison_lipposunset1">Nilai Perbandingan:</label>
                    <select name="comparison_lipposunset" class="form-select">
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
                    <label for="kriteria_lipposunset2">Kriteria 2:</label>
                    <select name="kriteria_lipposunset2" class="form-select">
                        <?php
                        foreach ($tenants_lipposunset as $tenant_lipposunset) {
                            echo "<option value=\"$tenant_lipposunset\">$tenant_lipposunset</option>";
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
            // Check if alternatif_lipposunset is set
            if (isset($_POST['alternatif_lipposunset'])) {
                // Get input values
                $alternatif_lipposunset = $_POST['alternatif_lipposunset'];
                $kriteria_lipposunset = $_POST['kriteria_lipposunset'];
                $comparison_value_lipposunset = $_POST['comparison_lipposunset'];
                $kriteria_lipposunset2 = $_POST['kriteria_lipposunset2'];

                // Retrieve comparison_lipposunset results from session
                $comparison_results_lipposunset = $_SESSION['comparison_results_lipposunset'];

                // Check if the comparison_lipposunset result_lipposunset for this combination of kriteria_lipposunset and kriteria_lipposunset2 already exists
                $exists = false;
                foreach ($comparison_results_lipposunset as $key_lipposunset => $result_lipposunset) {
                    if ($result_lipposunset['kriteria_lipposunset'] == $kriteria_lipposunset && $result_lipposunset['kriteria_lipposunset2'] == $kriteria_lipposunset2) {
                        $exists = true;
                        // Update the comparison_lipposunset value
                        $comparison_results_lipposunset[$key_lipposunset][$alternatif_lipposunset] = $comparison_value_lipposunset;
                        break; // Break the loop after updating the comparison_lipposunset value
                    } elseif ($result_lipposunset['kriteria_lipposunset'] == $kriteria_lipposunset2 && $result_lipposunset['kriteria_lipposunset2'] == $kriteria_lipposunset) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_lipposunset[$key_lipposunset][$alternatif_lipposunset] = $comparison_value_lipposunset;
                        // Update the inverse comparison value
                        $comparison_results_lipposunset[$key_lipposunset][$alternatif_lipposunset] = 1 / $comparison_value_lipposunset;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_lipposunset result_lipposunset doesn't exist, add it to the comparison_lipposunset results array
                if (!$exists) {
                    $comparison_results_lipposunset[] = array(
                        'kriteria_lipposunset' => $kriteria_lipposunset,
                        'kriteria_lipposunset2' => $kriteria_lipposunset2,
                        $alternatif_lipposunset => $comparison_value_lipposunset
                    );
                }


                // Update the comparison_lipposunset results in the session
                $_SESSION['comparison_results_lipposunset'] = $comparison_results_lipposunset;
            } else {
                // Action if alternatif_lipposunset is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<th>$tenant_lipposunset</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesLippoSunset = array_fill_keys($tenants_lipposunset, 0);

            // Loop through each tenant for comparison_lipposunset results
            foreach ($tenants_lipposunset as $tenant_lipposunset1) {
                echo "<tr>";
                echo "<th>$tenant_lipposunset1</th>";
                $totalRowLippoSunset = 0; // Total for this row

                foreach ($tenants_lipposunset as $tenant_lipposunset2) {
                    $comparisonValueLippoSunset = null;
                    $isInverseLippoSunset = false; // Flag to check if the comparison_lipposunset is inverse

                    foreach ($comparison_results_lipposunset as $result_lipposunset) {
                        if (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset1 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset2)) {
                            $comparisonValueLippoSunset = $result_lipposunset[$alternatif_lipposunset];
                            break;
                        } elseif (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset2 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset1)) {
                            $comparisonValueLippoSunset = 1 / $result_lipposunset[$alternatif_lipposunset]; // Take the inverse
                            $isInverseLippoSunset = true;
                            break;
                        }
                    }

                    if ($comparisonValueLippoSunset !== null) {
                        if ($isInverseLippoSunset) {
                            echo "<td>" . number_format($comparisonValueLippoSunset, 5, '.', '') . "</td>"; // Display inverse comparison_lipposunset value
                        } else {
                            echo "<td>" . number_format($comparisonValueLippoSunset, 5, '.', '') . "</td>"; // Display comparison_lipposunset value
                        }
                        $totalValuesLippoSunset[$tenant_lipposunset2] += $comparisonValueLippoSunset; // Fix here, use tenant_lipposunset2 as key_mlippokutafor totalValuesLippoSunset
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_lipposunset
            echo "<tr><th>Total</th>";
            $totalTotalLippoSunset = 0;
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                $totalTotalLippoSunset += $totalValuesLippoSunset[$tenant_lipposunset];
                echo "<th>" . number_format($totalValuesLippoSunset[$tenant_lipposunset], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<th>$tenant_lipposunset</th>";
            }
            echo "<th>Eigen</th>";

            // Array to store column totals
            $columnTotalsLippoSunset = array_fill_keys($tenants_lipposunset, 0);

            // Counting the number of tenants$tenants_lipposunset
            $numMallsLippoSunset = count($tenants_lipposunset);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsLippoSunset = [];

            // Loop through each ten$tenant_lipposunset for comparison results
            foreach ($tenants_lipposunset as $tenant_lipposunset1) {
                echo "<tr>";
                echo "<th>$tenant_lipposunset1</th>";
                $rowTotalLippoSunset = 0; // Stores totals per row

                foreach ($tenants_lipposunset as $tenant_lipposunset2) {
                    $comparisonValueLippoSunset = null;

                    foreach ($comparison_results_lipposunset as $result_lipposunset) {
                        if (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset1 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset2)) {
                            $comparisonValueLippoSunset = $result_lipposunset[$alternatif_lipposunset];
                            break;
                        } elseif (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset2 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset1)) {
                            $comparisonValueLippoSunset = 1 / $result_lipposunset[$alternatif_lipposunset]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueLippoSunset !== null) {
                        // Calculate the normalized value
                        $normalizedValueLippoSunset = $comparisonValueLippoSunset / $totalValuesLippoSunset[$tenant_lipposunset2];
                        echo "<td>" . number_format($normalizedValueLippoSunset, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsLippoSunset[$tenant_lipposunset2] += $normalizedValueLippoSunset;

                        // Add to row total
                        $rowTotalLippoSunset += $normalizedValueLippoSunset;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalLippoSunset = $rowTotalLippoSunset / $numMallsLippoSunset;
                $normalizedRowTotalsLippoSunset[$tenant_lipposunset1] = $normalizedRowTotalLippoSunset; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalLippoSunset, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_lipposunset
            echo "<tr><th>Total</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<th>" . number_format($columnTotalsLippoSunset[$tenant_lipposunset], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueLippoSunset = array_sum($columnTotalsLippoSunset) / $numMallsLippoSunset;
            echo "<th>" . number_format($eigenValueLippoSunset, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsLippoSunset as $tenant_lipposunset => $rowTotalLippoSunset) {
            //     echo "<li><strong>$tenant_lipposunset:</strong> " . number_format($rowTotalLippoSunset, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_lipposunset'] = $normalizedRowTotalsLippoSunset;

            // Calculate Lambda Max
            $lambdaMaxLippoSunset = 0;
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                $lambdaMaxLippoSunset += $totalValuesLippoSunset[$tenant_lipposunset] * $normalizedRowTotalsLippoSunset[$tenant_lipposunset];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLippoSunset, 5, '.', '') . "</p>";

            // Calculate random consistency values based on the number of tenant elements
            $randomConsistencyIndexLippoSunset  = 0;
            switch ($numMallsLippoSunset) {
                case 1:
                    $randomConsistencyIndexLippoSunset  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLippoSunset  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLippoSunset  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLippoSunset  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLippoSunset  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLippoSunset  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLippoSunset  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLippoSunset  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLippoSunset  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLippoSunset  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexLippoSunset  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexLippoSunset  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexLippoSunset  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexLippoSunset  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexLippoSunset  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CILippoSunset = ($lambdaMaxLippoSunset - $numMallsLippoSunset) / ($numMallsLippoSunset - 1);

            // Calculate Consistency Ratio (CR)
            $CRLippoSunset = $CILippoSunset / $randomConsistencyIndexLippoSunset; // You need to define RI according to your matrix size

            // Show consistency results
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CILippoSunset, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsLippoSunset elemen: " . $randomConsistencyIndexLippoSunset . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRLippoSunset, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRLippoSunset < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
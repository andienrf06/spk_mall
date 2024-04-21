<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_plaza'])) {
    $_SESSION['comparison_results_plaza'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Lippo Plaza Renon</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_plaza" class="form-control" value="A14 - Lippo Plaza Renon" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="kriteria_plaza1">Kriteria 1:</label>
                    <select name="kriteria_plaza" class="form-select">
                        <?php
                        $tenants_plaza = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_plaza as $tenant_plaza) {
                            $selected = in_array($tenant_plaza, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_plaza\" $selected>$tenant_plaza</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="comparison_plaza1">Nilai Perbandingan:</label>
                    <select name="comparison_plaza" class="form-select">
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
                    <label for="kriteria_plaza2">Kriteria 2:</label>
                    <select name="kriteria_plaza2" class="form-select">
                        <?php
                        foreach ($tenants_plaza as $tenant_plaza) {
                            echo "<option value=\"$tenant_plaza\">$tenant_plaza</option>";
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
            // Check if alternatif_plaza is set
            if (isset($_POST['alternatif_plaza'])) {
                // Get input values
                $alternatif_plaza = $_POST['alternatif_plaza'];
                $kriteria_plaza = $_POST['kriteria_plaza'];
                $comparison_value_plaza = $_POST['comparison_plaza'];
                $kriteria_plaza2 = $_POST['kriteria_plaza2'];

                // Retrieve comparison_plaza results from session
                $comparison_results_plaza = $_SESSION['comparison_results_plaza'];

                // Check if the comparison_plaza result_plaza for this combination of kriteria_plaza and kriteria_plaza2 already exists
                $exists = false;
                foreach ($comparison_results_plaza as $key_plaza => $result_plaza) {
                    if ($result_plaza['kriteria_plaza'] == $kriteria_plaza && $result_plaza['kriteria_plaza2'] == $kriteria_plaza2) {
                        $exists = true;
                        // Update the comparison_plaza value
                        $comparison_results_plaza[$key_plaza][$alternatif_plaza] = $comparison_value_plaza;
                        break; // Break the loop after updating the comparison_plaza value
                    } elseif ($result_plaza['kriteria_plaza'] == $kriteria_plaza2 && $result_plaza['kriteria_plaza2'] == $kriteria_plaza) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_plaza[$key_plaza][$alternatif_plaza] = $comparison_value_plaza;
                        // Update the inverse comparison value
                        $comparison_results_plaza[$key_plaza][$alternatif_plaza] = 1 / $comparison_value_plaza;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_plaza result_plaza doesn't exist, add it to the comparison_plaza results array
                if (!$exists) {
                    $comparison_results_plaza[] = array(
                        'kriteria_plaza' => $kriteria_plaza,
                        'kriteria_plaza2' => $kriteria_plaza2,
                        $alternatif_plaza => $comparison_value_plaza
                    );
                }


                // Update the comparison_plaza results in the session
                $_SESSION['comparison_results_plaza'] = $comparison_results_plaza;
            } else {
                // Action if alternatif_plaza is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_plaza as $tenant_plaza) {
                echo "<th>$tenant_plaza</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesPlaza = array_fill_keys($tenants_plaza, 0);

            // Loop through each tenant for comparison_plaza results
            foreach ($tenants_plaza as $tenant_plaza1) {
                echo "<tr>";
                echo "<th>$tenant_plaza1</th>";
                $totalRowPlaza = 0; // Total for this row

                foreach ($tenants_plaza as $tenant_plaza2) {
                    $comparisonValuePlaza = null;
                    $isInversePlaza = false; // Flag to check if the comparison_plaza is inverse

                    foreach ($comparison_results_plaza as $result_plaza) {
                        if (($result_plaza['kriteria_plaza'] == $tenant_plaza1 && $result_plaza['kriteria_plaza2'] == $tenant_plaza2)) {
                            $comparisonValuePlaza = $result_plaza[$alternatif_plaza];
                            break;
                        } elseif (($result_plaza['kriteria_plaza'] == $tenant_plaza2 && $result_plaza['kriteria_plaza2'] == $tenant_plaza1)) {
                            $comparisonValuePlaza = 1 / $result_plaza[$alternatif_plaza]; // Take the inverse
                            $isInversePlaza = true;
                            break;
                        }
                    }

                    if ($comparisonValuePlaza !== null) {
                        if ($isInversePlaza) {
                            echo "<td>" . number_format($comparisonValuePlaza, 5, '.', '') . "</td>"; // Display inverse comparison_plaza value
                        } else {
                            echo "<td>" . number_format($comparisonValuePlaza, 5, '.', '') . "</td>"; // Display comparison_plaza value
                        }
                        $totalValuesPlaza[$tenant_plaza2] += $comparisonValuePlaza; // Fix here, use tenant_plaza2 as key_plaza for totalValuesPlaza
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_plaza
            echo "<tr><th>Total</th>";
            $totalTotalPlza = 0;
            foreach ($tenants_plaza as $tenant_plaza) {
                $totalTotalPlza += $totalValuesPlaza[$tenant_plaza];
                echo "<th>" . number_format($totalValuesPlaza[$tenant_plaza], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_plaza as $tenant_plaza) {
                echo "<th>$tenant_plaza</th>";
            }
            echo "<th>Eigen</th>";

            // Array to store column totals
            $columnTotalsPlaza = array_fill_keys($tenants_plaza, 0);

            // Counting the number of tenants$tenants_plaza
            $numMallsPlaza = count($tenants_plaza);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsPlaza = [];

            // Loop through each ten$tenant_plaza for comparison results
            foreach ($tenants_plaza as $tenant_plaza1) {
                echo "<tr>";
                echo "<th>$tenant_plaza1</th>";
                $rowTotalPlaza = 0; // Stores totals per row

                foreach ($tenants_plaza as $tenant_plaza2) {
                    $comparisonValuePlaza = null;

                    foreach ($comparison_results_plaza as $result_plaza) {
                        if (($result_plaza['kriteria_plaza'] == $tenant_plaza1 && $result_plaza['kriteria_plaza2'] == $tenant_plaza2)) {
                            $comparisonValuePlaza = $result_plaza[$alternatif_plaza];
                            break;
                        } elseif (($result_plaza['kriteria_plaza'] == $tenant_plaza2 && $result_plaza['kriteria_plaza2'] == $tenant_plaza1)) {
                            $comparisonValuePlaza = 1 / $result_plaza[$alternatif_plaza]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValuePlaza !== null) {
                        // Calculate the normalized value
                        $normalizedValuePlaza = $comparisonValuePlaza / $totalValuesPlaza[$tenant_plaza2];
                        echo "<td>" . number_format($normalizedValuePlaza, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsPlaza[$tenant_plaza2] += $normalizedValuePlaza;

                        // Add to row total
                        $rowTotalPlaza += $normalizedValuePlaza;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalPlaza = $rowTotalPlaza / $numMallsPlaza;
                $normalizedRowTotalsPlaza[$tenant_plaza1] = $normalizedRowTotalPlaza; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalPlaza, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_plaza
            echo "<tr><th>Total</th>";
            foreach ($tenants_plaza as $tenant_plaza) {
                echo "<th>" . number_format($columnTotalsPlaza[$tenant_plaza], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValuePlaza = array_sum($columnTotalsPlaza) / $numMallsPlaza;
            echo "<th>" . number_format($eigenValuePlaza, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsPlaza as $tenant_plaza => $rowTotalPlaza) {
            //     echo "<li><strong>$tenant_plaza:</strong> " . number_format($rowTotalPlaza, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_plaza'] = $normalizedRowTotalsPlaza;

            // Calculate Lambda Max
            $lambdaMaxPlaza = 0;
            foreach ($tenants_plaza as $tenant_plaza) {
                $lambdaMaxPlaza += $totalValuesPlaza[$tenant_plaza] * $normalizedRowTotalsPlaza[$tenant_plaza];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxPlaza, 5, '.', '') . "</p>";

            // Calculate random consistency values based on the number of tenant elements
            $randomConsistencyIndexPlaza  = 0;
            switch ($numMallsPlaza) {
                case 1:
                    $randomConsistencyIndexPlaza  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexPlaza  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexPlaza  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexPlaza  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexPlaza  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexPlaza  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexPlaza  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexPlaza  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexPlaza  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexPlaza  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexPlaza  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexPlaza  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexPlaza  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexPlaza  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexPlaza  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIPlaza = ($lambdaMaxPlaza - $numMallsPlaza) / ($numMallsPlaza - 1);


            // Calculate Consistency Ratio (CR)
            $CRPlaza = $CIPlaza / $randomConsistencyIndexPlaza; // You need to define RI according to your matrix size

            // Show consistency results
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIPlaza, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsPlaza elemen: " . $randomConsistencyIndexPlaza . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRPlaza, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRPlaza < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
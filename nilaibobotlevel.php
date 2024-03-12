<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_level'])) {
    $_SESSION['comparison_results_level'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria_level Terhadap Alternatif Level21 Mall</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_level" class="form-control" value="A13 - Level21 Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_level" class="form-select">
                        <?php
                        $tenants_level = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_level as $tenant_level) {
                            $selected = in_array($tenant_level, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_level\" $selected>$tenant_level</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_level" class="form-select">
                        <option value="1">1 - Kedua elemen sama pentingnya</option>
                        <option value="3">3 - Elemen yang satu sedikit lebih penting daripada elemen yang lainnya</option>
                        <option value="5">5 - Elemen yang satu lebih penting daripada elemen lainnya</option>
                        <option value="7">7 - Satu elemen jelas lebih mutlak penting daripada elemen yang lainnya</option>
                        <option value="9">9 - Satu elemen mutlak daripada elemen yang lainnya</option>
                        <option value="2">2 - Nilai-nilai antara dua nilai pertimbangan yang berdekatan</option>
                        <option value="4">4 - Nilai-nilai antara dua nilai pertimbangan yang berdekatan</option>
                        <option value="6">6 - Nilai-nilai antara dua nilai pertimbangan yang berdekatan</option>
                        <option value="8">8 - Nilai-nilai antara dua nilai pertimbangan yang berdekatan</option>
                    </select>
                </div>

                <div class="col">
                    <select name="kriteria_level2" class="form-select">
                        <?php
                        foreach ($tenants_level as $tenant_level) {
                            echo "<option value=\"$tenant_level\">$tenant_level</option>";
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
            // Check if alternatif_level is set
            if (isset($_POST['alternatif_level'])) {
                // Get input values
                $alternatif_level = $_POST['alternatif_level'];
                $kriteria_level = $_POST['kriteria_level'];
                $comparison_value_level = $_POST['comparison_level'];
                $kriteria_level2 = $_POST['kriteria_level2'];

                // Retrieve comparison_level results from session
                $comparison_results_level = $_SESSION['comparison_results_level'];

                // Check if the comparison_level result_level for this combination of kriteria_level and kriteria_level2 already exists
                $exists = false;
                foreach ($comparison_results_level as $key_level => $result_level) {
                    if ($result_level['kriteria_level'] == $kriteria_level && $result_level['kriteria_level2'] == $kriteria_level2) {
                        $exists = true;
                        // Update the comparison_level value
                        $comparison_results_level[$key_level][$alternatif_level] = $comparison_value_level;
                        break; // Break the loop after updating the comparison_level value
                    } elseif ($result_level['kriteria_level'] == $kriteria_level2 && $result_level['kriteria_level2'] == $kriteria_level) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_level[$key_level][$alternatif_level] = $comparison_value_level;
                        // Update the inverse comparison value
                        $comparison_results_level[$key_level][$alternatif_level] = 1 / $comparison_value_level;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_level result_level doesn't exist, add it to the comparison_level results array
                if (!$exists) {
                    $comparison_results_level[] = array(
                        'kriteria_level' => $kriteria_level,
                        'kriteria_level2' => $kriteria_level2,
                        $alternatif_level => $comparison_value_level
                    );
                }
                // Update the comparison_level results in the session
                $_SESSION['comparison_results_level'] = $comparison_results_level;
            } else {
                // Action if alternatif_level is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_level as $tenant_level) {
                echo "<th>$tenant_level</th>";
            }

            // Initialize an array to store the total values for each tenant_level
            $totalValuesLevel = array_fill_keys($tenants_level, 0);

            // Loop through each tenant_level for comparison_level results
            foreach ($tenants_level as $tenant_level1) {
                echo "<tr>";
                echo "<th>$tenant_level1</th>";
                $totalRowLevel = 0; // Total for this row

                foreach ($tenants_level as $tenant_level2) {
                    $comparisonValueLevel = null;
                    $isInverseLevel = false; // Flag to check if the comparison_level is inverse

                    foreach ($comparison_results_level as $result_level) {
                        if (($result_level['kriteria_level'] == $tenant_level1 && $result_level['kriteria_level2'] == $tenant_level2)) {
                            $comparisonValueLevel = $result_level[$alternatif_level];
                            break;
                        } elseif (($result_level['kriteria_level'] == $tenant_level2 && $result_level['kriteria_level2'] == $tenant_level1)) {
                            $comparisonValueLevel = 1 / $result_level[$alternatif_level]; // Take the inverse
                            $isInverseLevel = true;
                            break;
                        }
                    }

                    if ($comparisonValueLevel !== null) {
                        if ($isInverseLevel) {
                            echo "<td>" . number_format($comparisonValueLevel, 5, '.', '') . "</td>"; // Display inverse comparison_level value
                        } else {
                            echo "<td>" . number_format($comparisonValueLevel, 5, '.', '') . "</td>"; // Display comparison_level value
                        }
                        $totalValuesLevel[$tenant_level2] += $comparisonValueLevel; // Fix here, use tenant_level2 as key_level for totalValuesLevel
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_level
            echo "<tr><th>Total</th>";
            $totalTotalLevel = 0;
            foreach ($tenants_level as $tenant_level) {
                $totalTotalLevel += $totalValuesLevel[$tenant_level];
                echo "<th>" . number_format($totalValuesLevel[$tenant_level], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";


            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_level as $tenant_level) {
                echo "<th>$tenant_level</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsLevel = array_fill_keys($tenants_level, 0);

            // Counting the number of tenants_level
            $numMallsLevel = count($tenants_level);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsLevel = [];

            // Loop through each ten$tenant_level for comparison results
            foreach ($tenants_level as $tenant_level1) {
                echo "<tr>";
                echo "<th>$tenant_level1</th>";
                $rowTotalLevel = 0; // Menyimpan total per baris

                foreach ($tenants_level as $tenant_level2) {
                    $comparisonValueLevel = null;

                    foreach ($comparison_results_level as $result_level) {
                        if (($result_level['kriteria_level'] == $tenant_level1 && $result_level['kriteria_level2'] == $tenant_level2)) {
                            $comparisonValueLevel = $result_level[$alternatif_level];
                            break;
                        } elseif (($result_level['kriteria_level'] == $tenant_level2 && $result_level['kriteria_level2'] == $tenant_level1)) {
                            $comparisonValueLevel = 1 / $result_level[$alternatif_level]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueLevel !== null) {
                        // Calculate the normalized value
                        $normalizedValueLevel = $comparisonValueLevel / $totalValuesLevel[$tenant_level2];
                        echo "<td>" . number_format($normalizedValueLevel, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsLevel[$tenant_level2] += $normalizedValueLevel;

                        // Add to row total
                        $rowTotalLevel += $normalizedValueLevel;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalLevel = $rowTotalLevel / $numMallsLevel;
                $normalizedRowTotalsLevel[$tenant_level1] = $normalizedRowTotalLevel; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalLevel, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants_level
            echo "<tr><th>Total</th>";
            foreach ($tenants_level as $tenant_level) {
                echo "<th>" . number_format($columnTotalsLevel[$tenant_level], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueLevel = array_sum($columnTotalsLevel) / $numMallsLevel;
            echo "<th>" . number_format($eigenValueLevel, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsLevel as $tenant_level => $rowTotalLevel) {
            //     echo "<li><strong>$tenant_level:</strong> " . number_format($rowTotalLevel, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_level'] = $normalizedRowTotalsLevel;


            // echo "Nilai Eigen Vector BC: " . number_format($eigenVectorBC, 5, '.', '') . "<br>";

            // Calculate Lambda Max
            $lambdaMaxLevel = 0;
            foreach ($tenants_level as $tenant_level) {
                $lambdaMaxLevel += $totalValuesLevel[$tenant_level] * $normalizedRowTotalsLevel[$tenant_level];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLevel, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant_level
            $randomConsistencyIndexLevel  = 0;
            switch ($numMallsLevel) {
                case 1:
                    $randomConsistencyIndexLevel  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLevel  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLevel  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLevel  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLevel  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLevel  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLevel  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLevel  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLevel  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLevel  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexLevel  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexLevel  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexLevel  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexLevel  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexLevel  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CILevel = ($lambdaMaxLevel - $numMallsLevel) / ($numMallsLevel - 1);


            // Calculate Consistency Ratio (CR)
            $CRLevel = $CILevel / $randomConsistencyIndexLevel; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CILevel, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsLevel elemen: " . $randomConsistencyIndexLevel . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRLevel, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRLevel < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
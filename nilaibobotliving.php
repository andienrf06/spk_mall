<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_living'])) {
    $_SESSION['comparison_results_living'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Living World Denpasar</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_living" class="form-control" value="A15 - Living World Denpasar" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_living" class="form-select">
                        <?php
                        $tenants_living = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_living as $tenant_living) {
                            $selected = in_array($tenant_living, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_living\" $selected>$tenant_living</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_living" class="form-select">
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
                    <select name="kriteria_living2" class="form-select">
                        <?php
                        foreach ($tenants_living as $tenant_living) {
                            echo "<option value=\"$tenant_living\">$tenant_living</option>";
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
            // Check if alternatif_living is set
            if (isset($_POST['alternatif_living'])) {
                // Get input values
                $alternatif_living = $_POST['alternatif_living'];
                $kriteria_living = $_POST['kriteria_living'];
                $comparison_value_living = $_POST['comparison_living'];
                $kriteria_living2 = $_POST['kriteria_living2'];

                // Retrieve comparison_living results from session
                $comparison_results_living = $_SESSION['comparison_results_living'];

                // Check if the comparison_living result_living for this combination of kriteria_living and kriteria_living2 already exists
                $exists = false;
                foreach ($comparison_results_living as $key_living => $result_living) {
                    if ($result_living['kriteria_living'] == $kriteria_living && $result_living['kriteria_living2'] == $kriteria_living2) {
                        $exists = true;
                        // Update the comparison_living value
                        $comparison_results_living[$key_living][$alternatif_living] = $comparison_value_living;
                        break; // Break the loop after updating the comparison_living value
                    } elseif ($result_living['kriteria_living'] == $kriteria_living2 && $result_living['kriteria_living2'] == $kriteria_living) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_living[$key_living][$alternatif_living] = $comparison_value_living;
                        // Update the inverse comparison value
                        $comparison_results_living[$key_living][$alternatif_living] = 1 / $comparison_value_living;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison_living result_living doesn't exist, add it to the comparison_living results array
                if (!$exists) {
                    $comparison_results_living[] = array(
                        'kriteria_living' => $kriteria_living,
                        'kriteria_living2' => $kriteria_living2,
                        $alternatif_living => $comparison_value_living
                    );
                }


                // Update the comparison_living results in the session
                $_SESSION['comparison_results_living'] = $comparison_results_living;
            } else {
                // Action if alternatif_living is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_living as $tenant_living) {
                echo "<th>$tenant_living</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesLiving = array_fill_keys($tenants_living, 0);

            // Loop through each tenant for comparison_living results
            foreach ($tenants_living as $tenant_living1) {
                echo "<tr>";
                echo "<th>$tenant_living1</th>";
                $totalRowLiving = 0; // Total for this row

                foreach ($tenants_living as $tenant_living2) {
                    $comparisonValueLiving = null;
                    $isInverseLiving = false; // Flag to check if the comparison_living is inverse

                    foreach ($comparison_results_living as $result_living) {
                        if (($result_living['kriteria_living'] == $tenant_living1 && $result_living['kriteria_living2'] == $tenant_living2)) {
                            $comparisonValueLiving = $result_living[$alternatif_living];
                            break;
                        } elseif (($result_living['kriteria_living'] == $tenant_living2 && $result_living['kriteria_living2'] == $tenant_living1)) {
                            $comparisonValueLiving = 1 / $result_living[$alternatif_living]; // Take the inverse
                            $isInverseLiving = true;
                            break;
                        }
                    }

                    if ($comparisonValueLiving !== null) {
                        if ($isInverseLiving) {
                            echo "<td>" . number_format($comparisonValueLiving, 5, '.', '') . "</td>"; // Display inverse comparison_living value
                        } else {
                            echo "<td>" . number_format($comparisonValueLiving, 5, '.', '') . "</td>"; // Display comparison_living value
                        }
                        $totalValuesLiving[$tenant_living2] += $comparisonValueLiving; // Fix here, use tenant_living2 as key_living for totalValuesLiving
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_living
            echo "<tr><th>Total</th>";
            $totalTotalLiving = 0;
            foreach ($tenants_living as $tenant_living) {
                $totalTotalLiving += $totalValuesLiving[$tenant_living];
                echo "<th>" . number_format($totalValuesLiving[$tenant_living], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_living as $tenant_living) {
                echo "<th>$tenant_living</th>";
            }
            echo "<th>Eigen</th>";

            // Array to store column totals
            $columnTotalsLiving = array_fill_keys($tenants_living, 0);

            // Counting the number of tenants$tenants_living
            $numMallsLiving = count($tenants_living);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsLiving = [];

            // Loop through each ten$tenant_living for comparison results
            foreach ($tenants_living as $tenant_living1) {
                echo "<tr>";
                echo "<th>$tenant_living1</th>";
                $rowTotalLiving = 0; // Stores totals per row

                foreach ($tenants_living as $tenant_living2) {
                    $comparisonValueLiving = null;

                    foreach ($comparison_results_living as $result_living) {
                        if (($result_living['kriteria_living'] == $tenant_living1 && $result_living['kriteria_living2'] == $tenant_living2)) {
                            $comparisonValueLiving = $result_living[$alternatif_living];
                            break;
                        } elseif (($result_living['kriteria_living'] == $tenant_living2 && $result_living['kriteria_living2'] == $tenant_living1)) {
                            $comparisonValueLiving = 1 / $result_living[$alternatif_living]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueLiving !== null) {
                        // Calculate the normalized value
                        $normalizedValueLiving = $comparisonValueLiving / $totalValuesLiving[$tenant_living2];
                        echo "<td>" . number_format($normalizedValueLiving, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsLiving[$tenant_living2] += $normalizedValueLiving;

                        // Add to row total
                        $rowTotalLiving += $normalizedValueLiving;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalLiving = $rowTotalLiving / $numMallsLiving;
                $normalizedRowTotalsLiving[$tenant_living1] = $normalizedRowTotalLiving; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalLiving, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_living
            echo "<tr><th>Total</th>";
            foreach ($tenants_living as $tenant_living) {
                echo "<th>" . number_format($columnTotalsLiving[$tenant_living], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueLiving = array_sum($columnTotalsLiving) / $numMallsLiving;
            echo "<th>" . number_format($eigenValueLiving, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsLiving as $tenant_living => $rowTotalLiving) {
            //     echo "<li><strong>$tenant_living:</strong> " . number_format($rowTotalLiving, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_living'] = $normalizedRowTotalsLiving;

            // Calculate Lambda Max
            $lambdaMaxLiving = 0;
            foreach ($tenants_living as $tenant_living) {
                $lambdaMaxLiving += $totalValuesLiving[$tenant_living] * $normalizedRowTotalsLiving[$tenant_living];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLiving, 5, '.', '') . "</p>";

            // Calculate random consistency values based on the number of tenant elements
            $randomConsistencyIndexLiving  = 0;
            switch ($numMallsLiving) {
                case 1:
                    $randomConsistencyIndexLiving  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLiving  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLiving  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLiving  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLiving  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLiving  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLiving  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLiving  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLiving  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLiving  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexLiving  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexLiving  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexLiving  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexLiving  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexLiving  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CILiving = ($lambdaMaxLiving - $numMallsLiving) / ($numMallsLiving - 1);

            // Calculate Consistency Ratio (CR)
            $CRLiving = $CILiving / $randomConsistencyIndexLiving; // You need to define RI according to your matrix size

            // Show consistency results
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CILiving, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsLiving elemen: " . $randomConsistencyIndexLiving . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRLiving, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRLiving < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
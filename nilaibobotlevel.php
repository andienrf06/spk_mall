<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_level'])) {
    $_SESSION['comparison_results_level'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Bobot Kriteria</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternative:</label>
                    <input type="text" name="alternatif_level" class="form-control" value="A09 - Level21 Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_level" class="form-select">
                        <?php
                        $tenants_level = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_level as $tenant_level) {
                            echo "<option value=\"$tenant_level\">$tenant_level</option>";
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
            // Get input values
            $alternatif_level = $_POST['alternatif_level'];
            $kriteria_level = $_POST['kriteria_level'];
            $comparison_value_level = $_POST['comparison_level'];
            $kriteria_level2 = $_POST['kriteria_level2'];

            // Retrieve comparison results from session
            $comparison_results_level = $_SESSION['comparison_results_level'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_level as $key_level => $result_level) {
                if ($result_level['kriteria_level'] == $kriteria_level && $result_level['kriteria_level2'] == $kriteria_level2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_level[$key_level][$alternatif_level] = $comparison_value_level;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_level[] = array(
                    'kriteria_level' => $kriteria_level,
                    'kriteria_level2' => $kriteria_level2,
                    $alternatif_level => $comparison_value_level
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_level'] = $comparison_results_level;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_level as $tenant_level) {
                echo "<th>$tenant_level</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesLevel = array_fill_keys($tenants_level, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_level as $tenant_level1) {
                echo "<tr>";
                echo "<td>$tenant_level1</td>";
                $totalRowLevel = 0; // Total for this row

                foreach ($tenants_level as $tenant_level2) {
                    $comparisonValueLevel = null;
                    $isInverseLevel = false; // Flag to check if the comparison is inverse

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
                            echo "<td>" . number_format($comparisonValueLevel, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueLevel, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowLevel += $comparisonValueLevel;
                        $totalValuesLevel[$tenant_level1] += $comparisonValueLevel;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowLevel, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_level as $tenant_level) {
                echo "<th>$tenant_level</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_level as $tenant_level) {
                echo "<tr>";
                echo "<td>$tenant_level</td>";

                // Get the total for this row
                $rowTotalLevel = $totalValuesLevel[$tenant_level];

                // Initialize the sum of divided values for this row
                $dividedValuesSumLevel = 0;

                foreach ($tenants_level as $tenant_level2) {
                    // Get the current value in the table
                    $currentValueLevel = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_level as $result_level) {
                        if (($result_level['kriteria_level'] == $tenant_level && $result_level['kriteria_level2'] == $tenant_level2)) {
                            $currentValueLevel = $result_level[$alternatif_level];
                            break;
                        } elseif (($result_level['kriteria_level'] == $tenant_level2 && $result_level['kriteria_level2'] == $tenant_level)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueLevel = 1 / $result_level[$alternatif_level];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueLevel = 0;
                    if ($rowTotalLevel != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueLevel = $currentValueLevel / $rowTotalLevel;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumLevel += $dividedValueLevel;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueLevel, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumLevel . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsLevel1 = count($tenants_level);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnLevel = array_fill_keys($tenants_level, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_level as $tenant_level) {
                foreach ($tenants_level as $tenant_level2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalLevel = $totalValuesLevel[$tenant_level];
                    foreach ($comparison_results_level as $result_level) {
                        if (($result_level['kriteria_level'] == $tenant_level && $result_level['kriteria_level2'] == $tenant_level2)) {
                            $currentValueLevel = $result_level[$alternatif_level] / $rowTotalLevel; // Dibagi dengan total baris
                            $totalPerColumnLevel[$tenant_level2] += $currentValueLevel;
                            break;
                        } elseif (($result_level['kriteria_level'] == $tenant_level2 && $result_level['kriteria_level2'] == $tenant_level)) {
                            $currentValueLevel = 1 / $result_level[$alternatif_level] / $rowTotalLevel; // Dibagi dengan total baris
                            $totalPerColumnLevel[$tenant_level2] += $currentValueLevel;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnLevel as $tenant_level => $totalLevel) {
                $totalPerColumnLevel[$tenant_level] /= $numTenantsLevel1;
            }

            // Menghitung total dari hasil
            $totalResultLevel = 0;
            foreach ($totalPerColumnLevel as $totalLevel) {
                $totalResultLevel += $totalLevel;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_level as $tenant_level) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnLevel[$tenant_level], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultLevel</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxLevel = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_level as $tenant_level) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantLevel = $totalValuesLevel[$tenant_level];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantLevel = $totalPerColumnLevel[$tenant_level];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxLevel += $totalValueForTenantLevel * $eigenvectorForTenantLevel;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLevel, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexLevel = 0;
            switch ($numTenantsLevel1) {
                case 1:
                    $randomConsistencyIndexLevel = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLevel = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLevel = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLevel = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLevel = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLevel = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLevel = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLevel = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLevel = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLevel = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexLevel = ($lambdaMaxLevel - $numTenantsLevel1) / ($numTenantsLevel1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioLevel = $consistencyIndexLevel / $randomConsistencyIndexLevel;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexLevel, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsLevel1 elemen: " . $randomConsistencyIndexLevel . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioLevel, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioLevel < 0.1) {
                echo "<p>Nilai Konsisten</p>";
            } else {
                echo "<p>Nilai Tidak Konsisten.</p>";
            }
        }
        ?>

    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_tsm'])) {
    $_SESSION['comparison_results_tsm'] = [];
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
                    <input type="text" name="alternatif_tsm" class="form-control" value="A08 - Trans Studio Mall Bali" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_tsm" class="form-select">
                        <?php
                        $tenants_tsm = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_tsm as $tenant_tsm) {
                            echo "<option value=\"$tenant_tsm\">$tenant_tsm</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_tsm" class="form-select">
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
            // Get input values
            $alternatif_tsm = $_POST['alternatif_tsm'];
            $kriteria_tsm = $_POST['kriteria_tsm'];
            $comparison_value_tsm = $_POST['comparison_tsm'];
            $kriteria_tsm2 = $_POST['kriteria_tsm2'];

            // Retrieve comparison results from session
            $comparison_results_tsm = $_SESSION['comparison_results_tsm'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_tsm as $key_tsm => $result_tsm) {
                if ($result_tsm['kriteria_tsm'] == $kriteria_tsm && $result_tsm['kriteria_tsm2'] == $kriteria_tsm2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_tsm[$key_tsm][$alternatif_tsm] = $comparison_value_tsm;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_tsm[] = array(
                    'kriteria_tsm' => $kriteria_tsm,
                    'kriteria_tsm2' => $kriteria_tsm2,
                    $alternatif_tsm => $comparison_value_tsm
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_tsm'] = $comparison_results_tsm;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<th>$tenant_tsm</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesTsm = array_fill_keys($tenants_tsm, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_tsm as $tenant_tsm1) {
                echo "<tr>";
                echo "<td>$tenant_tsm1</td>";
                $totalRowTsm = 0; // Total for this row

                foreach ($tenants_tsm as $tenant_tsm2) {
                    $comparisonValueTsm = null;
                    $isInverseTsm = false; // Flag to check if the comparison is inverse

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
                            echo "<td>" . number_format($comparisonValueTsm, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueTsm, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowTsm += $comparisonValueTsm;
                        $totalValuesTsm[$tenant_tsm1] += $comparisonValueTsm;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowTsm, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<th>$tenant_tsm</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_tsm as $tenant_tsm) {
                echo "<tr>";
                echo "<td>$tenant_tsm</td>";

                // Get the total for this row
                $rowTotalTsm = $totalValuesTsm[$tenant_tsm];

                // Initialize the sum of divided values for this row
                $dividedValuesSumTsm = 0;

                foreach ($tenants_tsm as $tenant_tsm2) {
                    // Get the current value in the table
                    $currentValueTsm = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_tsm as $result_tsm) {
                        if (($result_tsm['kriteria_tsm'] == $tenant_tsm && $result_tsm['kriteria_tsm2'] == $tenant_tsm2)) {
                            $currentValueTsm = $result_tsm[$alternatif_tsm];
                            break;
                        } elseif (($result_tsm['kriteria_tsm'] == $tenant_tsm2 && $result_tsm['kriteria_tsm2'] == $tenant_tsm)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueTsm = 1 / $result_tsm[$alternatif_tsm];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueTsm = 0;
                    if ($rowTotalTsm != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueTsm = $currentValueTsm / $rowTotalTsm;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumTsm += $dividedValueTsm;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueTsm, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumTsm . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsTsm1 = count($tenants_tsm);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnTsm = array_fill_keys($tenants_tsm, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_tsm as $tenant_tsm) {
                foreach ($tenants_tsm as $tenant_tsm2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalTsm = $totalValuesTsm[$tenant_tsm];
                    foreach ($comparison_results_tsm as $result_tsm) {
                        if (($result_tsm['kriteria_tsm'] == $tenant_tsm && $result_tsm['kriteria_tsm2'] == $tenant_tsm2)) {
                            $currentValueTsm = $result_tsm[$alternatif_tsm] / $rowTotalTsm; // Dibagi dengan total baris
                            $totalPerColumnTsm[$tenant_tsm2] += $currentValueTsm;
                            break;
                        } elseif (($result_tsm['kriteria_tsm'] == $tenant_tsm2 && $result_tsm['kriteria_tsm2'] == $tenant_tsm)) {
                            $currentValueTsm = 1 / $result_tsm[$alternatif_tsm] / $rowTotalTsm; // Dibagi dengan total baris
                            $totalPerColumnTsm[$tenant_tsm2] += $currentValueTsm;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnTsm as $tenant_tsm => $totalTsm) {
                $totalPerColumnTsm[$tenant_tsm] /= $numTenantsTsm1;
            }

            // Menghitung total dari hasil
            $totalResultTsm = 0;
            foreach ($totalPerColumnTsm as $totalTsm) {
                $totalResultTsm += $totalTsm;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_tsm as $tenant_tsm) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnTsm[$tenant_tsm], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultTsm</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxTsm = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_tsm as $tenant_tsm) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantTsm = $totalValuesTsm[$tenant_tsm];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantTsm = $totalPerColumnTsm[$tenant_tsm];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxTsm += $totalValueForTenantTsm * $eigenvectorForTenantTsm;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxTsm, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexTsm = 0;
            switch ($numTenantsTsm1) {
                case 1:
                    $randomConsistencyIndexTsm = 0;
                    break;
                case 2:
                    $randomConsistencyIndexTsm = 0;
                    break;
                case 3:
                    $randomConsistencyIndexTsm = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexTsm = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexTsm = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexTsm = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexTsm = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexTsm = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexTsm = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexTsm = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexTsm = ($lambdaMaxTsm - $numTenantsTsm1) / ($numTenantsTsm1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioTsm = $consistencyIndexTsm / $randomConsistencyIndexTsm;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexTsm, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsTsm1 elemen: " . $randomConsistencyIndexTsm . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioTsm, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioTsm < 0.1) {
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
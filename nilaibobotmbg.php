<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_mbg'])) {
    $_SESSION['comparison_results_mbg'] = [];
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
                    <input type="text" name="alternatif_mbg" class="form-control" value="A05 - Mall Bali Galeria" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_mbg" class="form-select">
                        <?php
                        $tenants_mbg = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_mbg as $tenant_mbg) {
                            echo "<option value=\"$tenant_mbg\">$tenant_mbg</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_mbg" class="form-select">
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
            // Get input values
            $alternatif_mbg = $_POST['alternatif_mbg'];
            $kriteria_mbg = $_POST['kriteria_mbg'];
            $comparison_value_mbg = $_POST['comparison_mbg'];
            $kriteria_mbg2 = $_POST['kriteria_mbg2'];

            // Retrieve comparison results from session
            $comparison_results_mbg = $_SESSION['comparison_results_mbg'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_mbg as $key_mbg => $result_mbg) {
                if ($result_mbg['kriteria_mbg'] == $kriteria_mbg && $result_mbg['kriteria_mbg2'] == $kriteria_mbg2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_mbg[$key_mbg][$alternatif_mbg] = $comparison_value_mbg;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_mbg[] = array(
                    'kriteria_mbg' => $kriteria_mbg,
                    'kriteria_mbg2' => $kriteria_mbg2,
                    $alternatif_mbg => $comparison_value_mbg
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_mbg'] = $comparison_results_mbg;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<th>$tenant_mbg</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesMbg = array_fill_keys($tenants_mbg, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_mbg as $tenant_mbg1) {
                echo "<tr>";
                echo "<td>$tenant_mbg1</td>";
                $totalRowMbg = 0; // Total for this row

                foreach ($tenants_mbg as $tenant_mbg2) {
                    $comparisonValueMbg = null;
                    $isInverseMbg = false; // Flag to check if the comparison is inverse

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
                            echo "<td>" . number_format($comparisonValueMbg, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueMbg, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowMbg += $comparisonValueMbg;
                        $totalValuesMbg[$tenant_mbg1] += $comparisonValueMbg;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowMbg, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<th>$tenant_mbg</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_mbg as $tenant_mbg) {
                echo "<tr>";
                echo "<td>$tenant_mbg</td>";

                // Get the total for this row
                $rowTotalMbg = $totalValuesMbg[$tenant_mbg];

                // Initialize the sum of divided values for this row
                $dividedValuesSumMbg = 0;

                foreach ($tenants_mbg as $tenant_mbg2) {
                    // Get the current value in the table
                    $currentValueMbg = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_mbg as $result_mbg) {
                        if (($result_mbg['kriteria_mbg'] == $tenant_mbg && $result_mbg['kriteria_mbg2'] == $tenant_mbg2)) {
                            $currentValueMbg = $result_mbg[$alternatif_mbg];
                            break;
                        } elseif (($result_mbg['kriteria_mbg'] == $tenant_mbg2 && $result_mbg['kriteria_mbg2'] == $tenant_mbg)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueMbg = 1 / $result_mbg[$alternatif_mbg];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueMbg = 0;
                    if ($rowTotalMbg != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueMbg = $currentValueMbg / $rowTotalMbg;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumMbg += $dividedValueMbg;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueMbg, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumMbg . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsMbg1 = count($tenants_mbg);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnMbg = array_fill_keys($tenants_mbg, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_mbg as $tenant_mbg) {
                foreach ($tenants_mbg as $tenant_mbg2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalMbg = $totalValuesMbg[$tenant_mbg];
                    foreach ($comparison_results_mbg as $result_mbg) {
                        if (($result_mbg['kriteria_mbg'] == $tenant_mbg && $result_mbg['kriteria_mbg2'] == $tenant_mbg2)) {
                            $currentValueMbg = $result_mbg[$alternatif_mbg] / $rowTotalMbg; // Dibagi dengan total baris
                            $totalPerColumnMbg[$tenant_mbg2] += $currentValueMbg;
                            break;
                        } elseif (($result_mbg['kriteria_mbg'] == $tenant_mbg2 && $result_mbg['kriteria_mbg2'] == $tenant_mbg)) {
                            $currentValueMbg = 1 / $result_mbg[$alternatif_mbg] / $rowTotalMbg; // Dibagi dengan total baris
                            $totalPerColumnMbg[$tenant_mbg2] += $currentValueMbg;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnMbg as $tenant_mbg => $totalMbg) {
                $totalPerColumnMbg[$tenant_mbg] /= $numTenantsMbg1;
            }

            // Menghitung total dari hasil
            $totalResultMbg = 0;
            foreach ($totalPerColumnMbg as $totalMbg) {
                $totalResultMbg += $totalMbg;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_mbg as $tenant_mbg) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnMbg[$tenant_mbg], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultMbg</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            $_SESSION['eigenvector_mbg'] = $totalPerColumnMbg;

            // Hitung Lambda Max
            $lambdaMaxMbg = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_mbg as $tenant_mbg) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantMbg = $totalValuesMbg[$tenant_mbg];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantMbg = $totalPerColumnMbg[$tenant_mbg];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxMbg += $totalValueForTenantMbg * $eigenvectorForTenantMbg;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxMbg, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexMbg = 0;
            switch ($numTenantsMbg1) {
                case 1:
                    $randomConsistencyIndexMbg = 0;
                    break;
                case 2:
                    $randomConsistencyIndexMbg = 0;
                    break;
                case 3:
                    $randomConsistencyIndexMbg = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexMbg = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexMbg = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexMbg = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexMbg = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexMbg = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexMbg = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexMbg = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexMbg = ($lambdaMaxMbg - $numTenantsMbg1) / ($numTenantsMbg1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioMbg = $consistencyIndexMbg / $randomConsistencyIndexMbg;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexMbg, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsMbg1 elemen: " . $randomConsistencyIndexMbg . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioMbg, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioMbg < 0.1) {
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
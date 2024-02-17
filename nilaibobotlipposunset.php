<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_lipposunset'])) {
    $_SESSION['comparison_results_lipposunset'] = [];
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
                    <input type="text" name="alternatif_lipposunset" class="form-control" value="A07 - Lippo Plaza Sunset" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_lipposunset" class="form-select">
                        <?php
                        $tenants_lipposunset = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_lipposunset as $tenant_lipposunset) {
                            echo "<option value=\"$tenant_lipposunset\">$tenant_lipposunset</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_lipposunset" class="form-select">
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
            // Get input values
            $alternatif_lipposunset = $_POST['alternatif_lipposunset'];
            $kriteria_lipposunset = $_POST['kriteria_lipposunset'];
            $comparison_value_lipposunset = $_POST['comparison_lipposunset'];
            $kriteria_lipposunset2 = $_POST['kriteria_lipposunset2'];

            // Retrieve comparison results from session
            $comparison_results_lipposunset = $_SESSION['comparison_results_lipposunset'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_lipposunset as $key_lipposunset => $result_lipposunset) {
                if ($result_lipposunset['kriteria_lipposunset'] == $kriteria_lipposunset && $result_lipposunset['kriteria_lipposunset2'] == $kriteria_lipposunset2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_lipposunset[$key_lipposunset][$alternatif_lipposunset] = $comparison_value_lipposunset;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_lipposunset[] = array(
                    'kriteria_lipposunset' => $kriteria_lipposunset,
                    'kriteria_lipposunset2' => $kriteria_lipposunset2,
                    $alternatif_lipposunset => $comparison_value_lipposunset
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_lipposunset'] = $comparison_results_lipposunset;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<th>$tenant_lipposunset</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesLippoSunset = array_fill_keys($tenants_lipposunset, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_lipposunset as $tenant_lipposunset1) {
                echo "<tr>";
                echo "<td>$tenant_lipposunset1</td>";
                $totalRowLippoSunset = 0; // Total for this row

                foreach ($tenants_lipposunset as $tenant_lipposunset2) {
                    $comparisonValueLippoSunset = null;
                    $isInverseLippoSunset = false; // Flag to check if the comparison is inverse

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
                            echo "<td>" . number_format($comparisonValueLippoSunset, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueLippoSunset, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowLippoSunset += $comparisonValueLippoSunset;
                        $totalValuesLippoSunset[$tenant_lipposunset1] += $comparisonValueLippoSunset;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowLippoSunset, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<th>$tenant_lipposunset</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                echo "<tr>";
                echo "<td>$tenant_lipposunset</td>";

                // Get the total for this row
                $rowTotalLippoSunset = $totalValuesLippoSunset[$tenant_lipposunset];

                // Initialize the sum of divided values for this row
                $dividedValuesSumLippoSunset = 0;

                foreach ($tenants_lipposunset as $tenant_lipposunset2) {
                    // Get the current value in the table
                    $currentValueLippoSunset = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_lipposunset as $result_lipposunset) {
                        if (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset2)) {
                            $currentValueLippoSunset = $result_lipposunset[$alternatif_lipposunset];
                            break;
                        } elseif (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset2 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueLippoSunset = 1 / $result_lipposunset[$alternatif_lipposunset];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueLippoSunset = 0;
                    if ($rowTotalLippoSunset != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueLippoSunset = $currentValueLippoSunset / $rowTotalLippoSunset;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumLippoSunset += $dividedValueLippoSunset;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueLippoSunset, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumLippoSunset . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsLippoSunset1 = count($tenants_lipposunset);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnLippoSunset = array_fill_keys($tenants_lipposunset, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                foreach ($tenants_lipposunset as $tenant_lipposunset2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalLippoSunset = $totalValuesLippoSunset[$tenant_lipposunset];
                    foreach ($comparison_results_lipposunset as $result_lipposunset) {
                        if (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset2)) {
                            $currentValueLippoSunset = $result_lipposunset[$alternatif_lipposunset] / $rowTotalLippoSunset; // Dibagi dengan total baris
                            $totalPerColumnLippoSunset[$tenant_lipposunset2] += $currentValueLippoSunset;
                            break;
                        } elseif (($result_lipposunset['kriteria_lipposunset'] == $tenant_lipposunset2 && $result_lipposunset['kriteria_lipposunset2'] == $tenant_lipposunset)) {
                            $currentValueLippoSunset = 1 / $result_lipposunset[$alternatif_lipposunset] / $rowTotalLippoSunset; // Dibagi dengan total baris
                            $totalPerColumnLippoSunset[$tenant_lipposunset2] += $currentValueLippoSunset;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnLippoSunset as $tenant_lipposunset => $totalLippoSunset) {
                $totalPerColumnLippoSunset[$tenant_lipposunset] /= $numTenantsLippoSunset1;
            }

            // Menghitung total dari hasil
            $totalResultLippoSunset = 0;
            foreach ($totalPerColumnLippoSunset as $totalLippoSunset) {
                $totalResultLippoSunset += $totalLippoSunset;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnLippoSunset[$tenant_lipposunset], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultLippoSunset</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxLippoSunset = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_lipposunset as $tenant_lipposunset) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantLippoSunset = $totalValuesLippoSunset[$tenant_lipposunset];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantLippoSunset = $totalPerColumnLippoSunset[$tenant_lipposunset];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxLippoSunset += $totalValueForTenantLippoSunset * $eigenvectorForTenantLippoSunset;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLippoSunset, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexLippoSunset = 0;
            switch ($numTenantsLippoSunset1) {
                case 1:
                    $randomConsistencyIndexLippoSunset = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLippoSunset = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLippoSunset = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLippoSunset = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLippoSunset = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLippoSunset = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLippoSunset = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLippoSunset = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLippoSunset = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLippoSunset = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexLippoSunset = ($lambdaMaxLippoSunset - $numTenantsLippoSunset1) / ($numTenantsLippoSunset1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioLippoSunset = $consistencyIndexLippoSunset / $randomConsistencyIndexLippoSunset;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexLippoSunset, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsLippoSunset1 elemen: " . $randomConsistencyIndexLippoSunset . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioLippoSunset, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioLippoSunset < 0.1) {
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
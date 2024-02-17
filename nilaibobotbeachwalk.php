<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_bw'])) {
    $_SESSION['comparison_results_bw'] = [];
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
                    <input type="text" name="alternatif_bw" class="form-control" value="A13 - Beachwalk Shopping Centre" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_bw" class="form-select">
                        <?php
                        $tenants_bw = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_bw as $tenant_bw) {
                            echo "<option value=\"$tenant_bw\">$tenant_bw</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_bw" class="form-select">
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
                    <select name="kriteria_bw2" class="form-select">
                        <?php
                        foreach ($tenants_bw as $tenant_bw) {
                            echo "<option value=\"$tenant_bw\">$tenant_bw</option>";
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
            $alternatif_bw = $_POST['alternatif_bw'];
            $kriteria_bw = $_POST['kriteria_bw'];
            $comparison_value_bw = $_POST['comparison_bw'];
            $kriteria_bw2 = $_POST['kriteria_bw2'];

            // Retrieve comparison results from session
            $comparison_results_bw = $_SESSION['comparison_results_bw'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_bw as $key_bw => $result_bw) {
                if ($result_bw['kriteria_bw'] == $kriteria_bw && $result_bw['kriteria_bw2'] == $kriteria_bw2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_bw[$key_bw][$alternatif_bw] = $comparison_value_bw;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_bw[] = array(
                    'kriteria_bw' => $kriteria_bw,
                    'kriteria_bw2' => $kriteria_bw2,
                    $alternatif_bw => $comparison_value_bw
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_bw'] = $comparison_results_bw;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_bw as $tenant_bw) {
                echo "<th>$tenant_bw</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesBw = array_fill_keys($tenants_bw, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_bw as $tenant_bw1) {
                echo "<tr>";
                echo "<td>$tenant_bw1</td>";
                $totalRowBw = 0; // Total for this row

                foreach ($tenants_bw as $tenant_bw2) {
                    $comparisonValueBw = null;
                    $isInverseBw = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_bw as $result_bw) {
                        if (($result_bw['kriteria_bw'] == $tenant_bw1 && $result_bw['kriteria_bw2'] == $tenant_bw2)) {
                            $comparisonValueBw = $result_bw[$alternatif_bw];
                            break;
                        } elseif (($result_bw['kriteria_bw'] == $tenant_bw2 && $result_bw['kriteria_bw2'] == $tenant_bw1)) {
                            $comparisonValueBw = 1 / $result_bw[$alternatif_bw]; // Take the inverse
                            $isInverseBw = true;
                            break;
                        }
                    }

                    if ($comparisonValueBw !== null) {
                        if ($isInverseBw) {
                            echo "<td>" . number_format($comparisonValueBw, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueBw, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowBw += $comparisonValueBw;
                        $totalValuesBw[$tenant_bw1] += $comparisonValueBw;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowBw, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_bw as $tenant_bw) {
                echo "<th>$tenant_bw</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_bw as $tenant_bw) {
                echo "<tr>";
                echo "<td>$tenant_bw</td>";

                // Get the total for this row
                $rowTotalBw = $totalValuesBw[$tenant_bw];

                // Initialize the sum of divided values for this row
                $dividedValuesSumBw = 0;

                foreach ($tenants_bw as $tenant_bw2) {
                    // Get the current value in the table
                    $currentValueBw = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_bw as $result_bw) {
                        if (($result_bw['kriteria_bw'] == $tenant_bw && $result_bw['kriteria_bw2'] == $tenant_bw2)) {
                            $currentValueBw = $result_bw[$alternatif_bw];
                            break;
                        } elseif (($result_bw['kriteria_bw'] == $tenant_bw2 && $result_bw['kriteria_bw2'] == $tenant_bw)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueBw = 1 / $result_bw[$alternatif_bw];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueBw = 0;
                    if ($rowTotalBw != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueBw = $currentValueBw / $rowTotalBw;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumBw += $dividedValueBw;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueBw, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumBw . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsBw1 = count($tenants_bw);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnBw = array_fill_keys($tenants_bw, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_bw as $tenant_bw) {
                foreach ($tenants_bw as $tenant_bw2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalBw = $totalValuesBw[$tenant_bw];
                    foreach ($comparison_results_bw as $result_bw) {
                        if (($result_bw['kriteria_bw'] == $tenant_bw && $result_bw['kriteria_bw2'] == $tenant_bw2)) {
                            $currentValueBw = $result_bw[$alternatif_bw] / $rowTotalBw; // Dibagi dengan total baris
                            $totalPerColumnBw[$tenant_bw2] += $currentValueBw;
                            break;
                        } elseif (($result_bw['kriteria_bw'] == $tenant_bw2 && $result_bw['kriteria_bw2'] == $tenant_bw)) {
                            $currentValueBw = 1 / $result_bw[$alternatif_bw] / $rowTotalBw; // Dibagi dengan total baris
                            $totalPerColumnBw[$tenant_bw2] += $currentValueBw;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnBw as $tenant_bw => $totalBw) {
                $totalPerColumnBw[$tenant_bw] /= $numTenantsBw1;
            }

            // Menghitung total dari hasil
            $totalResultBw = 0;
            foreach ($totalPerColumnBw as $totalBw) {
                $totalResultBw += $totalBw;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_bw as $tenant_bw) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnBw[$tenant_bw], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultBw</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxBw = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_bw as $tenant_bw) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantBw = $totalValuesBw[$tenant_bw];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantBw = $totalPerColumnBw[$tenant_bw];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxBw += $totalValueForTenantBw * $eigenvectorForTenantBw;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxBw, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexBw = 0;
            switch ($numTenantsBw1) {
                case 1:
                    $randomConsistencyIndexBw = 0;
                    break;
                case 2:
                    $randomConsistencyIndexBw = 0;
                    break;
                case 3:
                    $randomConsistencyIndexBw = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexBw = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexBw = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexBw = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexBw = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexBw = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexBw = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexBw = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexBw = ($lambdaMaxBw - $numTenantsBw1) / ($numTenantsBw1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioBw = $consistencyIndexBw / $randomConsistencyIndexBw;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexBw, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsBw1 elemen: " . $randomConsistencyIndexBw . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioBw, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioBw < 0.1) {
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
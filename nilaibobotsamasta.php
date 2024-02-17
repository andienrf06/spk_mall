<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_samasta'])) {
    $_SESSION['comparison_results_samasta'] = [];
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
                    <input type="text" name="alternatif_samasta" class="form-control" value="A02 - Samasta Lifestyle Village" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_samasta" class="form-select">
                        <?php
                        $tenants_samasta = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_samasta as $tenant_samasta) {
                            echo "<option value=\"$tenant_samasta\">$tenant_samasta</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_samasta" class="form-select">
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
                    <select name="kriteria_samasta2" class="form-select">
                        <?php
                        foreach ($tenants_samasta as $tenant_samasta) {
                            echo "<option value=\"$tenant_samasta\">$tenant_samasta</option>";
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
            $alternatif_samasta = $_POST['alternatif_samasta'];
            $kriteria_samasta = $_POST['kriteria_samasta'];
            $comparison_value_samasta = $_POST['comparison_samasta'];
            $kriteria_samasta2 = $_POST['kriteria_samasta2'];

            // Retrieve comparison results from session
            $comparison_results_samasta = $_SESSION['comparison_results_samasta'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_samasta as $key_samasta => $result_samasta) {
                if ($result_samasta['kriteria_samasta'] == $kriteria_samasta && $result_samasta['kriteria_samasta2'] == $kriteria_samasta2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_samasta[$key_samasta][$alternatif_samasta] = $comparison_value_samasta;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_samasta[] = array(
                    'kriteria_samasta' => $kriteria_samasta,
                    'kriteria_samasta2' => $kriteria_samasta2,
                    $alternatif_samasta => $comparison_value_samasta
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_samasta'] = $comparison_results_samasta;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<th>$tenant_samasta</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesSamasta = array_fill_keys($tenants_samasta, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_samasta as $tenant_samasta1) {
                echo "<tr>";
                echo "<td>$tenant_samasta1</td>";
                $totalRowSamasta = 0; // Total for this row

                foreach ($tenants_samasta as $tenant_samasta2) {
                    $comparisonValueSamasta = null;
                    $isInverseSamasta = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_samasta as $result_samasta) {
                        if (($result_samasta['kriteria_samasta'] == $tenant_samasta1 && $result_samasta['kriteria_samasta2'] == $tenant_samasta2)) {
                            $comparisonValueSamasta = $result_samasta[$alternatif_samasta];
                            break;
                        } elseif (($result_samasta['kriteria_samasta'] == $tenant_samasta2 && $result_samasta['kriteria_samasta2'] == $tenant_samasta1)) {
                            $comparisonValueSamasta = 1 / $result_samasta[$alternatif_samasta]; // Take the inverse
                            $isInverseSamasta = true;
                            break;
                        }
                    }

                    if ($comparisonValueSamasta !== null) {
                        if ($isInverseSamasta) {
                            echo "<td>" . number_format($comparisonValueSamasta, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueSamasta, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowSamasta += $comparisonValueSamasta;
                        $totalValuesSamasta[$tenant_samasta1] += $comparisonValueSamasta;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowSamasta, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<th>$tenant_samasta</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<tr>";
                echo "<td>$tenant_samasta</td>";

                // Get the total for this row
                $rowTotalSamasta = $totalValuesSamasta[$tenant_samasta];

                // Initialize the sum of divided values for this row
                $dividedValuesSumSamasta = 0;

                foreach ($tenants_samasta as $tenant_samasta2) {
                    // Get the current value in the table
                    $currentValueSamasta = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_samasta as $result_samasta) {
                        if (($result_samasta['kriteria_samasta'] == $tenant_samasta && $result_samasta['kriteria_samasta2'] == $tenant_samasta2)) {
                            $currentValueSamasta = $result_samasta[$alternatif_samasta];
                            break;
                        } elseif (($result_samasta['kriteria_samasta'] == $tenant_samasta2 && $result_samasta['kriteria_samasta2'] == $tenant_samasta)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueSamasta = 1 / $result_samasta[$alternatif_samasta];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueSamasta = 0;
                    if ($rowTotalSamasta != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueSamasta = $currentValueSamasta / $rowTotalSamasta;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumSamasta += $dividedValueSamasta;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueSamasta, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumSamasta . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsSamasta1 = count($tenants_samasta);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnSamasta = array_fill_keys($tenants_samasta, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_samasta as $tenant_samasta) {
                foreach ($tenants_samasta as $tenant_samasta2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalSamasta = $totalValuesSamasta[$tenant_samasta];
                    foreach ($comparison_results_samasta as $result_samasta) {
                        if (($result_samasta['kriteria_samasta'] == $tenant_samasta && $result_samasta['kriteria_samasta2'] == $tenant_samasta2)) {
                            $currentValueSamasta = $result_samasta[$alternatif_samasta] / $rowTotalSamasta; // Dibagi dengan total baris
                            $totalPerColumnSamasta[$tenant_samasta2] += $currentValueSamasta;
                            break;
                        } elseif (($result_samasta['kriteria_samasta'] == $tenant_samasta2 && $result_samasta['kriteria_samasta2'] == $tenant_samasta)) {
                            $currentValueSamasta = 1 / $result_samasta[$alternatif_samasta] / $rowTotalSamasta; // Dibagi dengan total baris
                            $totalPerColumnSamasta[$tenant_samasta2] += $currentValueSamasta;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnSamasta as $tenant_samasta => $totalSamasta) {
                $totalPerColumnSamasta[$tenant_samasta] /= $numTenantsSamasta1;
            }

            // Menghitung total dari hasil
            $totalResultSamasta = 0;
            foreach ($totalPerColumnSamasta as $totalSamasta) {
                $totalResultSamasta += $totalSamasta;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_samasta as $tenant_samasta) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnSamasta[$tenant_samasta], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultSamasta</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Simpan nilai eigenvector dalam sesi
            $_SESSION['eigenvector_samasta'] = $totalPerColumnSamasta;

            // Hitung Lambda Max
            $lambdaMaxSamasta = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_samasta as $tenant_samasta) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantSamasta = $totalValuesSamasta[$tenant_samasta];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantSamasta = $totalPerColumnSamasta[$tenant_samasta];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxSamasta += $totalValueForTenantSamasta * $eigenvectorForTenantSamasta;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxSamasta, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexSamasta = 0;
            switch ($numTenantsSamasta1) {
                case 1:
                    $randomConsistencyIndexSamasta = 0;
                    break;
                case 2:
                    $randomConsistencyIndexSamasta = 0;
                    break;
                case 3:
                    $randomConsistencyIndexSamasta = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexSamasta = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexSamasta = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexSamasta = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexSamasta = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexSamasta = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexSamasta = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexSamasta = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexSamasta = ($lambdaMaxSamasta - $numTenantsSamasta1) / ($numTenantsSamasta1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioSamasta = $consistencyIndexSamasta / $randomConsistencyIndexSamasta;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexSamasta, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsSamasta1 elemen: " . $randomConsistencyIndexSamasta . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioSamasta, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioSamasta < 0.1) {
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
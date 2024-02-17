<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_sidewalk'])) {
    $_SESSION['comparison_results_sidewalk'] = [];
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
                    <input type="text" name="alternatif_sidewalk" class="form-control" value="A03 - Sidewalk Jimbaran" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_sidewalk" class="form-select">
                        <?php
                        $tenants_sidewalk = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_sidewalk as $tenant_sidewalk) {
                            echo "<option value=\"$tenant_sidewalk\">$tenant_sidewalk</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_sidewalk" class="form-select">
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
                    <select name="kriteria_sidewalk2" class="form-select">
                        <?php
                        foreach ($tenants_sidewalk as $tenant_sidewalk) {
                            echo "<option value=\"$tenant_sidewalk\">$tenant_sidewalk</option>";
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
            $alternatif_sidewalk = $_POST['alternatif_sidewalk'];
            $kriteria_sidewalk = $_POST['kriteria_sidewalk'];
            $comparison_value_sidewalk = $_POST['comparison_sidewalk'];
            $kriteria_sidewalk2 = $_POST['kriteria_sidewalk2'];

            // Retrieve comparison results from session
            $comparison_results_sidewalk = $_SESSION['comparison_results_sidewalk'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_sidewalk as $key_sidewalk => $result_sidewalk) {
                if ($result_sidewalk['kriteria_sidewalk'] == $kriteria_sidewalk && $result_sidewalk['kriteria_sidewalk2'] == $kriteria_sidewalk2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_sidewalk[$key_sidewalk][$alternatif_sidewalk] = $comparison_value_sidewalk;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_sidewalk[] = array(
                    'kriteria_sidewalk' => $kriteria_sidewalk,
                    'kriteria_sidewalk2' => $kriteria_sidewalk2,
                    $alternatif_sidewalk => $comparison_value_sidewalk
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_sidewalk'] = $comparison_results_sidewalk;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<th>$tenant_sidewalk</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesSidewalk = array_fill_keys($tenants_sidewalk, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_sidewalk as $tenant_sidewalk1) {
                echo "<tr>";
                echo "<td>$tenant_sidewalk1</td>";
                $totalRowSidewalk = 0; // Total for this row

                foreach ($tenants_sidewalk as $tenant_sidewalk2) {
                    $comparisonValueSidewalk = null;
                    $isInverseSidewalk = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_sidewalk as $result_sidewalk) {
                        if (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk1 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk2)) {
                            $comparisonValueSidewalk = $result_sidewalk[$alternatif_sidewalk];
                            break;
                        } elseif (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk2 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk1)) {
                            $comparisonValueSidewalk = 1 / $result_sidewalk[$alternatif_sidewalk]; // Take the inverse
                            $isInverseSidewalk = true;
                            break;
                        }
                    }

                    if ($comparisonValueSidewalk !== null) {
                        if ($isInverseSidewalk) {
                            echo "<td>" . number_format($comparisonValueSidewalk, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueSidewalk, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowSidewalk += $comparisonValueSidewalk;
                        $totalValuesSidewalk[$tenant_sidewalk1] += $comparisonValueSidewalk;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowSidewalk, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<th>$tenant_sidewalk</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<tr>";
                echo "<td>$tenant_sidewalk</td>";

                // Get the total for this row
                $rowTotalSidewalk = $totalValuesSidewalk[$tenant_sidewalk];

                // Initialize the sum of divided values for this row
                $dividedValuesSumSidewalk = 0;

                foreach ($tenants_sidewalk as $tenant_sidewalk2) {
                    // Get the current value in the table
                    $currentValueSidewalk = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_sidewalk as $result_sidewalk) {
                        if (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk2)) {
                            $currentValueSidewalk = $result_sidewalk[$alternatif_sidewalk];
                            break;
                        } elseif (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk2 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueSidewalk = 1 / $result_sidewalk[$alternatif_sidewalk];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueSidewalk = 0;
                    if ($rowTotalSidewalk != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueSidewalk = $currentValueSidewalk / $rowTotalSidewalk;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumSidewalk += $dividedValueSidewalk;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueSidewalk, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumSidewalk . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsSidewalk1 = count($tenants_sidewalk);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnSidewalk = array_fill_keys($tenants_sidewalk, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                foreach ($tenants_sidewalk as $tenant_sidewalk2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalSidewalk = $totalValuesSidewalk[$tenant_sidewalk];
                    foreach ($comparison_results_sidewalk as $result_sidewalk) {
                        if (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk2)) {
                            $currentValueSidewalk = $result_sidewalk[$alternatif_sidewalk] / $rowTotalSidewalk; // Dibagi dengan total baris
                            $totalPerColumnSidewalk[$tenant_sidewalk2] += $currentValueSidewalk;
                            break;
                        } elseif (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk2 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk)) {
                            $currentValueSidewalk = 1 / $result_sidewalk[$alternatif_sidewalk] / $rowTotalSidewalk; // Dibagi dengan total baris
                            $totalPerColumnSidewalk[$tenant_sidewalk2] += $currentValueSidewalk;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnSidewalk as $tenant_sidewalk => $totalSidewalk) {
                $totalPerColumnSidewalk[$tenant_sidewalk] /= $numTenantsSidewalk1;
            }

            // Menghitung total dari hasil
            $totalResultSidewalk = 0;
            foreach ($totalPerColumnSidewalk as $totalSidewalk) {
                $totalResultSidewalk += $totalSidewalk;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnSidewalk[$tenant_sidewalk], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultSidewalk</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Simpan nilai eigenvector dalam sesi
            $_SESSION['eigenvector_sidewalk'] = $totalPerColumnSidewalk;

            // Hitung Lambda Max
            $lambdaMaxSidewalk = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantSidewalk = $totalValuesSidewalk[$tenant_sidewalk];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantSidewalk = $totalPerColumnSidewalk[$tenant_sidewalk];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxSidewalk += $totalValueForTenantSidewalk * $eigenvectorForTenantSidewalk;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxSidewalk, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexSidewalk = 0;
            switch ($numTenantsSidewalk1) {
                case 1:
                    $randomConsistencyIndexSidewalk = 0;
                    break;
                case 2:
                    $randomConsistencyIndexSidewalk = 0;
                    break;
                case 3:
                    $randomConsistencyIndexSidewalk = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexSidewalk = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexSidewalk = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexSidewalk = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexSidewalk = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexSidewalk = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexSidewalk = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexSidewalk = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexSidewalk = ($lambdaMaxSidewalk - $numTenantsSidewalk1) / ($numTenantsSidewalk1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioSidewalk = $consistencyIndexSidewalk / $randomConsistencyIndexSidewalk;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexSidewalk, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsSidewalk1 elemen: " . $randomConsistencyIndexSidewalk . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioSidewalk, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioSidewalk < 0.1) {
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
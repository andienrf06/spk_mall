<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_ramayana'])) {
    $_SESSION['comparison_results_ramayana'] = [];
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
                    <input type="text" name="alternatif_ramayana" class="form-control" value="A16 - Ramayana Bali Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_ramayana" class="form-select">
                        <?php
                        $tenants_ramayana = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_ramayana as $tenant_ramayana) {
                            echo "<option value=\"$tenant_ramayana\">$tenant_ramayana</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_ramayana" class="form-select">
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
                    <select name="kriteria_ramayana2" class="form-select">
                        <?php
                        foreach ($tenants_ramayana as $tenant_ramayana) {
                            echo "<option value=\"$tenant_ramayana\">$tenant_ramayana</option>";
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
            $alternatif_ramayana = $_POST['alternatif_ramayana'];
            $kriteria_ramayana = $_POST['kriteria_ramayana'];
            $comparison_value_ramayana = $_POST['comparison_ramayana'];
            $kriteria_ramayana2 = $_POST['kriteria_ramayana2'];

            // Retrieve comparison results from session
            $comparison_results_ramayana = $_SESSION['comparison_results_ramayana'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_ramayana as $key_ramayana => $result_ramayana) {
                if ($result_ramayana['kriteria_ramayana'] == $kriteria_ramayana && $result_ramayana['kriteria_ramayana2'] == $kriteria_ramayana2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_ramayana[$key_ramayana][$alternatif_ramayana] = $comparison_value_ramayana;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_ramayana[] = array(
                    'kriteria_ramayana' => $kriteria_ramayana,
                    'kriteria_ramayana2' => $kriteria_ramayana2,
                    $alternatif_ramayana => $comparison_value_ramayana
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_ramayana'] = $comparison_results_ramayana;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<th>$tenant_ramayana</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesRamayana = array_fill_keys($tenants_ramayana, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_ramayana as $tenant_ramayana1) {
                echo "<tr>";
                echo "<td>$tenant_ramayana1</td>";
                $totalRowRamayana = 0; // Total for this row

                foreach ($tenants_ramayana as $tenant_ramayana2) {
                    $comparisonValueRamayana = null;
                    $isInverseRamayana = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_ramayana as $result_ramayana) {
                        if (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana1 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana2)) {
                            $comparisonValueRamayana = $result_ramayana[$alternatif_ramayana];
                            break;
                        } elseif (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana2 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana1)) {
                            $comparisonValueRamayana = 1 / $result_ramayana[$alternatif_ramayana]; // Take the inverse
                            $isInverseRamayana = true;
                            break;
                        }
                    }

                    if ($comparisonValueRamayana !== null) {
                        if ($isInverseRamayana) {
                            echo "<td>" . number_format($comparisonValueRamayana, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueRamayana, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowRamayana += $comparisonValueRamayana;
                        $totalValuesRamayana[$tenant_ramayana1] += $comparisonValueRamayana;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowRamayana, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<th>$tenant_ramayana</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<tr>";
                echo "<td>$tenant_ramayana</td>";

                // Get the total for this row
                $rowTotalRamayana = $totalValuesRamayana[$tenant_ramayana];

                // Initialize the sum of divided values for this row
                $dividedValuesSumRamayana = 0;

                foreach ($tenants_ramayana as $tenant_ramayana2) {
                    // Get the current value in the table
                    $currentValueRamayana = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_ramayana as $result_ramayana) {
                        if (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana2)) {
                            $currentValueRamayana = $result_ramayana[$alternatif_ramayana];
                            break;
                        } elseif (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana2 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueRamayana = 1 / $result_ramayana[$alternatif_ramayana];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueRamayana = 0;
                    if ($rowTotalRamayana != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueRamayana = $currentValueRamayana / $rowTotalRamayana;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumRamayana += $dividedValueRamayana;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueRamayana, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumRamayana . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsRamayana1 = count($tenants_ramayana);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnRamayana = array_fill_keys($tenants_ramayana, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_ramayana as $tenant_ramayana) {
                foreach ($tenants_ramayana as $tenant_ramayana2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalRamayana = $totalValuesRamayana[$tenant_ramayana];
                    foreach ($comparison_results_ramayana as $result_ramayana) {
                        if (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana2)) {
                            $currentValueRamayana = $result_ramayana[$alternatif_ramayana] / $rowTotalRamayana; // Dibagi dengan total baris
                            $totalPerColumnRamayana[$tenant_ramayana2] += $currentValueRamayana;
                            break;
                        } elseif (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana2 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana)) {
                            $currentValueRamayana = 1 / $result_ramayana[$alternatif_ramayana] / $rowTotalRamayana; // Dibagi dengan total baris
                            $totalPerColumnRamayana[$tenant_ramayana2] += $currentValueRamayana;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnRamayana as $tenant_ramayana => $totalRamayana) {
                $totalPerColumnRamayana[$tenant_ramayana] /= $numTenantsRamayana1;
            }

            // Menghitung total dari hasil
            $totalResultRamayana = 0;
            foreach ($totalPerColumnRamayana as $totalRamayana) {
                $totalResultRamayana += $totalRamayana;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnRamayana[$tenant_ramayana], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultRamayana</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            $_SESSION['eigenvector_ramayana'] = $totalPerColumnRamayana;

            // Hitung Lambda Max
            $lambdaMaxRamayana = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_ramayana as $tenant_ramayana) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantRamayana = $totalValuesRamayana[$tenant_ramayana];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantRamayana = $totalPerColumnRamayana[$tenant_ramayana];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxRamayana += $totalValueForTenantRamayana * $eigenvectorForTenantRamayana;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxRamayana, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexRamayana = 0;
            switch ($numTenantsRamayana1) {
                case 1:
                    $randomConsistencyIndexRamayana = 0;
                    break;
                case 2:
                    $randomConsistencyIndexRamayana = 0;
                    break;
                case 3:
                    $randomConsistencyIndexRamayana = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexRamayana = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexRamayana = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexRamayana = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexRamayana = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexRamayana = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexRamayana = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexRamayana = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexRamayana = ($lambdaMaxRamayana - $numTenantsRamayana1) / ($numTenantsRamayana1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioRamayana = $consistencyIndexRamayana / $randomConsistencyIndexRamayana;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexRamayana, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsRamayana1 elemen: " . $randomConsistencyIndexRamayana . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioRamayana, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioRamayana < 0.1) {
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
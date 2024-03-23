    <?php
    session_start();

    // Initialize the $input_values array
    if (!isset($_SESSION['comparison_results_bc'])) {
        $_SESSION['comparison_results_bc'] = [];
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
                    <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Bali Collection</h2>
                </div>
            </div>

            <form method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="alternatif">Alternatif:</label>
                        <input type="text" name="alternatif_bc" class="form-control" value="A01 - Bali Collection" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select name="kriteria" class="form-select">
                            <?php
                            $tenants = [
                                "Ukuran Gerai",
                                "Harga Gerai",
                                "Jumlah Pesaing Gerai",
                            ];

                            foreach ($tenants as $tenant) {
                                $selected = in_array($tenant, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                                echo "<option value=\"$tenant\" $selected>$tenant</option>";
                            }

                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <select name="comparison_bc" class="form-select">
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
                        <select name="kriteria2" class="form-select">
                            <?php
                            foreach ($tenants as $tenant) {
                                echo "<option value=\"$tenant\">$tenant</option>";
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
                // Check if alternatif_bc is set
                if (isset($_POST['alternatif_bc'])) {
                    // Get input values
                    $alternatif_bc = $_POST['alternatif_bc'];
                    $kriteria = $_POST['kriteria'];
                    $comparison_value_bc = $_POST['comparison_bc'];
                    $kriteria2 = $_POST['kriteria2'];

                    // Retrieve comparison_bc results from session
                    $comparison_results_bc = $_SESSION['comparison_results_bc'];

                    // Check if the comparison_bc result_bc for this combination of kriteria and kriteria2 already exists
                    $exists = false;
                    foreach ($comparison_results_bc as $key_bc => $result_bc) {
                        if ($result_bc['kriteria'] == $kriteria && $result_bc['kriteria2'] == $kriteria2) {
                            $exists = true;
                            // Update the comparison_bc value
                            $comparison_results_bc[$key_bc][$alternatif_bc] = $comparison_value_bc;
                            break; // Break the loop after updating the comparison_bc value
                        } elseif ($result_bc['kriteria'] == $kriteria2 && $result_bc['kriteria2'] == $kriteria) {
                            $exists = true;
                            // Update the comparison value and its inverse
                            $comparison_results_bc[$key_bc][$alternatif_bc] = $comparison_value_bc;
                            // Update the inverse comparison value
                            $comparison_results_bc[$key_bc][$alternatif_bc] = 1 / $comparison_value_bc;
                            break; // Break the loop after updating the comparison value
                        }
                    }

                    // If the comparison_bc result_bc doesn't exist, add it to the comparison_bc results array
                    if (!$exists) {
                        $comparison_results_bc[] = array(
                            'kriteria' => $kriteria,
                            'kriteria2' => $kriteria2,
                            $alternatif_bc => $comparison_value_bc
                        );
                    }
                    // Update the comparison_bc results in the session
                    $_SESSION['comparison_results_bc'] = $comparison_results_bc;
                } else {
                    // Action if alternatif_bc is not defined
                    echo "Alternatif tidak terdefinisi.";
                }

                echo "<h3>Hasil Perbandingan</h3>";
                echo "<table class ='table table-striped'>";
                echo "<tr><th>Kriteria</th>";
                foreach ($tenants as $tenant) {
                    echo "<th>$tenant</th>";
                }

                // Initialize an array to store the total values for each tenant
                $totalValuesBC = array_fill_keys($tenants, 0);

                // Loop through each tenant for comparison_bc results
                foreach ($tenants as $tenant1) {
                    echo "<tr>";
                    echo "<th>$tenant1</th>";
                    $totalRowBC = 0; // Total for this row

                    foreach ($tenants as $tenant2) {
                        $comparisonValueBC = null;
                        $isInverseBC = false; // Flag to check if the comparison_bc is inverse

                        foreach ($comparison_results_bc as $result_bc) {
                            if (($result_bc['kriteria'] == $tenant1 && $result_bc['kriteria2'] == $tenant2)) {
                                $comparisonValueBC = $result_bc[$alternatif_bc];
                                break;
                            } elseif (($result_bc['kriteria'] == $tenant2 && $result_bc['kriteria2'] == $tenant1)) {
                                $comparisonValueBC = 1 / $result_bc[$alternatif_bc]; // Take the inverse
                                $isInverseBC = true;
                                break;
                            }
                        }

                        if ($comparisonValueBC !== null) {
                            if ($isInverseBC) {
                                echo "<td>" . number_format($comparisonValueBC, 5, '.', '') . "</td>"; // Display inverse comparison_bc value
                            } else {
                                echo "<td>" . number_format($comparisonValueBC, 5, '.', '') . "</td>"; // Display comparison_bc value
                            }
                            $totalValuesBC[$tenant2] += $comparisonValueBC; // Fix here, use tenant2 as key_bc for totalValuesBC
                        } else {
                            echo "<td>-</td>";
                        }
                    }
                }

                // Show the total row after looping through all tenants
                echo "<tr><th>Total</th>";
                $totalTotalBC = 0;
                foreach ($tenants as $tenant) {
                    $totalTotalBC += $totalValuesBC[$tenant];
                    echo "<th>" . number_format($totalValuesBC[$tenant], 5, '.', '') . "</th>";
                }
                echo "</tr>";

                echo "</table>";


                echo "<h3>Hasil Normalisasi Perbandingan</h3>";
                echo "<table class ='table table-striped'>";
                echo "<tr><th>Kriteria</th>";
                foreach ($tenants as $tenant) {
                    echo "<th>$tenant</th>";
                }
                echo "<th>Eigen</th>";

                // Array to store column totals
                $columnTotalsBc = array_fill_keys($tenants, 0);

                // Counting the number of tenants
                $numMallsBc = count($tenants);

                // Initialize an array to store normalized row totals
                $normalizedRowTotalsBc = [];

                // Loop through each ten$tenant for comparison results
                foreach ($tenants as $tenant1) {
                    echo "<tr>";
                    echo "<th>$tenant1</th>";
                    $rowTotalBc = 0; // Menyimpan total per baris

                    foreach ($tenants as $tenant2) {
                        $comparisonValueBC = null;

                        foreach ($comparison_results_bc as $result_bc) {
                            if (($result_bc['kriteria'] == $tenant1 && $result_bc['kriteria2'] == $tenant2)) {
                                $comparisonValueBC = $result_bc[$alternatif_bc];
                                break;
                            } elseif (($result_bc['kriteria'] == $tenant2 && $result_bc['kriteria2'] == $tenant1)) {
                                $comparisonValueBC = 1 / $result_bc[$alternatif_bc]; // Take the inverse
                                break;
                            }
                        }

                        if ($comparisonValueBC !== null) {
                            // Calculate the normalized value
                            $normalizedValueBc = $comparisonValueBC / $totalValuesBC[$tenant2];
                            echo "<td>" . number_format($normalizedValueBc, 5, '.', '') . "</td>";

                            // Add to column totals
                            $columnTotalsBc[$tenant2] += $normalizedValueBc;

                            // Add to row total
                            $rowTotalBc += $normalizedValueBc;
                        } else {
                            echo "<td>-</td>";
                        }
                    }

                    // Calculate normalized row total
                    $normalizedRowTotalBc = $rowTotalBc / $numMallsBc;
                    $normalizedRowTotalsBc[$tenant1] = $normalizedRowTotalBc; // Store normalized row total
                    echo "<td>" . number_format($normalizedRowTotalBc, 5, '.', '') . "</td>";
                }

                // Show the total row after looping through all tenants
                echo "<tr><th>Total</th>";
                foreach ($tenants as $tenant) {
                    echo "<th>" . number_format($columnTotalsBc[$tenant], 5, '.', '') . "</th>";
                }

                // Calculate eigen value and display
                $eigenValueBc = array_sum($columnTotalsBc) / $numMallsBc;
                echo "<th>" . number_format($eigenValueBc, 5, '.', '') . "</th>";

                echo "</tr>";
                echo "</table>";

                // Store the normalized row totals value in the session
                $_SESSION['normalized_row_totals_bc'] = $normalizedRowTotalsBc;


                // echo "Nilai Eigen Vector BC: " . number_format($eigenVectorBC, 5, '.', '') . "<br>";

                // Calculate Lambda Max
                $lambdaMaxBC = 0;
                foreach ($tenants as $tenant) {
                    $lambdaMaxBC += $totalValuesBC[$tenant] * $normalizedRowTotalsBc[$tenant];
                }

                // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxBC, 5, '.', '') . "</p>";

                // Calculate a random consistency value based on the number of tenant elements
                $randomConsistencyIndexBC  = 0;
                switch ($numMallsBc) {
                    case 1:
                        $randomConsistencyIndexBC  = 0;
                        break;
                    case 2:
                        $randomConsistencyIndexBC  = 0;
                        break;
                    case 3:
                        $randomConsistencyIndexBC  = 0.58;
                        break;
                    default:
                        // Handle for more than 10 elements if needed
                        break;
                }

                // Calculate Consistency Index (CI)
                $CIBC = ($lambdaMaxBC - $numMallsBc) / ($numMallsBc - 1);


                // Calculate Consistency Ratio (CR)
                $CRBC = $CIBC / $randomConsistencyIndexBC; // You need to define RI according to your matrix size

                // Show consistency results
                // echo "<p>Nilai Consistency Index (CI): " . number_format($CIBC, 5, '.', '') . "</p>";
                // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsBc elemen: " . $randomConsistencyIndexBC . "</p>";
                // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRBC, 5, '.', '') . "</p>";

                // Check if consistency is acceptable
                if ($CRBC < 0.1) {
                    echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
                } else {
                    echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
                }
            }
            ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
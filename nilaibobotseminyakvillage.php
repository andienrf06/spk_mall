<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_village'])) {
    $_SESSION['comparison_results_village'] = [];
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
                    <input type="text" name="alternatif_village" class="form-control" value="A11 - Seminyak Village" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_village" class="form-select">
                        <?php
                        $tenants_village = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_village as $tenant_village) {
                            echo "<option value=\"$tenant_village\">$tenant_village</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_village" class="form-select">
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
                    <select name="kriteria_village2" class="form-select">
                        <?php
                        foreach ($tenants_village as $tenant_village) {
                            echo "<option value=\"$tenant_village\">$tenant_village</option>";
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
            $alternatif_village = $_POST['alternatif_village'];
            $kriteria_village = $_POST['kriteria_village'];
            $comparison_value_village = $_POST['comparison_village'];
            $kriteria_village2 = $_POST['kriteria_village2'];

            // Retrieve comparison results from session
            $comparison_results_village = $_SESSION['comparison_results_village'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_village as $key_village => $result_village) {
                if ($result_village['kriteria_village'] == $kriteria_village && $result_village['kriteria_village2'] == $kriteria_village2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_village[$key_village][$alternatif_village] = $comparison_value_village;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_village[] = array(
                    'kriteria_village' => $kriteria_village,
                    'kriteria_village2' => $kriteria_village2,
                    $alternatif_village => $comparison_value_village
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_village'] = $comparison_results_village;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_village as $tenant_village) {
                echo "<th>$tenant_village</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesVillage = array_fill_keys($tenants_village, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_village as $tenant_village1) {
                echo "<tr>";
                echo "<td>$tenant_village1</td>";
                $totalRowVillage = 0; // Total for this row

                foreach ($tenants_village as $tenant_village2) {
                    $comparisonValueVillage = null;
                    $isInverseVillage = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_village as $result_village) {
                        if (($result_village['kriteria_village'] == $tenant_village1 && $result_village['kriteria_village2'] == $tenant_village2)) {
                            $comparisonValueVillage = $result_village[$alternatif_village];
                            break;
                        } elseif (($result_village['kriteria_village'] == $tenant_village2 && $result_village['kriteria_village2'] == $tenant_village1)) {
                            $comparisonValueVillage = 1 / $result_village[$alternatif_village]; // Take the inverse
                            $isInverseVillage = true;
                            break;
                        }
                    }

                    if ($comparisonValueVillage !== null) {
                        if ($isInverseVillage) {
                            echo "<td>" . number_format($comparisonValueVillage, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueVillage, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowVillage += $comparisonValueVillage;
                        $totalValuesVillage[$tenant_village1] += $comparisonValueVillage;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowVillage, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_village as $tenant_village) {
                echo "<th>$tenant_village</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_village as $tenant_village) {
                echo "<tr>";
                echo "<td>$tenant_village</td>";

                // Get the total for this row
                $rowTotalVillage = $totalValuesVillage[$tenant_village];

                // Initialize the sum of divided values for this row
                $dividedValuesSumVillage = 0;

                foreach ($tenants_village as $tenant_village2) {
                    // Get the current value in the table
                    $currentValueVillage = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_village as $result_village) {
                        if (($result_village['kriteria_village'] == $tenant_village && $result_village['kriteria_village2'] == $tenant_village2)) {
                            $currentValueVillage = $result_village[$alternatif_village];
                            break;
                        } elseif (($result_village['kriteria_village'] == $tenant_village2 && $result_village['kriteria_village2'] == $tenant_village)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueVillage = 1 / $result_village[$alternatif_village];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueVillage = 0;
                    if ($rowTotalVillage != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueVillage = $currentValueVillage / $rowTotalVillage;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumVillage += $dividedValueVillage;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueVillage, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumVillage . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsVillage1 = count($tenants_village);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnVillage = array_fill_keys($tenants_village, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_village as $tenant_village) {
                foreach ($tenants_village as $tenant_village2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalVillage = $totalValuesVillage[$tenant_village];
                    foreach ($comparison_results_village as $result_village) {
                        if (($result_village['kriteria_village'] == $tenant_village && $result_village['kriteria_village2'] == $tenant_village2)) {
                            $currentValueVillage = $result_village[$alternatif_village] / $rowTotalVillage; // Dibagi dengan total baris
                            $totalPerColumnVillage[$tenant_village2] += $currentValueVillage;
                            break;
                        } elseif (($result_village['kriteria_village'] == $tenant_village2 && $result_village['kriteria_village2'] == $tenant_village)) {
                            $currentValueVillage = 1 / $result_village[$alternatif_village] / $rowTotalVillage; // Dibagi dengan total baris
                            $totalPerColumnVillage[$tenant_village2] += $currentValueVillage;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnVillage as $tenant_village => $totalVillage) {
                $totalPerColumnVillage[$tenant_village] /= $numTenantsVillage1;
            }

            // Menghitung total dari hasil
            $totalResultVillage = 0;
            foreach ($totalPerColumnVillage as $totalVillage) {
                $totalResultVillage += $totalVillage;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_village as $tenant_village) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnVillage[$tenant_village], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultVillage</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxVillage = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_village as $tenant_village) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantVillage = $totalValuesVillage[$tenant_village];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantVillage = $totalPerColumnVillage[$tenant_village];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxVillage += $totalValueForTenantVillage * $eigenvectorForTenantVillage;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxVillage, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexVillage = 0;
            switch ($numTenantsVillage1) {
                case 1:
                    $randomConsistencyIndexVillage = 0;
                    break;
                case 2:
                    $randomConsistencyIndexVillage = 0;
                    break;
                case 3:
                    $randomConsistencyIndexVillage = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexVillage = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexVillage = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexVillage = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexVillage = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexVillage = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexVillage = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexVillage = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexVillage = ($lambdaMaxVillage - $numTenantsVillage1) / ($numTenantsVillage1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioVillage = $consistencyIndexVillage / $randomConsistencyIndexVillage;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexVillage, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsVillage1 elemen: " . $randomConsistencyIndexVillage . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioVillage, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioVillage < 0.1) {
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
<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_discovery'])) {
    $_SESSION['comparison_results_discovery'] = [];
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
                    <input type="text" name="alternatif_discovery" class="form-control" value="A14 - Discovery Shopping Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_discovery" class="form-select">
                        <?php
                        $tenants_discovery = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_discovery as $tenant_discovery) {
                            echo "<option value=\"$tenant_discovery\">$tenant_discovery</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_discovery" class="form-select">
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
                    <select name="kriteria_discovery2" class="form-select">
                        <?php
                        foreach ($tenants_discovery as $tenant_discovery) {
                            echo "<option value=\"$tenant_discovery\">$tenant_discovery</option>";
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
            $alternatif_discovery = $_POST['alternatif_discovery'];
            $kriteria_discovery = $_POST['kriteria_discovery'];
            $comparison_value_discovery = $_POST['comparison_discovery'];
            $kriteria_discovery2 = $_POST['kriteria_discovery2'];

            // Retrieve comparison results from session
            $comparison_results_discovery = $_SESSION['comparison_results_discovery'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_discovery as $key_discovery => $result_discovery) {
                if ($result_discovery['kriteria_discovery'] == $kriteria_discovery && $result_discovery['kriteria_discovery2'] == $kriteria_discovery2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_discovery[$key_discovery][$alternatif_discovery] = $comparison_value_discovery;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_discovery[] = array(
                    'kriteria_discovery' => $kriteria_discovery,
                    'kriteria_discovery2' => $kriteria_discovery2,
                    $alternatif_discovery => $comparison_value_discovery
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_discovery'] = $comparison_results_discovery;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<th>$tenant_discovery</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesDiscovery = array_fill_keys($tenants_discovery, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_discovery as $tenant_discovery1) {
                echo "<tr>";
                echo "<td>$tenant_discovery1</td>";
                $totalRowDiscovery = 0; // Total for this row

                foreach ($tenants_discovery as $tenant_discovery2) {
                    $comparisonValueDiscovery = null;
                    $isInverseDiscovery = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_discovery as $result_discovery) {
                        if (($result_discovery['kriteria_discovery'] == $tenant_discovery1 && $result_discovery['kriteria_discovery2'] == $tenant_discovery2)) {
                            $comparisonValueDiscovery = $result_discovery[$alternatif_discovery];
                            break;
                        } elseif (($result_discovery['kriteria_discovery'] == $tenant_discovery2 && $result_discovery['kriteria_discovery2'] == $tenant_discovery1)) {
                            $comparisonValueDiscovery = 1 / $result_discovery[$alternatif_discovery]; // Take the inverse
                            $isInverseDiscovery = true;
                            break;
                        }
                    }

                    if ($comparisonValueDiscovery !== null) {
                        if ($isInverseDiscovery) {
                            echo "<td>" . number_format($comparisonValueDiscovery, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueDiscovery, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowDiscovery += $comparisonValueDiscovery;
                        $totalValuesDiscovery[$tenant_discovery1] += $comparisonValueDiscovery;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowDiscovery, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<th>$tenant_discovery</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<tr>";
                echo "<td>$tenant_discovery</td>";

                // Get the total for this row
                $rowTotalDiscovery = $totalValuesDiscovery[$tenant_discovery];

                // Initialize the sum of divided values for this row
                $dividedValuesSumDiscovery = 0;

                foreach ($tenants_discovery as $tenant_discovery2) {
                    // Get the current value in the table
                    $currentValueDiscovery = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_discovery as $result_discovery) {
                        if (($result_discovery['kriteria_discovery'] == $tenant_discovery && $result_discovery['kriteria_discovery2'] == $tenant_discovery2)) {
                            $currentValueDiscovery = $result_discovery[$alternatif_discovery];
                            break;
                        } elseif (($result_discovery['kriteria_discovery'] == $tenant_discovery2 && $result_discovery['kriteria_discovery2'] == $tenant_discovery)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueDiscovery = 1 / $result_discovery[$alternatif_discovery];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueDiscovery = 0;
                    if ($rowTotalDiscovery != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueDiscovery = $currentValueDiscovery / $rowTotalDiscovery;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumDiscovery += $dividedValueDiscovery;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueDiscovery, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumDiscovery . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsDiscovery1 = count($tenants_discovery);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnDiscovery = array_fill_keys($tenants_discovery, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_discovery as $tenant_discovery) {
                foreach ($tenants_discovery as $tenant_discovery2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalDiscovery = $totalValuesDiscovery[$tenant_discovery];
                    foreach ($comparison_results_discovery as $result_discovery) {
                        if (($result_discovery['kriteria_discovery'] == $tenant_discovery && $result_discovery['kriteria_discovery2'] == $tenant_discovery2)) {
                            $currentValueDiscovery = $result_discovery[$alternatif_discovery] / $rowTotalDiscovery; // Dibagi dengan total baris
                            $totalPerColumnDiscovery[$tenant_discovery2] += $currentValueDiscovery;
                            break;
                        } elseif (($result_discovery['kriteria_discovery'] == $tenant_discovery2 && $result_discovery['kriteria_discovery2'] == $tenant_discovery)) {
                            $currentValueDiscovery = 1 / $result_discovery[$alternatif_discovery] / $rowTotalDiscovery; // Dibagi dengan total baris
                            $totalPerColumnDiscovery[$tenant_discovery2] += $currentValueDiscovery;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnDiscovery as $tenant_discovery => $totalDiscovery) {
                $totalPerColumnDiscovery[$tenant_discovery] /= $numTenantsDiscovery1;
            }

            // Menghitung total dari hasil
            $totalResultDiscovery = 0;
            foreach ($totalPerColumnDiscovery as $totalDiscovery) {
                $totalResultDiscovery += $totalDiscovery;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_discovery as $tenant_discovery) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnDiscovery[$tenant_discovery], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultDiscovery</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxDiscovery = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_discovery as $tenant_discovery) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantDiscovery = $totalValuesDiscovery[$tenant_discovery];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantDiscovery = $totalPerColumnDiscovery[$tenant_discovery];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxDiscovery += $totalValueForTenantDiscovery * $eigenvectorForTenantDiscovery;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxDiscovery, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexDiscovery = 0;
            switch ($numTenantsDiscovery1) {
                case 1:
                    $randomConsistencyIndexDiscovery = 0;
                    break;
                case 2:
                    $randomConsistencyIndexDiscovery = 0;
                    break;
                case 3:
                    $randomConsistencyIndexDiscovery = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexDiscovery = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexDiscovery = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexDiscovery = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexDiscovery = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexDiscovery = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexDiscovery = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexDiscovery = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexDiscovery = ($lambdaMaxDiscovery - $numTenantsDiscovery1) / ($numTenantsDiscovery1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioDiscovery = $consistencyIndexDiscovery / $randomConsistencyIndexDiscovery;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexDiscovery, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsDiscovery1 elemen: " . $randomConsistencyIndexDiscovery . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioDiscovery, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioDiscovery < 0.1) {
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
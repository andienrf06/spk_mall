<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_discovery'])) {
    $_SESSION['comparison_results_discovery'] = [];
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

                <div class="navb-items d-none d-xl-flex">
                    <a href="pilihmall.php">Pilih Mall</a>
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Discovery Shopping Mall</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_discovery" class="form-control" value="A14 - Discovery Shopping Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_discovery" class="form-select">
                        <?php
                        $tenants_discovery = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_discovery as $tenant_discovery) {
                            $selected = in_array($tenant_discovery, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_discovery\" $selected>$tenant_discovery</option>";
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
            // Check if alternatif_discovery is set
            if (isset($_POST['alternatif_discovery'])) {
                // Get input values
                $alternatif_discovery = $_POST['alternatif_discovery'];
                $kriteria_discovery = $_POST['kriteria_discovery'];
                $comparison_value_discovery = $_POST['comparison_discovery'];
                $kriteria_discovery2 = $_POST['kriteria_discovery2'];

                // Retrieve comparison_discovery results from session
                $comparison_results_discovery = $_SESSION['comparison_results_discovery'];

                // Check if the comparison_discovery result_discovery for this combination of kriteria_discovery and kriteria_discovery2 already exists
                // Jika kriteria_discovery dan kriteria_discovery2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_discovery === $kriteria_discovery2) {
                    $comparison_value_discovery = 1;
                }

                // Check if the comparison_discovery result_discovery for this combination of kriteria_discovery and kriteria_discovery2 already exists
                $exists = false;
                foreach ($comparison_results_discovery as $key_discovery => $result_discovery) {
                    if ($result_discovery['kriteria_discovery'] == $kriteria_discovery && $result_discovery['kriteria_discovery2'] == $kriteria_discovery2) {
                        $exists = true;
                        // Update the comparison_discovery value
                        $comparison_results_discovery[$key_discovery][$alternatif_discovery] = $comparison_value_discovery;
                        break; // Break the loop after updating the comparison_discovery value
                    }
                }

                // If the comparison_discovery result_discovery doesn't exist, add it to the comparison_discovery results array
                if (!$exists) {
                    $comparison_results_discovery[] = array(
                        'kriteria_discovery' => $kriteria_discovery,
                        'kriteria_discovery2' => $kriteria_discovery2,
                        $alternatif_discovery => $comparison_value_discovery
                    );
                }


                // Update the comparison_discovery results in the session
                $_SESSION['comparison_results_discovery'] = $comparison_results_discovery;
            } else {
                // Action if alternatif_discovery is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Comparison_discovery Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_discovery</th>";
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<th>$tenant_discovery</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesDiscovery = array_fill_keys($tenants_discovery, 0);

            // Loop through each tenant for comparison_discovery results
            foreach ($tenants_discovery as $tenant_discovery1) {
                echo "<tr>";
                echo "<td>$tenant_discovery1</td>";
                $totalRowDiscovery = 0; // Total for this row

                foreach ($tenants_discovery as $tenant_discovery2) {
                    $comparisonValueDiscovery = null;
                    $isInverseDiscovery = false; // Flag to check if the comparison_discovery is inverse

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
                            echo "<td>" . number_format($comparisonValueDiscovery, 5, '.', '') . "</td>"; // Display inverse comparison_discovery value
                        } else {
                            echo "<td>" . number_format($comparisonValueDiscovery, 5, '.', '') . "</td>"; // Display comparison_discovery value
                        }
                        $totalValuesDiscovery[$tenant_discovery2] += $comparisonValueDiscovery; // Fix here, use tenant_discovery2 as key_discovery for totalValuesDiscovery
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_discovery
            echo "<tr><td>Total</td>";
            $totalTotalDiscovery = 0;
            foreach ($tenants_discovery as $tenant_discovery) {
                $totalTotalDiscovery += $totalValuesDiscovery[$tenant_discovery];
                echo "<td>" . number_format($totalValuesDiscovery[$tenant_discovery], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<th>$tenant_discovery</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsDiscovery = array_fill_keys($tenants_discovery, 0);

            // Counting the number of tenants$tenants_discovery
            $numMallsDiscovery = count($tenants_discovery);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsDiscovery = [];

            // Loop through each ten$tenant_discovery for comparison results
            foreach ($tenants_discovery as $tenant_discovery1) {
                echo "<tr>";
                echo "<td>$tenant_discovery1</td>";
                $rowTotalDiscovery = 0; // Menyimpan total per baris

                foreach ($tenants_discovery as $tenant_discovery2) {
                    $comparisonValueDiscovery = null;

                    foreach ($comparison_results_discovery as $result_discovery) {
                        if (($result_discovery['kriteria_discovery'] == $tenant_discovery1 && $result_discovery['kriteria_discovery2'] == $tenant_discovery2)) {
                            $comparisonValueDiscovery = $result_discovery[$alternatif_discovery];
                            break;
                        } elseif (($result_discovery['kriteria_discovery'] == $tenant_discovery2 && $result_discovery['kriteria_discovery2'] == $tenant_discovery1)) {
                            $comparisonValueDiscovery = 1 / $result_discovery[$alternatif_discovery]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueDiscovery !== null) {
                        // Calculate the normalized value
                        $normalizedValueDiscovery = $comparisonValueDiscovery / $totalValuesDiscovery[$tenant_discovery2];
                        echo "<td>" . number_format($normalizedValueDiscovery, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsDiscovery[$tenant_discovery2] += $normalizedValueDiscovery;

                        // Add to row total
                        $rowTotalDiscovery += $normalizedValueDiscovery;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalDiscovery = $rowTotalDiscovery / $numMallsDiscovery;
                $normalizedRowTotalsDiscovery[$tenant_discovery1] = $normalizedRowTotalDiscovery; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalDiscovery, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_discovery
            echo "<tr><td>Total</td>";
            foreach ($tenants_discovery as $tenant_discovery) {
                echo "<td>" . number_format($columnTotalsDiscovery[$tenant_discovery], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueDiscovery = array_sum($columnTotalsDiscovery) / $numMallsDiscovery;
            echo "<td>" . number_format($eigenValueDiscovery, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsDiscovery as $tenant_discovery => $rowTotalDiscovery) {
            //     echo "<li><strong>$tenant_discovery:</strong> " . number_format($rowTotalDiscovery, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_discovery'] = $normalizedRowTotalsDiscovery;

            // Calculate Lambda Max
            $lambdaMaxDiscovery = 0;
            foreach ($tenants_discovery as $tenant_discovery) {
                $lambdaMaxDiscovery += $totalValuesDiscovery[$tenant_discovery2] * $normalizedRowTotalDiscovery;
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxDiscovery, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexDiscovery  = 0;
            switch ($numMallsDiscovery) {
                case 1:
                    $randomConsistencyIndexDiscovery  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexDiscovery  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexDiscovery  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexDiscovery  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexDiscovery  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexDiscovery  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexDiscovery  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexDiscovery  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexDiscovery  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexDiscovery  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexDiscovery  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexDiscovery  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexDiscovery  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexDiscovery  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexDiscovery  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIDiscovery = ($lambdaMaxDiscovery - $numMallsDiscovery) / ($numMallsDiscovery - 1);


            // Calculate Consistency Ratio (CR)
            $CRDiscovery = $CIDiscovery / $randomConsistencyIndexDiscovery; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIDiscovery, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsDiscovery elemen: " . $randomConsistencyIndexDiscovery . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRDiscovery, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRDiscovery < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
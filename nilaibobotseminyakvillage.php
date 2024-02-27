<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_village'])) {
    $_SESSION['comparison_results_village'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Seminyak Village</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_village" class="form-control" value="A11 - Seminyak Village" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_village" class="form-select">
                        <?php
                        $tenants_village = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_village as $tenant_village) {
                            $selected = in_array($tenant_village, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_village\" $selected>$tenant_village</option>";
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
            // Check if alternatif_village is set
            if (isset($_POST['alternatif_village'])) {
                // Get input values
                $alternatif_village = $_POST['alternatif_village'];
                $kriteria_village = $_POST['kriteria_village'];
                $comparison_value_village = $_POST['comparison_village'];
                $kriteria_village2 = $_POST['kriteria_village2'];

                // Retrieve comparison_village results from session
                $comparison_results_village = $_SESSION['comparison_results_village'];

                // Check if the comparison_village result_village for this combination of kriteria_village and kriteria_village2 already exists
                // Jika kriteria_village dan kriteria_village2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_village === $kriteria_village2) {
                    $comparison_value_village = 1;
                }

                // Check if the comparison_village result_village for this combination of kriteria_village and kriteria_village2 already exists
                $exists = false;
                foreach ($comparison_results_village as $key_village => $result_village) {
                    if ($result_village['kriteria_village'] == $kriteria_village && $result_village['kriteria_village2'] == $kriteria_village2) {
                        $exists = true;
                        // Update the comparison_village value
                        $comparison_results_village[$key_village][$alternatif_village] = $comparison_value_village;
                        break; // Break the loop after updating the comparison_village value
                    }
                }

                // If the comparison_village result_village doesn't exist, add it to the comparison_village results array
                if (!$exists) {
                    $comparison_results_village[] = array(
                        'kriteria_village' => $kriteria_village,
                        'kriteria_village2' => $kriteria_village2,
                        $alternatif_village => $comparison_value_village
                    );
                }


                // Update the comparison_village results in the session
                $_SESSION['comparison_results_village'] = $comparison_results_village;
            } else {
                // Action if alternatif_village is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Comparison_village Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_village</th>";
            foreach ($tenants_village as $tenant_village) {
                echo "<th>$tenant_village</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesVillage = array_fill_keys($tenants_village, 0);

            // Loop through each tenant for comparison_village results
            foreach ($tenants_village as $tenant_village1) {
                echo "<tr>";
                echo "<td>$tenant_village1</td>";
                $totalRowVillage = 0; // Total for this row

                foreach ($tenants_village as $tenant_village2) {
                    $comparisonValueVillage = null;
                    $isInverseVillage = false; // Flag to check if the comparison_village is inverse

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
                            echo "<td>" . number_format($comparisonValueVillage, 5, '.', '') . "</td>"; // Display inverse comparison_village value
                        } else {
                            echo "<td>" . number_format($comparisonValueVillage, 5, '.', '') . "</td>"; // Display comparison_village value
                        }
                        $totalValuesVillage[$tenant_village2] += $comparisonValueVillage; // Fix here, use tenant_village2 as key_village for totalValuesVillage
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_village
            echo "<tr><td>Total</td>";
            $totalTotalVillage = 0;
            foreach ($tenants_village as $tenant_village) {
                $totalTotalVillage += $totalValuesVillage[$tenant_village];
                echo "<td>" . number_format($totalValuesVillage[$tenant_village], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_village as $tenant_village) {
                echo "<th>$tenant_village</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsVillage = array_fill_keys($tenants_village, 0);

            // Counting the number of tenants$tenants_village
            $numMallsVillage = count($tenants_village);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsVillage = [];

            // Loop through each ten$tenant_village for comparison results
            foreach ($tenants_village as $tenant_village1) {
                echo "<tr>";
                echo "<td>$tenant_village1</td>";
                $rowTotalVillage = 0; // Menyimpan total per baris

                foreach ($tenants_village as $tenant_village2) {
                    $comparisonValueVillage = null;

                    foreach ($comparison_results_village as $result_village) {
                        if (($result_village['kriteria_village'] == $tenant_village1 && $result_village['kriteria_village2'] == $tenant_village2)) {
                            $comparisonValueVillage = $result_village[$alternatif_village];
                            break;
                        } elseif (($result_village['kriteria_village'] == $tenant_village2 && $result_village['kriteria_village2'] == $tenant_village1)) {
                            $comparisonValueVillage = 1 / $result_village[$alternatif_village]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueVillage !== null) {
                        // Calculate the normalized value
                        $normalizedValueVillage = $comparisonValueVillage / $totalValuesVillage[$tenant_village2];
                        echo "<td>" . number_format($normalizedValueVillage, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsVillage[$tenant_village2] += $normalizedValueVillage;

                        // Add to row total
                        $rowTotalVillage += $normalizedValueVillage;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalVillage = $rowTotalVillage / $numMallsVillage;
                $normalizedRowTotalsVillage[$tenant_village1] = $normalizedRowTotalVillage; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalVillage, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_village
            echo "<tr><td>Total</td>";
            foreach ($tenants_village as $tenant_village) {
                echo "<td>" . number_format($columnTotalsVillage[$tenant_village], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueVillage = array_sum($columnTotalsVillage) / $numMallsVillage;
            echo "<td>" . number_format($eigenValueVillage, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsVillage as $tenant_village => $rowTotalVillage) {
            //     echo "<li><strong>$tenant_village:</strong> " . number_format($rowTotalVillage, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_village'] = $normalizedRowTotalsVillage;

            // Calculate Lambda Max
            $lambdaMaxVillage = 0;
            foreach ($tenants_village as $tenant_village) {
                $lambdaMaxVillage += $totalValuesVillage[$tenant_village2] * $normalizedRowTotalVillage;
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxVillage, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexVillage  = 0;
            switch ($numMallsVillage) {
                case 1:
                    $randomConsistencyIndexVillage  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexVillage  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexVillage  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexVillage  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexVillage  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexVillage  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexVillage  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexVillage  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexVillage  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexVillage  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexVillage  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexVillage  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexVillage  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexVillage  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexVillage  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIVillage = ($lambdaMaxVillage - $numMallsVillage) / ($numMallsVillage - 1);


            // Calculate Consistency Ratio (CR)
            $CRVillage = $CIVillage / $randomConsistencyIndexVillage; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIVillage, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsVillage elemen: " . $randomConsistencyIndexVillage . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRVillage, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRVillage < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
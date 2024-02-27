<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_park23'])) {
    $_SESSION['comparison_results_park23'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Park 23</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_park23" class="form-control" value="A04 - Park 23" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_park23" class="form-select">
                        <?php
                        $tenants_park23 = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_park23 as $tenant_park23) {
                            $selected = in_array($tenant_park23, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_park23\" $selected>$tenant_park23</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_park23" class="form-select">
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
                    <select name="kriteria_park232" class="form-select">
                        <?php
                        foreach ($tenants_park23 as $tenant_park23) {
                            echo "<option value=\"$tenant_park23\">$tenant_park23</option>";
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
            // Check if alternatif_park23 is set
            if (isset($_POST['alternatif_park23'])) {
                // Get input values
                $alternatif_park23 = $_POST['alternatif_park23'];
                $kriteria_park23 = $_POST['kriteria_park23'];
                $comparison_value_park23 = $_POST['comparison_park23'];
                $kriteria_park232 = $_POST['kriteria_park232'];

                // Retrieve comparison_park23 results from session
                $comparison_results_park23 = $_SESSION['comparison_results_park23'];

                // Check if the comparison_park23 result_park23 for this combination of kriteria_park23 and kriteria_park232 already exists
                // Jika kriteria_park23 dan kriteria_park232 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_park23 === $kriteria_park232) {
                    $comparison_value_park23 = 1;
                }

                // Check if the comparison_park23 result_park23 for this combination of kriteria_park23 and kriteria_park232 already exists
                $exists = false;
                foreach ($comparison_results_park23 as $key_park23 => $result_park23) {
                    if ($result_park23['kriteria_park23'] == $kriteria_park23 && $result_park23['kriteria_park232'] == $kriteria_park232) {
                        $exists = true;
                        // Update the comparison_park23 value
                        $comparison_results_park23[$key_park23][$alternatif_park23] = $comparison_value_park23;
                        break; // Break the loop after updating the comparison_park23 value
                    }
                }

                // If the comparison_park23 result_park23 doesn't exist, add it to the comparison_park23 results array
                if (!$exists) {
                    $comparison_results_park23[] = array(
                        'kriteria_park23' => $kriteria_park23,
                        'kriteria_park232' => $kriteria_park232,
                        $alternatif_park23 => $comparison_value_park23
                    );
                }


                // Update the comparison_park23 results in the session
                $_SESSION['comparison_results_park23'] = $comparison_results_park23;
            } else {
                // Action if alternatif_park23 is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Comparison_park23 Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_park23</th>";
            foreach ($tenants_park23 as $tenant_park23) {
                echo "<th>$tenant_park23</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesPark23 = array_fill_keys($tenants_park23, 0);

            // Loop through each tenant for comparison_park23 results
            foreach ($tenants_park23 as $tenant_park231) {
                echo "<tr>";
                echo "<td>$tenant_park231</td>";
                $totalRowPark23 = 0; // Total for this row

                foreach ($tenants_park23 as $tenant_park232) {
                    $comparisonValuePark23 = null;
                    $isInversePark23 = false; // Flag to check if the comparison_park23 is inverse

                    foreach ($comparison_results_park23 as $result_park23) {
                        if (($result_park23['kriteria_park23'] == $tenant_park231 && $result_park23['kriteria_park232'] == $tenant_park232)) {
                            $comparisonValuePark23 = $result_park23[$alternatif_park23];
                            break;
                        } elseif (($result_park23['kriteria_park23'] == $tenant_park232 && $result_park23['kriteria_park232'] == $tenant_park231)) {
                            $comparisonValuePark23 = 1 / $result_park23[$alternatif_park23]; // Take the inverse
                            $isInversePark23 = true;
                            break;
                        }
                    }

                    if ($comparisonValuePark23 !== null) {
                        if ($isInversePark23) {
                            echo "<td>" . number_format($comparisonValuePark23, 5, '.', '') . "</td>"; // Display inverse comparison_park23 value
                        } else {
                            echo "<td>" . number_format($comparisonValuePark23, 5, '.', '') . "</td>"; // Display comparison_park23 value
                        }
                        $totalValuesPark23[$tenant_park232] += $comparisonValuePark23; // Fix here, use tenant_park232 as key_park23 for totalValuesPark23
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_park23$tenants_park23
            echo "<tr><td>Total</td>";
            $totalTotalPark23 = 0;
            foreach ($tenants_park23 as $tenant_park23) {
                $totalTotalPark23 += $totalValuesPark23[$tenant_park23];
                echo "<td>" . number_format($totalValuesPark23[$tenant_park23], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_park23 as $tenant_park23) {
                echo "<th>$tenant_park23</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsPark23 = array_fill_keys($tenants_park23, 0);

            // Counting the number of tenants$tenants_park23
            $numMallsPark23 = count($tenants_park23);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsPark23 = [];

            // Loop through each ten$tenant_park23 for comparison results
            foreach ($tenants_park23 as $tenant_park231) {
                echo "<tr>";
                echo "<td>$tenant_park231</td>";
                $rowTotalPark23 = 0; // Menyimpan total per baris

                foreach ($tenants_park23 as $tenant_park232) {
                    $comparisonValuePark23 = null;

                    foreach ($comparison_results_park23 as $result_park23) {
                        if (($result_park23['kriteria_park23'] == $tenant_park231 && $result_park23['kriteria_park232'] == $tenant_park232)) {
                            $comparisonValuePark23 = $result_park23[$alternatif_park23];
                            break;
                        } elseif (($result_park23['kriteria_park23'] == $tenant_park232 && $result_park23['kriteria_park232'] == $tenant_park231)) {
                            $comparisonValuePark23 = 1 / $result_park23[$alternatif_park23]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValuePark23 !== null) {
                        // Calculate the normalized value
                        $normalizedValuePark23 = $comparisonValuePark23 / $totalValuesPark23[$tenant_park232];
                        echo "<td>" . number_format($normalizedValuePark23, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsPark23[$tenant_park232] += $normalizedValuePark23;

                        // Add to row total
                        $rowTotalPark23 += $normalizedValuePark23;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalPark23 = $rowTotalPark23 / $numMallsPark23;
                $normalizedRowTotalsPark23[$tenant_park231] = $normalizedRowTotalPark23; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalPark23, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_park23
            echo "<tr><td>Total</td>";
            foreach ($tenants_park23 as $tenant_park23) {
                echo "<td>" . number_format($columnTotalsPark23[$tenant_park23], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValuePark23 = array_sum($columnTotalsPark23) / $numMallsPark23;
            echo "<td>" . number_format($eigenValuePark23, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsPark23 as $tenant_park23 => $rowTotalPark23) {
            //     echo "<li><strong>$tenant_park23:</strong> " . number_format($rowTotalPark23, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_park23'] = $normalizedRowTotalsPark23;

            // Calculate Lambda Max
            $lambdaMaxPark23 = 0;
            foreach ($tenants_park23 as $tenant_park23) {
                $lambdaMaxPark23 += $totalValuesPark23[$tenant_park232] * $normalizedRowTotalPark23;
            }
            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxPark23, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexPark23  = 0;
            switch ($numMallsPark23) {
                case 1:
                    $randomConsistencyIndexPark23  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexPark23  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexPark23  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexPark23  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexPark23  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexPark23  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexPark23  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexPark23  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexPark23  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexPark23  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexPark23  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexPark23  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexPark23  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexPark23  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexPark23  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIPark23 = ($lambdaMaxPark23 - $numMallsPark23) / ($numMallsPark23 - 1);


            // Calculate Consistency Ratio (CR)
            $CRPark23 = $CIPark23 / $randomConsistencyIndexPark23; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIPark23, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsPark23 elemen: " . $randomConsistencyIndexPark23 . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRPark23, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRPark23 < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
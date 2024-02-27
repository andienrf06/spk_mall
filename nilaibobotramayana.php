<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_ramayana'])) {
    $_SESSION['comparison_results_ramayana'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Ramayana Bali Mall</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_ramayana" class="form-control" value="A16 - Ramayana Bali Mall" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_ramayana" class="form-select">
                        <?php
                        $tenants_ramayana = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_ramayana as $tenant_ramayana) {
                            $selected = in_array($tenant_ramayana, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_ramayana\" $selected>$tenant_ramayana</option>";
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
            // Check if alternatif_ramayana is set
            if (isset($_POST['alternatif_ramayana'])) {
                // Get input values
                $alternatif_ramayana = $_POST['alternatif_ramayana'];
                $kriteria_ramayana = $_POST['kriteria_ramayana'];
                $comparison_value_ramayana = $_POST['comparison_ramayana'];
                $kriteria_ramayana2 = $_POST['kriteria_ramayana2'];

                // Retrieve comparison_ramayana results from session
                $comparison_results_ramayana = $_SESSION['comparison_results_ramayana'];

                // Check if the comparison_ramayana result_ramayana for this combination of kriteria_ramayana and kriteria_ramayana2 already exists
                // Jika kriteria_ramayana dan kriteria_ramayana2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_ramayana === $kriteria_ramayana2) {
                    $comparison_value_ramayana = 1;
                }

                // Check if the comparison_ramayana result_ramayana for this combination of kriteria_ramayana and kriteria_ramayana2 already exists
                $exists = false;
                foreach ($comparison_results_ramayana as $key_ramayana => $result_ramayana) {
                    if ($result_ramayana['kriteria_ramayana'] == $kriteria_ramayana && $result_ramayana['kriteria_ramayana2'] == $kriteria_ramayana2) {
                        $exists = true;
                        // Update the comparison_ramayana value
                        $comparison_results_ramayana[$key_ramayana][$alternatif_ramayana] = $comparison_value_ramayana;
                        break; // Break the loop after updating the comparison_ramayana value
                    }
                }

                // If the comparison_ramayana result_ramayana doesn't exist, add it to the comparison_ramayana results array
                if (!$exists) {
                    $comparison_results_ramayana[] = array(
                        'kriteria_ramayana' => $kriteria_ramayana,
                        'kriteria_ramayana2' => $kriteria_ramayana2,
                        $alternatif_ramayana => $comparison_value_ramayana
                    );
                }


                // Update the comparison_ramayana results in the session
                $_SESSION['comparison_results_ramayana'] = $comparison_results_ramayana;
            } else {
                // Action if alternatif_ramayana is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Comparison_ramayana Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_ramayana</th>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<th>$tenant_ramayana</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesRamayana = array_fill_keys($tenants_ramayana, 0);

            // Loop through each tenant for comparison_ramayana results
            foreach ($tenants_ramayana as $tenant_ramayana1) {
                echo "<tr>";
                echo "<td>$tenant_ramayana1</td>";
                $totalRowRamayana = 0; // Total for this row

                foreach ($tenants_ramayana as $tenant_ramayana2) {
                    $comparisonValueRamayana = null;
                    $isInverseRamayana = false; // Flag to check if the comparison_ramayana is inverse

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
                            echo "<td>" . number_format($comparisonValueRamayana, 5, '.', '') . "</td>"; // Display inverse comparison_ramayana value
                        } else {
                            echo "<td>" . number_format($comparisonValueRamayana, 5, '.', '') . "</td>"; // Display comparison_ramayana value
                        }
                        $totalValuesRamayana[$tenant_ramayana2] += $comparisonValueRamayana; // Fix here, use tenant_ramayana2 as key_ramayana$key_ramayana for totalValuesRamayana
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_ramayana
            echo "<tr><td>Total</td>";
            $totalTotalRamayana = 0;
            foreach ($tenants_ramayana as $tenant_ramayana) {
                $totalTotalRamayana += $totalValuesRamayana[$tenant_ramayana];
                echo "<td>" . number_format($totalValuesRamayana[$tenant_ramayana], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<th>$tenant_ramayana</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals 
            $columnTotalsRamayana = array_fill_keys($tenants_ramayana, 0);

            // Counting the number of tenants$tenants_ramayana
            $numMallsRamayana = count($tenants_ramayana);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsRamayana = [];

            // Loop through each ten$tenant_ramayana for comparison results
            foreach ($tenants_ramayana as $tenant_ramayana1) {
                echo "<tr>";
                echo "<td>$tenant_ramayana1</td>";
                $rowTotalRamayana = 0; // Menyimpan total per baris

                foreach ($tenants_ramayana as $tenant_ramayana2) {
                    $comparisonValueRamayana = null;

                    foreach ($comparison_results_ramayana as $result_ramayana) {
                        if (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana1 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana2)) {
                            $comparisonValueRamayana = $result_ramayana[$alternatif_ramayana];
                            break;
                        } elseif (($result_ramayana['kriteria_ramayana'] == $tenant_ramayana2 && $result_ramayana['kriteria_ramayana2'] == $tenant_ramayana1)) {
                            $comparisonValueRamayana = 1 / $result_ramayana[$alternatif_ramayana]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueRamayana !== null) {
                        // Calculate the normalized value
                        $normalizedValueRamayana = $comparisonValueRamayana / $totalValuesRamayana[$tenant_ramayana2];
                        echo "<td>" . number_format($normalizedValueRamayana, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsRamayana[$tenant_ramayana2] += $normalizedValueRamayana;

                        // Add to row total
                        $rowTotalRamayana += $normalizedValueRamayana;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalRamayana = $rowTotalRamayana / $numMallsRamayana;
                $normalizedRowTotalsRamayana[$tenant_ramayana1] = $normalizedRowTotalRamayana; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalRamayana, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_ramayana
            echo "<tr><td>Total</td>";
            foreach ($tenants_ramayana as $tenant_ramayana) {
                echo "<td>" . number_format($columnTotalsRamayana[$tenant_ramayana], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueRamayana = array_sum($columnTotalsRamayana) / $numMallsRamayana;
            echo "<td>" . number_format($eigenValueRamayana, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsRamayana as $tenant_ramayana => $rowTotalRamayana) {
            //     echo "<li><strong>$tenant_ramayana:</strong> " . number_format($rowTotalRamayana, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_ramayana'] = $normalizedRowTotalsRamayana;

            // Calculate Lambda Max
            $lambdaMaxRamayana = 0;
            foreach ($tenants_ramayana as $tenant_ramayana) {
                $lambdaMaxRamayana += $totalValuesRamayana[$tenant_ramayana2] * $normalizedRowTotalRamayana;
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxRamayana, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexRamayana  = 0;
            switch ($numMallsRamayana) {
                case 1:
                    $randomConsistencyIndexRamayana  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexRamayana  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexRamayana  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexRamayana  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexRamayana  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexRamayana  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexRamayana  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexRamayana  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexRamayana  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexRamayana  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexRamayana  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexRamayana  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexRamayana  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexRamayana  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexRamayana  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIRamayana = ($lambdaMaxRamayana - $numMallsRamayana) / ($numMallsRamayana - 1);


            // Calculate Consistency Ratio (CR)
            $CRRamayana = $CIRamayana / $randomConsistencyIndexRamayana; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIRamayana, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsRamayana elemen: " . $randomConsistencyIndexRamayana . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRRamayana, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRRamayana < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
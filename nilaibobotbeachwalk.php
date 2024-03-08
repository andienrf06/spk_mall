<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_bw'])) {
    $_SESSION['comparison_results_bw'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Beachwalk Shopping Centre</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_bw" class="form-control" value="A07 - Beachwalk Shopping Centre" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_bw" class="form-select">
                        <?php
                        $tenants_bw = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_bw as $tenant_bw) {
                            $selected = in_array($tenant_bw, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_bw\" $selected>$tenant_bw</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_bw" class="form-select">
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
                    <select name="kriteria_bw2" class="form-select">
                        <?php
                        foreach ($tenants_bw as $tenant_bw) {
                            echo "<option value=\"$tenant_bw\">$tenant_bw</option>";
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
            // Check if alternatif_bw is set
            if (isset($_POST['alternatif_bw'])) {
                // Get input values
                $alternatif_bw = $_POST['alternatif_bw'];
                $kriteria_bw = $_POST['kriteria_bw'];
                $comparison_value_bw = $_POST['comparison_bw'];
                $kriteria_bw2 = $_POST['kriteria_bw2'];

                // Retrieve comparison_bw results from session
                $comparison_results_bw = $_SESSION['comparison_results_bw'];

                // Check if the comparison_bw result_bw for this combination of kriteria_bw and kriteria_bw2 already exists
                // Jika kriteria_bw dan kriteria_bw2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_bw === $kriteria_bw2) {
                    $comparison_value_bw = 1;
                }

                // Check if the comparison_bw result_bw for this combination of kriteria_bw and kriteria_bw2 already exists
                $exists = false;
                foreach ($comparison_results_bw as $key_bw => $result_bw) {
                    if ($result_bw['kriteria_bw'] == $kriteria_bw && $result_bw['kriteria_bw2'] == $kriteria_bw2) {
                        $exists = true;
                        // Update the comparison_bw value
                        $comparison_results_bw[$key_bw][$alternatif_bw] = $comparison_value_bw;
                        break; // Break the loop after updating the comparison_bw value
                    }
                }

                // If the comparison_bw result_bw doesn't exist, add it to the comparison_bw results array
                if (!$exists) {
                    $comparison_results_bw[] = array(
                        'kriteria_bw' => $kriteria_bw,
                        'kriteria_bw2' => $kriteria_bw2,
                        $alternatif_bw => $comparison_value_bw
                    );
                }


                // Update the comparison_bw results in the session
                $_SESSION['comparison_results_bw'] = $comparison_results_bw;
            } else {
                // Action if alternatif_bw is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_bw as $tenant_bw) {
                echo "<th>$tenant_bw</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesBw = array_fill_keys($tenants_bw, 0);

            // Loop through each tenant for comparison_bw results
            foreach ($tenants_bw as $tenant_bw1) {
                echo "<tr>";
                echo "<td>$tenant_bw1</td>";
                $totalRowBw = 0; // Total for this row

                foreach ($tenants_bw as $tenant_bw2) {
                    $comparisonValueBw = null;
                    $isInverseBw = false; // Flag to check if the comparison_bw is inverse

                    foreach ($comparison_results_bw as $result_bw) {
                        if (($result_bw['kriteria_bw'] == $tenant_bw1 && $result_bw['kriteria_bw2'] == $tenant_bw2)) {
                            $comparisonValueBw = $result_bw[$alternatif_bw];
                            break;
                        } elseif (($result_bw['kriteria_bw'] == $tenant_bw2 && $result_bw['kriteria_bw2'] == $tenant_bw1)) {
                            $comparisonValueBw = 1 / $result_bw[$alternatif_bw]; // Take the inverse
                            $isInverseBw = true;
                            break;
                        }
                    }

                    if ($comparisonValueBw !== null) {
                        if ($isInverseBw) {
                            echo "<td>" . number_format($comparisonValueBw, 5, '.', '') . "</td>"; // Display inverse comparison_bw value
                        } else {
                            echo "<td>" . number_format($comparisonValueBw, 5, '.', '') . "</td>"; // Display comparison_bw value
                        }
                        $totalValuesBw[$tenant_bw2] += $comparisonValueBw; // Fix here, use tenant_bw2 as key_bw for totalValuesBw
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_bw
            echo "<tr><td>Total</td>";
            $totalTotalBw = 0;
            foreach ($tenants_bw as $tenant_bw) {
                $totalTotalBw += $totalValuesBw[$tenant_bw];
                echo "<td>" . number_format($totalValuesBw[$tenant_bw], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_bw as $tenant_bw) {
                echo "<th>$tenant_bw</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsBw = array_fill_keys($tenants_bw, 0);

            // Counting the number of tenants$tenants_bw
            $numMallsBw = count($tenants_bw);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsBw = [];

            // Loop through each ten$tenant_bw for comparison results
            foreach ($tenants_bw as $tenant_bw1) {
                echo "<tr>";
                echo "<td>$tenant_bw1</td>";
                $rowTotalBw = 0; // Menyimpan total per baris

                foreach ($tenants_bw as $tenant_bw2) {
                    $comparisonValueBw = null;

                    foreach ($comparison_results_bw as $result_bw) {
                        if (($result_bw['kriteria_bw'] == $tenant_bw1 && $result_bw['kriteria_bw2'] == $tenant_bw2)) {
                            $comparisonValueBw = $result_bw[$alternatif_bw];
                            break;
                        } elseif (($result_bw['kriteria_bw'] == $tenant_bw2 && $result_bw['kriteria_bw2'] == $tenant_bw1)) {
                            $comparisonValueBw = 1 / $result_bw[$alternatif_bw]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueBw !== null) {
                        // Calculate the normalized value
                        $normalizedValueBw = $comparisonValueBw / $totalValuesBw[$tenant_bw2];
                        echo "<td>" . number_format($normalizedValueBw, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsBw[$tenant_bw2] += $normalizedValueBw;

                        // Add to row total
                        $rowTotalBw += $normalizedValueBw;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalBw = $rowTotalBw / $numMallsBw;
                $normalizedRowTotalsBw[$tenant_bw1] = $normalizedRowTotalBw; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalBw, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_bw
            echo "<tr><td>Total</td>";
            foreach ($tenants_bw as $tenant_bw) {
                echo "<td>" . number_format($columnTotalsBw[$tenant_bw], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueBw = array_sum($columnTotalsBw) / $numMallsBw;
            echo "<td>" . number_format($eigenValueBw, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsBw as $tenant_bw => $rowTotalBw) {
            //     echo "<li><strong>$tenant_bw:</strong> " . number_format($rowTotalBw, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_bw'] = $normalizedRowTotalsBw;

            // Calculate Lambda Max
            $lambdaMaxBw = 0;
            foreach ($tenants_bw as $tenant_bw) {
                $lambdaMaxBw += $totalValuesBw[$tenant_bw] * $normalizedRowTotalsBw[$tenant_bw];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxBw, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexBw  = 0;
            switch ($numMallsBw) {
                case 1:
                    $randomConsistencyIndexBw  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexBw  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexBw  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexBw  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexBw  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexBw  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexBw  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexBw  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexBw  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexBw  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexBw  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexBw  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexBw  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexBw  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexBw  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIBw = ($lambdaMaxBw - $numMallsBw) / ($numMallsBw - 1);


            // Calculate Consistency Ratio (CR)
            $CRBw = $CIBw / $randomConsistencyIndexBw; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CIBw, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsBw elemen: " . $randomConsistencyIndexBw . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRBw, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRBw < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
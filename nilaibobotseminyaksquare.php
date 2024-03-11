<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_square'])) {
    $_SESSION['comparison_results_square'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Seminyak Square</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_square" class="form-control" value="A11 - Seminyak Square" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_square" class="form-select">
                        <?php
                        $tenants_square = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_square as $tenant_square) {
                            $selected = in_array($tenant_square, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_square\" $selected>$tenant_square</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_square" class="form-select">
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
                    <select name="kriteria_square2" class="form-select">
                        <?php
                        foreach ($tenants_square as $tenant_square) {
                            echo "<option value=\"$tenant_square\">$tenant_square</option>";
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
            // Check if alternatif_square is set
            if (isset($_POST['alternatif_square'])) {
                // Get input values
                $alternatif_square = $_POST['alternatif_square'];
                $kriteria_square = $_POST['kriteria_square'];
                $comparison_value_square = $_POST['comparison_square'];
                $kriteria_square2 = $_POST['kriteria_square2'];

                // Retrieve comparison_square results from session
                $comparison_results_square = $_SESSION['comparison_results_square'];

                // Check if the comparison_square result_square for this combination of kriteria_square and kriteria_square2 already exists
                // Jika kriteria_square dan kriteria_square2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_square === $kriteria_square2) {
                    $comparison_value_square = 1;
                }

                // Check if the comparison_square result_square for this combination of kriteria_square and kriteria_square2 already exists
                $exists = false;
                foreach ($comparison_results_square as $key_square => $result_square) {
                    if ($result_square['kriteria_square'] == $kriteria_square && $result_square['kriteria_square2'] == $kriteria_square2) {
                        $exists = true;
                        // Update the comparison_square value
                        $comparison_results_square[$key_square][$alternatif_square] = $comparison_value_square;
                        break; // Break the loop after updating the comparison_square value
                    }
                }

                // If the comparison_square result_square doesn't exist, add it to the comparison_square results array
                if (!$exists) {
                    $comparison_results_square[] = array(
                        'kriteria_square' => $kriteria_square,
                        'kriteria_square2' => $kriteria_square2,
                        $alternatif_square => $comparison_value_square
                    );
                }


                // Update the comparison_square results in the session
                $_SESSION['comparison_results_square'] = $comparison_results_square;
            } else {
                // Action if alternatif_square is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_square as $tenant_square) {
                echo "<th>$tenant_square</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesSquare = array_fill_keys($tenants_square, 0);

            // Loop through each tenant for comparison_square results
            foreach ($tenants_square as $tenant_square1) {
                echo "<tr>";
                echo "<th>$tenant_square1</th>";
                $totalRowSquare = 0; // Total for this row

                foreach ($tenants_square as $tenant_square2) {
                    $comparisonValueSquare = null;
                    $isInverseSquare = false; // Flag to check if the comparison_square is inverse

                    foreach ($comparison_results_square as $result_square) {
                        if (($result_square['kriteria_square'] == $tenant_square1 && $result_square['kriteria_square2'] == $tenant_square2)) {
                            $comparisonValueSquare = $result_square[$alternatif_square];
                            break;
                        } elseif (($result_square['kriteria_square'] == $tenant_square2 && $result_square['kriteria_square2'] == $tenant_square1)) {
                            $comparisonValueSquare = 1 / $result_square[$alternatif_square]; // Take the inverse
                            $isInverseSquare = true;
                            break;
                        }
                    }

                    if ($comparisonValueSquare !== null) {
                        if ($isInverseSquare) {
                            echo "<td>" . number_format($comparisonValueSquare, 5, '.', '') . "</td>"; // Display inverse comparison_square value
                        } else {
                            echo "<td>" . number_format($comparisonValueSquare, 5, '.', '') . "</td>"; // Display comparison_square value
                        }
                        $totalValuesSquare[$tenant_square2] += $comparisonValueSquare; // Fix here, use tenant_square2 as key_square for totalValuesSquare
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_square
            echo "<tr><th>Total</th>";
            $totalTotalSquare = 0;
            foreach ($tenants_square as $tenant_square) {
                $totalTotalSquare += $totalValuesSquare[$tenant_square];
                echo "<th>" . number_format($totalValuesSquare[$tenant_square], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_square as $tenant_square) {
                echo "<th>$tenant_square</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsSquare = array_fill_keys($tenants_square, 0);

            // Counting the number of tenants$tenants_square
            $numMallsSquare = count($tenants_square);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsSquare = [];

            // Loop through each ten$tenant_square for comparison results
            foreach ($tenants_square as $tenant_square1) {
                echo "<tr>";
                echo "<th>$tenant_square1</th>";
                $rowTotalSquare = 0; // Menyimpan total per baris

                foreach ($tenants_square as $tenant_square2) {
                    $comparisonValueSquare = null;

                    foreach ($comparison_results_square as $result_square) {
                        if (($result_square['kriteria_square'] == $tenant_square1 && $result_square['kriteria_square2'] == $tenant_square2)) {
                            $comparisonValueSquare = $result_square[$alternatif_square];
                            break;
                        } elseif (($result_square['kriteria_square'] == $tenant_square2 && $result_square['kriteria_square2'] == $tenant_square1)) {
                            $comparisonValueSquare = 1 / $result_square[$alternatif_square]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueSquare !== null) {
                        // Calculate the normalized value
                        $normalizedValueSquare = $comparisonValueSquare / $totalValuesSquare[$tenant_square2];
                        echo "<td>" . number_format($normalizedValueSquare, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsSquare[$tenant_square2] += $normalizedValueSquare;

                        // Add to row total
                        $rowTotalSquare += $normalizedValueSquare;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalSquare = $rowTotalSquare / $numMallsSquare;
                $normalizedRowTotalsSquare[$tenant_square1] = $normalizedRowTotalSquare; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalSquare, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_square
            echo "<tr><th>Total</th>";
            foreach ($tenants_square as $tenant_square) {
                echo "<th>" . number_format($columnTotalsSquare[$tenant_square], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueSquare = array_sum($columnTotalsSquare) / $numMallsSquare;
            echo "<th>" . number_format($eigenValueSquare, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsSquare as $tenant_square => $rowTotalSquare) {
            //     echo "<li><strong>$tenant_square:</strong> " . number_format($rowTotalSquare, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_square'] = $normalizedRowTotalsSquare;

            // Calculate Lambda Max
            $lambdaMaxSquare = 0;
            foreach ($tenants_square as $tenant_square) {
                $lambdaMaxSquare += $totalValuesSquare[$tenant_square] * $normalizedRowTotalsSquare[$tenant_square];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxSquare, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexSquare  = 0;
            switch ($numMallsSquare) {
                case 1:
                    $randomConsistencyIndexSquare  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexSquare  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexSquare  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexSquare  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexSquare  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexSquare  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexSquare  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexSquare  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexSquare  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexSquare  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexSquare  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexSquare  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexSquare  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexSquare  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexSquare  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CISquare = ($lambdaMaxSquare - $numMallsSquare) / ($numMallsSquare - 1);


            // Calculate Consistency Ratio (CR)
            $CRSquare = $CISquare / $randomConsistencyIndexSquare; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CISquare, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsSquare elemen: " . $randomConsistencyIndexSquare . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRSquare, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRSquare < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
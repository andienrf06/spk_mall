<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_lippokuta'])) {
    $_SESSION['comparison_results_lippokuta'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Lippo Mall Kuta</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_lippokuta" class="form-control" value="A05 - Lippo Mall Kuta" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_lippokuta" class="form-select">
                        <?php
                        $tenants_lippokuta = [
                            "Ukuran Gerai",
                            "Harga Gerai",
                            "Jumlah Pesaing Gerai"
                        ];

                        foreach ($tenants_lippokuta as $tenant_lippokuta) {
                            $selected = in_array($tenant_lippokuta, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_lippokuta\" $selected>$tenant_lippokuta</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_lippokuta" class="form-select">
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
                    <select name="kriteria_lippokuta2" class="form-select">
                        <?php
                        foreach ($tenants_lippokuta as $tenant_lippokuta) {
                            echo "<option value=\"$tenant_lippokuta\">$tenant_lippokuta</option>";
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
            // Check if alternatif_lippokuta is set
            if (isset($_POST['alternatif_lippokuta'])) {
                // Get input values
                $alternatif_lippokuta = $_POST['alternatif_lippokuta'];
                $kriteria_lippokuta = $_POST['kriteria_lippokuta'];
                $comparison_value_lippokuta = $_POST['comparison_lippokuta'];
                $kriteria_lippokuta2 = $_POST['kriteria_lippokuta2'];

                // Retrieve comparison_lippokuta results from session
                $comparison_results_lippokuta = $_SESSION['comparison_results_lippokuta'];

                // Check if the comparison_lippokuta result_lippokuta for this combination of kriteria_lippokuta and kriteria_lippokuta2 already exists
                // Jika kriteria_lippokuta dan kriteria_lippokuta2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_lippokuta === $kriteria_lippokuta2) {
                    $comparison_value_lippokuta = 1;
                }

                // Check if the comparison_lippokuta result_lippokuta for this combination of kriteria_lippokuta and kriteria_lippokuta2 already exists
                $exists = false;
                foreach ($comparison_results_lippokuta as $key_lippokuta => $result_lippokuta) {
                    if ($result_lippokuta['kriteria_lippokuta'] == $kriteria_lippokuta && $result_lippokuta['kriteria_lippokuta2'] == $kriteria_lippokuta2) {
                        $exists = true;
                        // Update the comparison_lippokuta value
                        $comparison_results_lippokuta[$key_lippokuta][$alternatif_lippokuta] = $comparison_value_lippokuta;
                        break; // Break the loop after updating the comparison_lippokuta value
                    }
                }

                // If the comparison_lippokuta result_lippokuta doesn't exist, add it to the comparison_lippokuta results array
                if (!$exists) {
                    $comparison_results_lippokuta[] = array(
                        'kriteria_lippokuta' => $kriteria_lippokuta,
                        'kriteria_lippokuta2' => $kriteria_lippokuta2,
                        $alternatif_lippokuta => $comparison_value_lippokuta
                    );
                }


                // Update the comparison_lippokuta results in the session
                $_SESSION['comparison_results_lippokuta'] = $comparison_results_lippokuta;
            } else {
                // Action if alternatif_lippokuta is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<th>$tenant_lippokuta</th>";
            }

            // Initialize an array to store the total values for each tenant
            $totalValuesLippoKuta = array_fill_keys($tenants_lippokuta, 0);

            // Loop through each tenant for comparison_lippokuta results
            foreach ($tenants_lippokuta as $tenant_lippokuta1) {
                echo "<tr>";
                echo "<th>$tenant_lippokuta1</th>";
                $totalRowLippoKuta = 0; // Total for this row

                foreach ($tenants_lippokuta as $tenant_lippokuta2) {
                    $comparisonValueLippoKuta = null;
                    $isInverseLippoKuta = false; // Flag to check if the comparison_lippokuta is inverse

                    foreach ($comparison_results_lippokuta as $result_lippokuta) {
                        if (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta1 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta2)) {
                            $comparisonValueLippoKuta = $result_lippokuta[$alternatif_lippokuta];
                            break;
                        } elseif (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta2 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta1)) {
                            $comparisonValueLippoKuta = 1 / $result_lippokuta[$alternatif_lippokuta]; // Take the inverse
                            $isInverseLippoKuta = true;
                            break;
                        }
                    }

                    if ($comparisonValueLippoKuta !== null) {
                        if ($isInverseLippoKuta) {
                            echo "<td>" . number_format($comparisonValueLippoKuta, 5, '.', '') . "</td>"; // Display inverse comparison_lippokuta value
                        } else {
                            echo "<td>" . number_format($comparisonValueLippoKuta, 5, '.', '') . "</td>"; // Display comparison_lippokuta value
                        }
                        $totalValuesLippoKuta[$tenant_lippokuta2] += $comparisonValueLippoKuta; // Fix here, use tenant_lippokuta2 as key_mlippokutafor totalValuesLippoKuta
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_lippokuta
            echo "<tr><th>Total</th>";
            $totalTotalLippoKuta = 0;
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                $totalTotalLippoKuta += $totalValuesLippoKuta[$tenant_lippokuta];
                echo "<th>" . number_format($totalValuesLippoKuta[$tenant_lippokuta], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasik Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<th>$tenant_lippokuta</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsLippoKuta = array_fill_keys($tenants_lippokuta, 0);

            // Counting the number of tenants$tenants_lippokuta
            $numMallsLippoKuta = count($tenants_lippokuta);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsLippoKuta = [];

            // Loop through each ten$tenant_lippokuta for comparison results
            foreach ($tenants_lippokuta as $tenant_lippokuta1) {
                echo "<tr>";
                echo "<th>$tenant_lippokuta1</th>";
                $rowTotalLippoKuta = 0; // Menyimpan total per baris

                foreach ($tenants_lippokuta as $tenant_lippokuta2) {
                    $comparisonValueLippoKuta = null;

                    foreach ($comparison_results_lippokuta as $result_lippokuta) {
                        if (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta1 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta2)) {
                            $comparisonValueLippoKuta = $result_lippokuta[$alternatif_lippokuta];
                            break;
                        } elseif (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta2 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta1)) {
                            $comparisonValueLippoKuta = 1 / $result_lippokuta[$alternatif_lippokuta]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueLippoKuta !== null) {
                        // Calculate the normalized value
                        $normalizedValueLippoKuta = $comparisonValueLippoKuta / $totalValuesLippoKuta[$tenant_lippokuta2];
                        echo "<td>" . number_format($normalizedValueLippoKuta, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsLippoKuta[$tenant_lippokuta2] += $normalizedValueLippoKuta;

                        // Add to row total
                        $rowTotalLippoKuta += $normalizedValueLippoKuta;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalLippoKuta = $rowTotalLippoKuta / $numMallsLippoKuta;
                $normalizedRowTotalsLippoKuta[$tenant_lippokuta1] = $normalizedRowTotalLippoKuta; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalLippoKuta, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants$tenants_lippokuta
            echo "<tr><th>Total</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<th>" . number_format($columnTotalsLippoKuta[$tenant_lippokuta], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValuLippoKuta = array_sum($columnTotalsLippoKuta) / $numMallsLippoKuta;
            echo "<th>" . number_format($eigenValuLippoKuta, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsLippoKuta as $tenant_lippokuta => $rowTotalLippoKuta) {
            //     echo "<li><strong>$tenant_lippokuta:</strong> " . number_format($rowTotalLippoKuta, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_lippokuta'] = $normalizedRowTotalsLippoKuta;

            // Calculate Lambda Max
            $lambdaMaxLippoKuta = 0;
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                $lambdaMaxLippoKuta += $totalValuesLippoKuta[$tenant_lippokuta] * $normalizedRowTotalsLippoKuta[$tenant_lippokuta];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLippoKuta, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant
            $randomConsistencyIndexLippoKuta  = 0;
            switch ($numMallsLippoKuta) {
                case 1:
                    $randomConsistencyIndexLippoKuta  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLippoKuta  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLippoKuta  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLippoKuta  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLippoKuta  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLippoKuta  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLippoKuta  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLippoKuta  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLippoKuta  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLippoKuta  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexLippoKuta  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexLippoKuta  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexLippoKuta  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexLippoKuta  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexLippoKuta  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CILippoKuta = ($lambdaMaxLippoKuta - $numMallsLippoKuta) / ($numMallsLippoKuta - 1);


            // Calculate Consistency Ratio (CR)
            $CRLippoKuta = $CILippoKuta / $randomConsistencyIndexLippoKuta; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CILippoKuta, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsLippoKuta elemen: " . $randomConsistencyIndexLippoKuta . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRLippoKuta, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRLippoKuta < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
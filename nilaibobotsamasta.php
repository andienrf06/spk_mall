<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_samasta'])) {
    $_SESSION['comparison_results_samasta'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Samasta Lifestyle Village</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_samasta" class="form-control" value="A02 - Samasta Lifestyle Village" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_samasta" class="form-select">
                        <?php
                        $tenants_samasta = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];

                        foreach ($tenants_samasta as $tenant_samasta) {
                            $selected = in_array($tenant_samasta, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$tenant_samasta\" $selected>$tenant_samasta</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_samasta" class="form-select">
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
                    <select name="kriteria_samasta2" class="form-select">
                        <?php
                        foreach ($tenants_samasta as $tenant_samasta) {
                            echo "<option value=\"$tenant_samasta\">$tenant_samasta</option>";
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
            // Check if alternatif_samasta is set
            if (isset($_POST['alternatif_samasta'])) {
                // Get input values
                $alternatif_samasta = $_POST['alternatif_samasta'];
                $kriteria_samasta = $_POST['kriteria_samasta'];
                $comparison_value_samasta = $_POST['comparison_samasta'];
                $kriteria_samasta2 = $_POST['kriteria_samasta2'];

                // Retrieve comparison_samasta results from session
                $comparison_results_samasta = $_SESSION['comparison_results_samasta'];

                // Check if the comparison_samasta result_samasta for this combination of kriteria_samasta and kriteria_samasta2 already exists
                // Jika kriteria_samasta dan kriteria_samasta2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_samasta === $kriteria_samasta2) {
                    $comparison_value_samasta = 1;
                }

                // Check if the comparison_samasta result_samasta for this combination of kriteria_samasta and kriteria_samasta2 already exists
                $exists = false;
                foreach ($comparison_results_samasta as $key_samasta => $result_samasta) {
                    if ($result_samasta['kriteria_samasta'] == $kriteria_samasta && $result_samasta['kriteria_samasta2'] == $kriteria_samasta2) {
                        $exists = true;
                        // Update the comparison_samasta value
                        $comparison_results_samasta[$key_samasta][$alternatif_samasta] = $comparison_value_samasta;
                        break; // Break the loop after updating the comparison_samasta value
                    }
                }

                // If the comparison_samasta result_samasta doesn't exist, add it to the comparison_samasta results array
                if (!$exists) {
                    $comparison_results_samasta[] = array(
                        'kriteria_samasta' => $kriteria_samasta,
                        'kriteria_samasta2' => $kriteria_samasta2,
                        $alternatif_samasta => $comparison_value_samasta
                    );
                }
                // Update the comparison_samasta results in the session
                $_SESSION['comparison_results_samasta'] = $comparison_results_samasta;
            } else {
                // Action if alternatif_samasta is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<th>$tenant_samasta</th>";
            }

            // Initialize an array to store the total values for each tenant_samasta
            $totalValuesSamasta = array_fill_keys($tenants_samasta, 0);

            // Loop through each tenant_samasta for comparison_samasta results
            foreach ($tenants_samasta as $tenant_samasta1) {
                echo "<tr>";
                echo "<td>$tenant_samasta1</td>";
                $totalRowSamasta = 0; // Total for this row

                foreach ($tenants_samasta as $tenant_samasta2) {
                    $comparisonValueSamasta = null;
                    $isInverseSamasta = false; // Flag to check if the comparison_samasta is inverse

                    foreach ($comparison_results_samasta as $result_samasta) {
                        if (($result_samasta['kriteria_samasta'] == $tenant_samasta1 && $result_samasta['kriteria_samasta2'] == $tenant_samasta2)) {
                            $comparisonValueSamasta = $result_samasta[$alternatif_samasta];
                            break;
                        } elseif (($result_samasta['kriteria_samasta'] == $tenant_samasta2 && $result_samasta['kriteria_samasta2'] == $tenant_samasta1)) {
                            $comparisonValueSamasta = 1 / $result_samasta[$alternatif_samasta]; // Take the inverse
                            $isInverseSamasta = true;
                            break;
                        }
                    }

                    if ($comparisonValueSamasta !== null) {
                        if ($isInverseSamasta) {
                            echo "<td>" . number_format($comparisonValueSamasta, 5, '.', '') . "</td>"; // Display inverse comparison_samasta value
                        } else {
                            echo "<td>" . number_format($comparisonValueSamasta, 5, '.', '') . "</td>"; // Display comparison_samasta value
                        }
                        $totalValuesSamasta[$tenant_samasta2] += $comparisonValueSamasta; // Fix here, use tenant_samasta2 as key_samasta for totalValuesSamasta
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_samasta
            echo "<tr><td>Total</td>";
            $totalTotalSamasta = 0;
            foreach ($tenants_samasta as $tenant_samasta) {
                $totalTotalSamasta += $totalValuesSamasta[$tenant_samasta];
                echo "<td>" . number_format($totalValuesSamasta[$tenant_samasta], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";


            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<th>$tenant_samasta</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsSamasta = array_fill_keys($tenants_samasta, 0);

            // Counting the number of tenants_samasta
            $numMallsSamasta = count($tenants_samasta);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsSamasta = [];

            // Loop through each ten$tenant_samasta for comparison results
            foreach ($tenants_samasta as $tenant_samasta1) {
                echo "<tr>";
                echo "<td>$tenant_samasta1</td>";
                $rowTotalSamasta = 0; // Menyimpan total per baris

                foreach ($tenants_samasta as $tenant_samasta2) {
                    $comparisonValueSamasta = null;

                    foreach ($comparison_results_samasta as $result_samasta) {
                        if (($result_samasta['kriteria_samasta'] == $tenant_samasta1 && $result_samasta['kriteria_samasta2'] == $tenant_samasta2)) {
                            $comparisonValueSamasta = $result_samasta[$alternatif_samasta];
                            break;
                        } elseif (($result_samasta['kriteria_samasta'] == $tenant_samasta2 && $result_samasta['kriteria_samasta2'] == $tenant_samasta1)) {
                            $comparisonValueSamasta = 1 / $result_samasta[$alternatif_samasta]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueSamasta !== null) {
                        // Calculate the normalized value
                        $normalizedValueSamasta = $comparisonValueSamasta / $totalValuesSamasta[$tenant_samasta2];
                        echo "<td>" . number_format($normalizedValueSamasta, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsSamasta[$tenant_samasta2] += $normalizedValueSamasta;

                        // Add to row total
                        $rowTotalSamasta += $normalizedValueSamasta;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalSamasta = $rowTotalSamasta / $numMallsSamasta;
                $normalizedRowTotalsSamasta[$tenant_samasta1] = $normalizedRowTotalSamasta; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalSamasta, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants_samasta
            echo "<tr><td>Total</td>";
            foreach ($tenants_samasta as $tenant_samasta) {
                echo "<td>" . number_format($columnTotalsSamasta[$tenant_samasta], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueSamasta = array_sum($columnTotalsSamasta) / $numMallsSamasta;
            echo "<td>" . number_format($eigenValueSamasta, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsSamasta as $tenant_samasta => $rowTotalSamasta) {
            //     echo "<li><strong>$tenant_samasta:</strong> " . number_format($rowTotalSamasta, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_samasta'] = $normalizedRowTotalsSamasta;


            // echo "Nilai Eigen Vector BC: " . number_format($eigenVectorBC, 5, '.', '') . "<br>";

            // Calculate Lambda Max
            $lambdaMaxSamasta = 0;
            foreach ($tenants_samasta as $tenant_samasta) {
                $lambdaMaxSamasta += $totalValuesSamasta[$tenant_samasta] * $normalizedRowTotalsSamasta[$tenant_samasta];
            }


            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxSamasta, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant_samasta
            $randomConsistencyIndexSamasta  = 0;
            switch ($numMallsSamasta) {
                case 1:
                    $randomConsistencyIndexSamasta  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexSamasta  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexSamasta  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexSamasta  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexSamasta  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexSamasta  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexSamasta  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexSamasta  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexSamasta  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexSamasta  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexSamasta  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexSamasta  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexSamasta  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexSamasta  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexSamasta  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CISamasta = ($lambdaMaxSamasta - $numMallsSamasta) / ($numMallsSamasta - 1);


            // Calculate Consistency Ratio (CR)
            $CRSamasta = $CISamasta / $randomConsistencyIndexSamasta; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CISamasta, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsSamasta elemen: " . $randomConsistencyIndexSamasta . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRSamasta, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRSamasta < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
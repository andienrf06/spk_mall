<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_sidewalk'])) {
    $_SESSION['comparison_results_sidewalk'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Sidewalk Jimbaran</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternatif:</label>
                    <input type="text" name="alternatif_sidewalk" class="form-control" value="A03 - Sidewalk Jimbaran" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_sidewalk" class="form-select">
                        <?php
                        $tenants_sidewalk = [
                            "Lokasi",
                            "Harga",
                            "Pesaing",
                        ];
                        foreach ($tenants_sidewalk as $tenant_sidewalk) {
                            echo "<option value=\"$tenant_sidewalk\" $selected>$tenant_sidewalk</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_sidewalk" class="form-select">
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
                    <select name="kriteria_sidewalk2" class="form-select">
                        <?php
                        foreach ($tenants_sidewalk as $tenant_sidewalk) {
                            echo "<option value=\"$tenant_sidewalk\">$tenant_sidewalk</option>";
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
            // Check if alternatif_sidewalk is set
            if (isset($_POST['alternatif_sidewalk'])) {
                // Get input values
                $alternatif_sidewalk = $_POST['alternatif_sidewalk'];
                $kriteria_sidewalk = $_POST['kriteria_sidewalk'];
                $comparison_value_sidewalk = $_POST['comparison_sidewalk'];
                $kriteria_sidewalk2 = $_POST['kriteria_sidewalk2'];

                // Retrieve comparison_sidewalk results from session
                $comparison_results_sidewalk = $_SESSION['comparison_results_sidewalk'];

                // Check if the comparison_sidewalk result_sidewalk for this combination of kriteria_sidewalk and kriteria_sidewalk2 already exists
                // Jika kriteria_sidewalk dan kriteria_sidewalk2 sama, set nilai perbandingannya menjadi 1
                if ($kriteria_sidewalk === $kriteria_sidewalk2) {
                    $comparison_value_sidewalk = 1;
                }

                // Check if the comparison_sidewalk result_sidewalk for this combination of kriteria_sidewalk and kriteria_sidewalk2 already exists
                $exists = false;
                foreach ($comparison_results_sidewalk as $key_sidewalk => $result_sidewalk) {
                    if ($result_sidewalk['kriteria_sidewalk'] == $kriteria_sidewalk && $result_sidewalk['kriteria_sidewalk2'] == $kriteria_sidewalk2) {
                        $exists = true;
                        // Update the comparison_sidewalk value
                        $comparison_results_sidewalk[$key_sidewalk][$alternatif_sidewalk] = $comparison_value_sidewalk;
                        break; // Break the loop after updating the comparison_sidewalk value
                    }
                }

                // If the comparison_sidewalk result_sidewalk doesn't exist, add it to the comparison_sidewalk results array
                if (!$exists) {
                    $comparison_results_sidewalk[] = array(
                        'kriteria_sidewalk' => $kriteria_sidewalk,
                        'kriteria_sidewalk2' => $kriteria_sidewalk2,
                        $alternatif_sidewalk => $comparison_value_sidewalk
                    );
                }
                // Update the comparison_sidewalk results in the session
                $_SESSION['comparison_results_sidewalk'] = $comparison_results_sidewalk;
            } else {
                // Action if alternatif_sidewalk is not defined
                echo "Alternatif tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<th>$tenant_sidewalk</th>";
            }

            // Initialize an array to store the total values for each tenant_sidewalk
            $totalValuesSidewalk = array_fill_keys($tenants_sidewalk, 0);

            // Loop through each tenant_sidewalk for comparison_sidewalk results
            foreach ($tenants_sidewalk as $tenant_sidewalk1) {
                echo "<tr>";
                echo "<td>$tenant_sidewalk1</td>";
                $totalRowSidewalk = 0; // Total for this row

                foreach ($tenants_sidewalk as $tenant_sidewalk2) {
                    $comparisonValueSidewalk = null;
                    $isInverseSidewalk = false; // Flag to check if the comparison_sidewalk is inverse

                    foreach ($comparison_results_sidewalk as $result_sidewalk) {
                        if (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk1 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk2)) {
                            $comparisonValueSidewalk = $result_sidewalk[$alternatif_sidewalk];
                            break;
                        } elseif (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk2 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk1)) {
                            $comparisonValueSidewalk = 1 / $result_sidewalk[$alternatif_sidewalk]; // Take the inverse
                            $isInverseSidewalk = true;
                            break;
                        }
                    }

                    if ($comparisonValueSidewalk !== null) {
                        if ($isInverseSidewalk) {
                            echo "<td>" . number_format($comparisonValueSidewalk, 5, '.', '') . "</td>"; // Display inverse comparison_sidewalk value
                        } else {
                            echo "<td>" . number_format($comparisonValueSidewalk, 5, '.', '') . "</td>"; // Display comparison_sidewalk value
                        }
                        $totalValuesSidewalk[$tenant_sidewalk2] += $comparisonValueSidewalk; // Fix here, use tenant_sidewalk2 as key_sidewalk for totalValuesSidewalk
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all tenants_sidewalk
            echo "<tr><td>Total</td>";
            $totalTotalSidewalk = 0;
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                $totalTotalSidewalk += $totalValuesSidewalk[$tenant_sidewalk];
                echo "<td>" . number_format($totalValuesSidewalk[$tenant_sidewalk], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";


            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Kriteria</th>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<th>$tenant_sidewalk</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsSidewalk = array_fill_keys($tenants_sidewalk, 0);

            // Counting the number of tenants_sidewalk
            $numMallsSidewalk = count($tenants_sidewalk);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsSidewalk = [];

            // Loop through each ten$tenant_sidewalk for comparison results
            foreach ($tenants_sidewalk as $tenant_sidewalk1) {
                echo "<tr>";
                echo "<td>$tenant_sidewalk1</td>";
                $rowTotalSidewalk = 0; // Menyimpan total per baris

                foreach ($tenants_sidewalk as $tenant_sidewalk2) {
                    $comparisonValueSidewalk = null;

                    foreach ($comparison_results_sidewalk as $result_sidewalk) {
                        if (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk1 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk2)) {
                            $comparisonValueSidewalk = $result_sidewalk[$alternatif_sidewalk];
                            break;
                        } elseif (($result_sidewalk['kriteria_sidewalk'] == $tenant_sidewalk2 && $result_sidewalk['kriteria_sidewalk2'] == $tenant_sidewalk1)) {
                            $comparisonValueSidewalk = 1 / $result_sidewalk[$alternatif_sidewalk]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueSidewalk !== null) {
                        // Calculate the normalized value
                        $normalizedValueSidewalk = $comparisonValueSidewalk / $totalValuesSidewalk[$tenant_sidewalk2];
                        echo "<td>" . number_format($normalizedValueSidewalk, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsSidewalk[$tenant_sidewalk2] += $normalizedValueSidewalk;

                        // Add to row total
                        $rowTotalSidewalk += $normalizedValueSidewalk;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalSidewalk = $rowTotalSidewalk / $numMallsSidewalk;
                $normalizedRowTotalsSidewalk[$tenant_sidewalk1] = $normalizedRowTotalSidewalk; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalSidewalk, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all tenants_sidewalk
            echo "<tr><td>Total</td>";
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                echo "<td>" . number_format($columnTotalsSidewalk[$tenant_sidewalk], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueSidewalk = array_sum($columnTotalsSidewalk) / $numMallsSidewalk;
            echo "<td>" . number_format($eigenValueSidewalk, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsSidewalk as $tenant_sidewalk => $rowTotalSidewalk) {
            //     echo "<li><strong>$tenant_sidewalk:</strong> " . number_format($rowTotalSidewalk, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_sidewalk'] = $normalizedRowTotalsSidewalk;


            // echo "Nilai Eigen Vector BC: " . number_format($eigenVectorBC, 5, '.', '') . "<br>";

            // Calculate Lambda Max
            $lambdaMaxSidewalk = 0;
            foreach ($tenants_sidewalk as $tenant_sidewalk) {
                $lambdaMaxSidewalk += $totalValuesSidewalk[$tenant_sidewalk] * $normalizedRowTotalsSidewalk[$tenant_sidewalk];
            }


            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxSidewalk, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen tenant_sidewalk
            $randomConsistencyIndexSidewalk  = 0;
            switch ($numMallsSidewalk) {
                case 1:
                    $randomConsistencyIndexSidewalk  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexSidewalk  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexSidewalk  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexSidewalk  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexSidewalk  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexSidewalk  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexSidewalk  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexSidewalk  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexSidewalk  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexSidewalk  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexSidewalk  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexSidewalk  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexSidewalk  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexSidewalk  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexSidewalk  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CISidewalk = ($lambdaMaxSidewalk - $numMallsSidewalk) / ($numMallsSidewalk - 1);


            // Calculate Consistency Ratio (CR)
            $CRSidewal = $CISidewalk / $randomConsistencyIndexSidewalk; // You need to define RI according to your matrix size

            // Tampilkan hasil konsistensi
            // echo "<p>Nilai Consistency Index (CI): " . number_format($CISidewalk, 5, '.', '') . "</p>";
            // echo "<p>Nilai Random Consistency Index (RI) untuk $numMallsSidewalk elemen: " . $randomConsistencyIndexSidewalk . "</p>";
            // echo "<p>Nilai Consistency Ratio (CR): " . number_format($CRSidewal, 5, '.', '') . "</p>";

            // Check if consistency is acceptable
            if ($CRSidewal < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
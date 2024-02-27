<?php
session_start();

// Initialize selected mallsT$mallsToShowCompetitor
$mallsToShowCompetitor = $_SESSION['selected_malls'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Your form handling code here
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
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall_competitor Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall_competitor Kuta</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall_competitor Bali</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall_competitor</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall_competitor</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall_competitor</a>
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Alternatif Terhadap Kriteria Pesaing</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="criteria">Kriteria:</label>
                    <input type="text" name="criteria_competitor" class="form-control" value="K03 - Pesaing" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="alternative_competitor1" class="form-select">
                        <?php
                        foreach ($mallsToShowCompetitor as $mall_competitor) {
                            $selected = in_array($mall_competitor, $mallsToShowCompetitor) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$mall_competitor\">$mall_competitor</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_competitor" class="form-select">
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
                    <select name="alternative_competitor2" class="form-select">
                        <?php
                        foreach ($mallsToShowCompetitor as $mall_competitor) {
                            echo "<option value=\"$mall_competitor\">$mall_competitor</option>";
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
            // Check if criteria_competitor is set
            if (isset($_POST['criteria_competitor'])) {
                // Get input values
                $criteria_competitor = $_POST['criteria_competitor'];
                $alternative_competitor1 = $_POST['alternative_competitor1'];
                $comparison_value_competitor = $_POST['comparison_competitor'];
                $alternative_competitor2 = $_POST['alternative_competitor2'];

                // Retrieve comparison_competitor results from session
                $comparison_results_competitor = $_SESSION['comparison_results_competitor'];

                // Check if the comparison_competitor result_competitor for this combination of alternative_competitor1 and alternative_competitor2 already exists
                // Jika alternative_competitor1 dan alternative_competitor2 sama, set nilai perbandingannya menjadi 1
                if ($alternative_competitor1 === $alternative_competitor2) {
                    $comparison_value_competitor = 1;
                }

                // Check if the comparison_competitor result_competitor for this combination of alternative_competitor1 and alternative_competitor2 already exists
                $exists = false;
                foreach ($comparison_results_competitor as $key_competitor => $result_competitor) {
                    if ($result_competitor['alternative_competitor1'] == $alternative_competitor1 && $result_competitor['alternative_competitor2'] == $alternative_competitor2) {
                        $exists = true;
                        // Update the comparison_competitor value
                        $comparison_results_competitor[$key_competitor][$criteria_competitor] = $comparison_value_competitor;
                        break; // Break the loop after updating the comparison_competitor value
                    }
                }

                // If the comparison_competitor result_competitor doesn't exist, add it to the comparison_competitor results array
                if (!$exists) {
                    $comparison_results_competitor[] = array(
                        'alternative_competitor1' => $alternative_competitor1,
                        'alternative_competitor2' => $alternative_competitor2,
                        $criteria_competitor => $comparison_value_competitor
                    );
                }


                // Update the comparison_competitor results in the session
                $_SESSION['comparison_results_competitor'] = $comparison_results_competitor;
            } else {
                // Action if criteria_competitor is not defined
                echo "Kriteria tidak terdefinisi.";
            }

            echo "<h3>Comparison_competitor Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_competitor</th>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }

            // Initialize an array to store the total values for each mall_competitor
            $totalValuesCompetitor = array_fill_keys($mallsToShowCompetitor, 0);

            // Loop through each mall_competitor for comparison_competitor results
            foreach ($mallsToShowCompetitor as $mall_competitor1) {
                echo "<tr>";
                echo "<td>$mall_competitor1</td>";
                $totalRowCompetitor = 0; // Total for this row

                foreach ($mallsToShowCompetitor as $mall_competitor2) {
                    $comparisonValueCompetitor = null;
                    $isInverseCompetitor = false; // Flag to check if the comparison_competitor is inverse

                    foreach ($comparison_results_competitor as $result_competitor) {
                        if (($result_competitor['alternative_competitor1'] == $mall_competitor1 && $result_competitor['alternative_competitor2'] == $mall_competitor2)) {
                            $comparisonValueCompetitor = $result_competitor[$criteria_competitor];
                            break;
                        } elseif (($result_competitor['alternative_competitor1'] == $mall_competitor2 && $result_competitor['alternative_competitor2'] == $mall_competitor1)) {
                            $comparisonValueCompetitor = 1 / $result_competitor[$criteria_competitor]; // Take the inverse
                            $isInverseCompetitor = true;
                            break;
                        }
                    }

                    if ($comparisonValueCompetitor !== null) {
                        if ($isInverseCompetitor) {
                            echo "<td>" . number_format($comparisonValueCompetitor, 5, '.', '') . "</td>"; // Display inverse comparison_competitor value
                        } else {
                            echo "<td>" . number_format($comparisonValueCompetitor, 5, '.', '') . "</td>"; // Display comparison_competitor value
                        }
                        $totalValuesCompetitor[$mall_competitor2] += $comparisonValueCompetitor; // Fix here, use mall_competitor2 as key_competitor for totalValuesCompetitor
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all mallsT$mallsToShowCompetitor
            echo "<tr><td>Total</td>";
            $totalTotalCompetitor = 0;
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                $totalTotalCompetitor += $totalValuesCompetitor[$mall_competitor];
                echo "<td>" . number_format($totalValuesCompetitor[$mall_competitor], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison_competitor Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_competitor</th>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsCompetitor = array_fill_keys($mallsToShowCompetitor, 0);

            // Counting the number of mallsT$mallsToShowCompetitor
            $numMallsCompetitor = count($mallsToShowCompetitor);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsCompetitor = [];

            // Loop through each mall_competitor for comparison_competitor results
            foreach ($mallsToShowCompetitor as $mall_competitor1) {
                echo "<tr>";
                echo "<td>$mall_competitor1</td>";
                $normalizedRowTotalsCompetitor = 0; // Menyimpan total per baris

                foreach ($mallsToShowCompetitor as $mall_competitor2) {
                    $comparisonValueCompetitor = null;

                    foreach ($comparison_results_competitor as $result_competitor) {
                        if (($result_competitor['alternative_competitor1'] == $mall_competitor1 && $result_competitor['alternative_competitor2'] == $mall_competitor2)) {
                            $comparisonValueCompetitor = $result_competitor[$criteria_competitor];
                            break;
                        } elseif (($result_competitor['alternative_competitor1'] == $mall_competitor2 && $result_competitor['alternative_competitor2'] == $mall_competitor1)) {
                            $comparisonValueCompetitor = 1 / $result_competitor[$criteria_competitor]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValueCompetitor !== null) {
                        // Calculate the normalized value
                        $normalizedValueCompetitor = $comparisonValueCompetitor / $totalValuesCompetitor[$mall_competitor2];
                        echo "<td>" . number_format($normalizedValueCompetitor, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsCompetitor[$mall_competitor2] += $normalizedValueCompetitor;

                        // Add to row total
                        $normalizedRowTotalsCompetitor += $normalizedValueCompetitor;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalCompetitor = $normalizedRowTotalsCompetitor / $numMallsCompetitor;
                $normalizedRowTotalsCompetitor[$mall_competitor1] = $normalizedRowTotalCompetitor; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalCompetitor, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all mallsT$mallsToShowCompetitor
            echo "<tr><td>Total</td>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<td>" . number_format($columnTotalsCompetitor[$mall_competitor], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValueCompetitor = array_sum($columnTotalsCompetitor) / $numMallsCompetitor;
            echo "<td>" . number_format($eigenValueCompetitor, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsCompetitor as $mall_competitor => $normalizedRowTotalsCompetitor) {
            //     echo "<li><strong>$mall_competitor:</strong> " . number_format($normalizedRowTotalsCompetitor, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_pesaing'] = $normalizedRowTotalsCompetitor;

            // Calculate Lambda Max
            $lambdaMaxCompetitor = 0;
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                $lambdaMaxCompetitor += $totalValuesCompetitor[$mall_competitor2] * $normalizedRowTotalCompetitor;
            }

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall_competitor
            $randomConsistencyIndexCompetitor  = 0;
            switch ($numMallsCompetitor) {
                case 1:
                    $randomConsistencyIndexCompetitor  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexCompetitor  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexCompetitor  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexCompetitor  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexCompetitor  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexCompetitor  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexCompetitor  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexCompetitor  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexCompetitor  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexCompetitor  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexCompetitor  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexCompetitor  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexCompetitor  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexCompetitor  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexCompetitor  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CICompetitor = ($lambdaMaxCompetitor - $numMallsCompetitor) / ($numMallsCompetitor - 1);


            // Calculate Consistency Ratio (CR)
            $CRCompetitor = $CICompetitor / $randomConsistencyIndexCompetitor; // You need to define RI according to your matrix size

            // Check if consistency is acceptable
            if ($CRCompetitor < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
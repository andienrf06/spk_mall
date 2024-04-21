<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_competitor'])) {
    $_SESSION['comparison_results_competitor'] = [];
}

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
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotpark23.php">Berdasarkan Park 23</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                        <a class="dropdown-item" href="nilaibobotsamasta.php">Berdasarkan Samasta Lifestyle Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotsidewalk.php">Berdasarkan Sidewalk Jimbaran</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Alternatif Terhadap Kriteria Jumlah Pesaing Gerai</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="criteria">Kriteria:</label>
                    <input type="text" name="criteria_competitor" class="form-control" value="K03 - Jumlah Pesaing Gerai" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="mall_pesaing1">Nama Mall 1:</label>
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
                    <label for="comparison_pesaing1">Nilai Perbandingan:</label>
                    <select name="comparison_competitor" class="form-select">
                        <option value="1">1 - Kedua mall sama pentingnya</option>
                        <option value="2">2 - Nilai antara dua nilai (1 dan 3) yang berdekatan</option>
                        <option value="3">3 - Mall yang satu sedikit lebih penting</option>
                        <option value="4">4 - Nilai dua nilai (3 dan 5) yang berdekatan</option>
                        <option value="5">5 - Mall yang satu lebih penting</option>
                        <option value="6">6 - Nilai antara dua nilai (5 dan 7) yang berdekatan</option>
                        <option value="7">7 - Mall yang satu lebih mutlak penting</option>
                        <option value="8">8 - Nilai antara dua nilai (7 dan 9) yang berdekatan</option>
                        <option value="9">9 - Mall yang satu jelas lebih mutlak penting</option>
                    </select>
                </div>

                <div class="col">
                    <label for="mall_pesaing2">Nama Mall 2:</label>
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
                    } elseif ($result_competitor['alternative_competitor1'] == $alternative_competitor2 && $result_competitor['alternative_competitor2'] == $alternative_competitor1) {
                        $exists = true;
                        // Update the comparison value and its inverse
                        $comparison_results_competitor[$key_competitor][$criteria_competitor] = $comparison_value_competitor;
                        // Update the inverse comparison value
                        $comparison_results_competitor[$key_competitor][$criteria_competitor] = 1 / $comparison_value_competitor;
                        break; // Break the loop after updating the comparison value
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

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Alternatif</th>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }

            // Initialize an array to store the total values for each mall_competitor
            $totalValuesCompetitor = array_fill_keys($mallsToShowCompetitor, 0);

            // Loop through each mall_competitor for comparison_competitor results
            foreach ($mallsToShowCompetitor as $mall_competitor1) {
                echo "<tr>";
                echo "<th>$mall_competitor1</th>";
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
                        $totalValuesCompetitor[$mall_competitor2] += $comparisonValueCompetitor; // Fix here, use mall_competitor2 as key_competitor for totalValuesCompetitor$totalValuesCompetitor
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all mallsT$mallsToShowCompetitor
            echo "<tr><th>Total</th>";
            $totalTotalCompetitor = 0;
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                $totalTotalCompetitor += $totalValuesCompetitor[$mall_competitor];
                echo "<th>" . number_format($totalValuesCompetitor[$mall_competitor], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Alternatif</th>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }
            echo "<th>Eigen</th>";

            // Array to store column totals
            $columnTotalsCompetitor = array_fill_keys($mallsToShowCompetitor, 0);

            // Counting the number of mallsT$mallsToShowCompetitor
            $numMallsCompetitor = count($mallsToShowCompetitor);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsCompetitor = [];

            // Loop through each mall_competitor for comparison_competitor results
            foreach ($mallsToShowCompetitor as $mall_competitor1) {
                echo "<tr>";
                echo "<th>$mall_competitor1</th>";
                $rowTotalCompetitor = 0; // Stores totals per row

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
                        $rowTotalCompetitor += $normalizedValueCompetitor;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalCompetitor = $rowTotalCompetitor / $numMallsCompetitor;
                $normalizedRowTotalsCompetitor[$mall_competitor1] = $normalizedRowTotalCompetitor; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalCompetitor, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all mallsT$mallsToShowCompetitor
            echo "<tr><th>Total</th>";
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                echo "<th>" . number_format($columnTotalsCompetitor[$mall_competitor], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValueCompetitor = array_sum($columnTotalsCompetitor) / $numMallsCompetitor;
            echo "<th>" . number_format($eigenValueCompetitor, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsCompetitor as $mall_competitor => $rowTotalCompetitor) {
            //     echo "<li><strong>$mall_competitor:</strong> " . number_format($rowTotalCompetitor, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Store the normalized row totals value in the session
            $_SESSION['normalized_row_totals_pesaing'] = $normalizedRowTotalsCompetitor;

            // Calculate Lambda Max
            $lambdaMaxCompetitor = 0;
            foreach ($mallsToShowCompetitor as $mall_competitor) {
                $lambdaMaxCompetitor += $totalValuesCompetitor[$mall_competitor] * $normalizedRowTotalsCompetitor[$mall_competitor];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxCompetitor, 5, '.', '') . "</p>";

            // Calculate random consistency values based on the number of sidewalk mall elements
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
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
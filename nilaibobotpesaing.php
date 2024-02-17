<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_competitor_results_competitor'])) {
    $_SESSION['comparison_competitor_results_competitor'] = [];
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

            <div class="navb-items d-none d-xl-flex">
                <div class="item">
                    <a href="index.php">Beranda</a>
                </div>

                <div class="item">
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
                <h2 class="mb-4 mt-4">Nilai Bobot Alternatif</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="criteria_competitor">Criteria:</label>
                    <input type="text" name="criteria_competitor" class="form-control" value="K03 - Pesaing" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="alternative_competitor" class="form-select">
                        <?php
                        $malls_competitor = [
                            "Bali Collection",
                            "Samasta Lifestyle Village",
                            "Sidewalk Jimbaran",
                            // "Park 23",
                            // "Mall Bali Galeria",
                            // "Lippo Mall Kuta",
                            // "Lippo Plaza Sunset",
                            // "Trans Studio Mall Bali",
                            // "Level21 Mall",
                            // "Lippo Plaza Renon",
                            // "Seminyak Village",
                            // "Seminyak Square",
                            // "Beachwalk Shopping Centre",
                            // "Discovery Shopping Mall",
                            // "Living World Denpasar",
                            // "Ramayana Bali Mall",
                        ];

                        foreach ($malls_competitor as $mall_competitor) {
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
                        foreach ($malls_competitor as $mall_competitor) {
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
                $alternative_competitor = $_POST['alternative_competitor'];
                $comparison_competitor_value_competitor = $_POST['comparison_competitor'];
                $alternative_competitor2 = $_POST['alternative_competitor2'];

                // Retrieve comparison_competitor results from session
                $comparison_competitor_results_competitor = $_SESSION['comparison_competitor_results_competitor'];

                // Check if the comparison_competitor result for this combination of alternative_competitor and alternative_competitor2 already exists
                // Jika alternative_competitor dan alternative_competitor2 sama, set nilai perbandingannya menjadi 1
                if ($alternative_competitor === $alternative_competitor2) {
                    $comparison_competitor_value_competitor = 1;
                }

                // Check if the comparison_competitor result for this combination of alternative_competitor and alternative_competitor2 already exists
                $exists = false;
                foreach ($comparison_competitor_results_competitor as $key_competitor => $result_competitor) {
                    if ($result_competitor['alternative_competitor'] == $alternative_competitor && $result_competitor['alternative_competitor2'] == $alternative_competitor2) {
                        $exists = true;
                        // Update the comparison_competitor value
                        $comparison_competitor_results_competitor[$key_competitor][$criteria_competitor] = $comparison_competitor_value_competitor;
                        break; // Break the loop after updating the comparison_competitor value
                    }
                }

                // If the comparison_competitor result doesn't exist, add it to the comparison_competitor results array
                if (!$exists) {
                    $comparison_competitor_results_competitor[] = array(
                        'alternative_competitor' => $alternative_competitor,
                        'alternative_competitor2' => $alternative_competitor2,
                        $criteria_competitor => $comparison_competitor_value_competitor
                    );
                }


                // Update the comparison_competitor results in the session
                $_SESSION['comparison_competitor_results_competitor'] = $comparison_competitor_results_competitor;
            } else {
                // Action if criteria_competitor is not defined
                echo "Kriteria tidak terdefinisi.";
            }

            echo "<h3>Comparison_competitor Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_competitor</th>";
            foreach ($malls_competitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesCompetitor = array_fill_keys($malls_competitor, 0);

            // Loop through each mall for comparison_competitor results
            foreach ($malls_competitor as $mall_competitor1) {
                echo "<tr>";
                echo "<td>$mall_competitor1</td>";
                $totalRowCompetitor = 0; // Total for this row


                foreach ($malls_competitor as $mall_competitor2) {
                    $comparison_competitorValuePrice = null;
                    $isInverseCompetitor = false; // Flag to check if the comparison_competitor is inverse

                    foreach ($comparison_competitor_results_competitor as $result_competitor) {
                        if (($result_competitor['alternative_competitor'] == $mall_competitor1 && $result_competitor['alternative_competitor2'] == $mall_competitor2)) {
                            $comparison_competitorValuePrice = $result_competitor[$criteria_competitor];
                            break;
                        } elseif (($result_competitor['alternative_competitor'] == $mall_competitor2 && $result_competitor['alternative_competitor2'] == $mall_competitor1)) {
                            $comparison_competitorValuePrice = 1 / $result_competitor[$criteria_competitor]; // Take the inverse
                            $isInverseCompetitor = true;
                            break;
                        }
                    }


                    if ($comparison_competitorValuePrice !== null) {
                        if ($isInverseCompetitor) {
                            echo "<td>" . number_format($comparison_competitorValuePrice, 5, '.', '') . "</td>"; // Display inverse comparison_competitor value
                        } else {
                            echo "<td>" . number_format($comparison_competitorValuePrice, 5, '.', '') . "</td>"; // Display comparison_competitor value
                        }
                        $totalRowCompetitor += $comparison_competitorValuePrice;
                        $totalValuesCompetitor[$mall_competitor1] += $comparison_competitorValuePrice;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowCompetitor, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison_competitor results
            echo "<h3>Divided Comparison_competitor Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Mall</th>";
            foreach ($malls_competitor as $mall_competitor) {
                echo "<th>$mall_competitor</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison_competitor results
            foreach ($malls_competitor as $mall_competitor) {
                echo "<tr>";
                echo "<td>$mall_competitor</td>";

                // Get the total for this row
                $rowTotalCompetitor = $totalValuesCompetitor[$mall_competitor];

                // Initialize the sum of divided values for this row
                $dividedValuesSumCompetitor = 0;

                foreach ($malls_competitor as $mall_competitor2) {
                    // Get the current value in the table
                    $currentValueCompetitor = 0;

                    // Search for the corresponding value in the comparison_competitor results
                    foreach ($comparison_competitor_results_competitor as $result_competitor) {
                        if (($result_competitor['alternative_competitor'] == $mall_competitor && $result_competitor['alternative_competitor2'] == $mall_competitor2)) {
                            $currentValueCompetitor = $result_competitor[$criteria_competitor];
                            break;
                        } elseif (($result_competitor['alternative_competitor'] == $mall_competitor2 && $result_competitor['alternative_competitor2'] == $mall_competitor)) {
                            // If inverse comparison_competitor found, set the current value as its inverse
                            $currentValueCompetitor = 1 / $result_competitor[$criteria_competitor];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueCompetitor = 0;
                    if ($rowTotalCompetitor != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueCompetitor = $currentValueCompetitor / $rowTotalCompetitor;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumCompetitor += $dividedValueCompetitor;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueCompetitor, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumCompetitor . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numMalls_competitor = count($malls_competitor);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnCompetitor = array_fill_keys($malls_competitor, 0);

            // Menghitung total nilai per kolom
            foreach ($malls_competitor as $mall_competitor) {
                foreach ($malls_competitor as $mall_competitor2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalCompetitor = $totalValuesCompetitor[$mall_competitor];
                    foreach ($comparison_competitor_results_competitor as $result) {
                        if (($result['alternative_competitor'] == $mall_competitor && $result['alternative_competitor2'] == $mall_competitor2)) {
                            $currentValueCompetitor = $result[$criteria_competitor] / $rowTotalCompetitor; // Dibagi dengan total baris
                            $totalPerColumnCompetitor[$mall_competitor2] += $currentValueCompetitor;
                            break;
                        } elseif (($result['alternative_competitor'] == $mall_competitor2 && $result['alternative_competitor2'] == $mall_competitor)) {
                            $currentValueCompetitor = 1 / $result[$criteria_competitor] / $rowTotalCompetitor; // Dibagi dengan total baris
                            $totalPerColumnCompetitor[$mall_competitor2] += $currentValueCompetitor;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnCompetitor as $mall_competitor => $total_competitor) {
                $totalPerColumnCompetitor[$mall_competitor] /= $numMalls_competitor;
            }

            // Menghitung total dari hasil
            $totalResultCompetitor = 0;
            foreach ($totalPerColumnCompetitor as $total_competitor) {
                $totalResultCompetitor += $total_competitor;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($malls_competitor as $mall_competitor) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnCompetitor[$mall_competitor], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultCompetitor</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Simpan nilai eigenvector dalam sesi
            $_SESSION['eigenvector_pesaing'] = $totalPerColumnCompetitor;

            // Hitung Lambda Max
            $lambdaMaxCompetitor = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($malls_competitor as $mall_competitor) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForMallCompetitor = $totalValuesCompetitor[$mall_competitor];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForMallCompetitor = $totalPerColumnCompetitor[$mall_competitor];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxCompetitor += $totalValueForMallCompetitor * $eigenvectorForMallCompetitor;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxCompetitor, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexCompetitor = 0;
            switch ($numMalls_competitor) {
                case 1:
                    $randomConsistencyIndexCompetitor = 0;
                    break;
                case 2:
                    $randomConsistencyIndexCompetitor = 0;
                    break;
                case 3:
                    $randomConsistencyIndexCompetitor = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexCompetitor = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexCompetitor = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexCompetitor = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexCompetitor = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexCompetitor = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexCompetitor = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexCompetitor = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexCompetitor = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexCompetitor = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexCompetitor = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexCompetitor = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexCompetitor = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexCompetitor = ($lambdaMaxCompetitor - $numMalls_competitor) / ($numMalls_competitor - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioCompetitor = $consistencyIndexCompetitor / $randomConsistencyIndexCompetitor;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexCompetitor, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numMalls_competitor elemen: " . $randomConsistencyIndexCompetitor . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioCompetitor, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioCompetitor < 0.1) {
                echo "<p>Nilai Konsisten</p>";
            } else {
                echo "<p>Nilai Tidak Konsisten</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
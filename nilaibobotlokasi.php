<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results'])) {
    $_SESSION['comparison_results'] = [];
}

// Initialize selected mallsT$mallsToShow
$mallsToShow = $_SESSION['selected_malls'] ?? [];

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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Alternatif Terhadap Kriteria Ukuran Gerai</h2>
            </div>
        </div>

        <form method="post" id="comparisonForm">
            <div class="row mb-3">
                <div class="col">
                    <label for="criteria">Kriteria:</label>
                    <input type="text" name="criteria" class="form-control" value="K01 - Ukuran Gerai" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="alternative1" class="form-select">
                        <?php
                        foreach ($mallsToShow as $mall) {
                            $selected = in_array($mall, $mallsToShow) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$mall\">$mall</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison" class="form-select">
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
                    <select name="alternative2" class="form-select">
                        <?php
                        foreach ($mallsToShow as $mall) {
                            echo "<option value=\"$mall\">$mall</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    <!-- <input type="button" name="reset" value="Reset" class="btn btn-secondary" onclick="resetForm()"> -->
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // Check if criteria is set
            if (isset($_POST['criteria'])) {
                // Get input values
                $criteria = $_POST['criteria'];
                $alternative1 = $_POST['alternative1'];
                $comparison_value = $_POST['comparison'];
                $alternative2 = $_POST['alternative2'];

                // Retrieve comparison results from session
                $comparison_results = $_SESSION['comparison_results'];

                // Check if the comparison result for this combination of alternative1 and alternative2 already exists
                // Jika alternative1 dan alternative2 sama, set nilai perbandingannya menjadi 1
                if ($alternative1 === $alternative2) {
                    $comparison_value = 1;
                }

                // Check if the comparison result for this combination of alternative1 and alternative2 already exists
                $exists = false;
                foreach ($comparison_results as $key => $result) {
                    if ($result['alternative1'] == $alternative1 && $result['alternative2'] == $alternative2) {
                        $exists = true;
                        // Update the comparison value
                        $comparison_results[$key][$criteria] = $comparison_value;
                        break; // Break the loop after updating the comparison value
                    }
                }

                // If the comparison result doesn't exist, add it to the comparison results array
                if (!$exists) {
                    $comparison_results[] = array(
                        'alternative1' => $alternative1,
                        'alternative2' => $alternative2,
                        $criteria => $comparison_value
                    );
                }


                // Update the comparison results in the session
                $_SESSION['comparison_results'] = $comparison_results;
            } else {
                // Action if criteria is not defined
                echo "Kriteria tidak terdefinisi.";
            }

            echo "<h3>Hasil Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Alternatif</th>";
            foreach ($mallsToShow as $mall) {
                echo "<th>$mall</th>";
            }

            // Initialize an array to store the total values for each mall
            $totalValues = array_fill_keys($mallsToShow, 0);

            // Loop through each mall for comparison results
            foreach ($mallsToShow as $mall1) {
                echo "<tr>";
                echo "<th>$mall1</th>";
                $totalRow = 0; // Total for this row

                foreach ($mallsToShow as $mall2) {
                    $comparisonValue = null;
                    $isInverse = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results as $result) {
                        if (($result['alternative1'] == $mall1 && $result['alternative2'] == $mall2)) {
                            $comparisonValue = $result[$criteria];
                            break;
                        } elseif (($result['alternative1'] == $mall2 && $result['alternative2'] == $mall1)) {
                            $comparisonValue = 1 / $result[$criteria]; // Take the inverse
                            $isInverse = true;
                            break;
                        }
                    }

                    if ($comparisonValue !== null) {
                        if ($isInverse) {
                            echo "<td>" . number_format($comparisonValue, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValue, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalValues[$mall2] += $comparisonValue; // Fix here, use mall2 as key for totalValues
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all mallsT$mallsToShow
            echo "<tr><th>Total</th>";
            $totalTotal = 0;
            foreach ($mallsToShow as $mall) {
                $totalTotal += $totalValues[$mall];
                echo "<th>" . number_format($totalValues[$mall], 5, '.', '') . "</th>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Hasil Normalisasi Perbandingan</h3>";
            echo "<table class ='table table-striped'>";
            echo "<tr><th>Alternatif</th>";
            foreach ($mallsToShow as $mall) {
                echo "<th>$mall</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotals = array_fill_keys($mallsToShow, 0);

            // Counting the number of mallsT$mallsToShow
            $numMalls = count($mallsToShow);

            // Initialize an array to store normalized row totals
            $normalizedRowTotals = [];

            // Loop through each mall for comparison results
            foreach ($mallsToShow as $mall1) {
                echo "<tr>";
                echo "<th>$mall1</th>";
                $rowTotal = 0; // Menyimpan total per baris

                foreach ($mallsToShow as $mall2) {
                    $comparisonValue = null;

                    foreach ($comparison_results as $result) {
                        if (($result['alternative1'] == $mall1 && $result['alternative2'] == $mall2)) {
                            $comparisonValue = $result[$criteria];
                            break;
                        } elseif (($result['alternative1'] == $mall2 && $result['alternative2'] == $mall1)) {
                            $comparisonValue = 1 / $result[$criteria]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValue !== null) {
                        // Calculate the normalized value
                        $normalizedValue = $comparisonValue / $totalValues[$mall2];
                        echo "<td>" . number_format($normalizedValue, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotals[$mall2] += $normalizedValue;

                        // Add to row total
                        $rowTotal += $normalizedValue;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotal = $rowTotal / $numMalls;
                $normalizedRowTotals[$mall1] = $normalizedRowTotal; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotal, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all mallsT$mallsToShow
            echo "<tr><th>Total</th>";
            foreach ($mallsToShow as $mall) {
                echo "<th>" . number_format($columnTotals[$mall], 5, '.', '') . "</th>";
            }

            // Calculate eigen value and display
            $eigenValue = array_sum($columnTotals) / $numMalls;
            echo "<th>" . number_format($eigenValue, 5, '.', '') . "</th>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotals as $mall => $rowTotal) {
            //     echo "<li><strong>$mall:</strong> " . number_format($rowTotal, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_lokasi'] = $normalizedRowTotals;

            // Calculate Lambda Max
            $lambdaMax = 0;
            foreach ($mallsToShow as $mall) {
                $lambdaMax += $totalValues[$mall] * $normalizedRowTotals[$mall];
            }

            // echo "<p>Nilai Lambda Max: " . number_format($lambdaMax, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndex  = 0;
            switch ($numMalls) {
                case 1:
                    $randomConsistencyIndex  = 0;
                    break;
                case 2:
                    $randomConsistencyIndex  = 0;
                    break;
                case 3:
                    $randomConsistencyIndex  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndex  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndex  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndex  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndex  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndex  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndex  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndex  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndex  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndex  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndex  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndex  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndex  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CI = ($lambdaMax - $numMalls) / ($numMalls - 1);


            // Calculate Consistency Ratio (CR)
            $CR = $CI / $randomConsistencyIndex; // You need to define RI according to your matrix size

            // Check if consistency is acceptable
            if ($CR < 0.1) {
                echo "<p><strong>Konsistensi Rasio (CR) Bernilai Konsisten </strong></p>";
            } else {
                echo "<p><strong>Konsistensi Rasio (CR) Tidak Bernilai Konsisten </strong></p>";
            }
        }
        ?>

        <!-- <script>
            function resetForm() {
                // Mengambil elemen formulir berdasarkan ID
                var form = document.getElementById('comparisonForm');

                // Reset pilihan dropdown ke opsi pertama
                var selects = form.getElementsByTagName('select');
                for (var i = 0; i < selects.length; i++) {
                    selects[i].selectedIndex = 0;
                }

                // Melakukan reset pada formulir
                form.reset();
            }
        </script> -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();

// Initialize selected mallsT$mallsToShowPrice
$mallsToShowPrice = $_SESSION['selected_malls'] ?? [];

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
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall_price Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall_price Kuta</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall_price Bali</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall_price</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall_price</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall_price</a>
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Alternatif Terhadap Kriteria Harga</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="criteria">Kriteria:</label>
                    <input type="text" name="criteria_price" class="form-control" value="K02 - Harga" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="alternative_price1" class="form-select">
                        <?php
                        foreach ($mallsToShowPrice as $mall_price) {
                            $selected = in_array($mall_price, $mallsToShowPrice) ? 'selected' : ''; // Menandai mal yang sudah dipilih sebelumnya
                            echo "<option value=\"$mall_price\">$mall_price</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_price" class="form-select">
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
                    <select name="alternative_price2" class="form-select">
                        <?php
                        foreach ($mallsToShowPrice as $mall_price) {
                            echo "<option value=\"$mall_price\">$mall_price</option>";
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
            // Check if criteria_price is set
            if (isset($_POST['criteria_price'])) {
                // Get input values
                $criteria_price = $_POST['criteria_price'];
                $alternative_price1 = $_POST['alternative_price1'];
                $comparison_value_price = $_POST['comparison_price'];
                $alternative_price2 = $_POST['alternative_price2'];

                // Retrieve comparison_price results from session
                $comparison_results_price = $_SESSION['comparison_results_price'];

                // Check if the comparison_price result_price for this combination of alternative_price1 and alternative_price2 already exists
                // Jika alternative_price1 dan alternative_price2 sama, set nilai perbandingannya menjadi 1
                if ($alternative_price1 === $alternative_price2) {
                    $comparison_value_price = 1;
                }

                // Check if the comparison_price result_price for this combination of alternative_price1 and alternative_price2 already exists
                $exists = false;
                foreach ($comparison_results_price as $key_price => $result_price) {
                    if ($result_price['alternative_price1'] == $alternative_price1 && $result_price['alternative_price2'] == $alternative_price2) {
                        $exists = true;
                        // Update the comparison_price value
                        $comparison_results_price[$key_price][$criteria_price] = $comparison_value_price;
                        break; // Break the loop after updating the comparison_price value
                    }
                }

                // If the comparison_price result_price doesn't exist, add it to the comparison_price results array
                if (!$exists) {
                    $comparison_results_price[] = array(
                        'alternative_price1' => $alternative_price1,
                        'alternative_price2' => $alternative_price2,
                        $criteria_price => $comparison_value_price
                    );
                }


                // Update the comparison_price results in the session
                $_SESSION['comparison_results_price'] = $comparison_results_price;
            } else {
                // Action if criteria_price is not defined
                echo "Kriteria tidak terdefinisi.";
            }

            echo "<h3>Comparison_price Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_price</th>";
            foreach ($mallsToShowPrice as $mall_price) {
                echo "<th>$mall_price</th>";
            }

            // Initialize an array to store the total values for each mall_price
            $totalValuesPrice = array_fill_keys($mallsToShowPrice, 0);

            // Loop through each mall_price for comparison_price results
            foreach ($mallsToShowPrice as $mall_price1) {
                echo "<tr>";
                echo "<td>$mall_price1</td>";
                $totalRowPrice = 0; // Total for this row

                foreach ($mallsToShowPrice as $mall_price2) {
                    $comparisonValuePrice = null;
                    $isInversePrice = false; // Flag to check if the comparison_price is inverse

                    foreach ($comparison_results_price as $result_price) {
                        if (($result_price['alternative_price1'] == $mall_price1 && $result_price['alternative_price2'] == $mall_price2)) {
                            $comparisonValuePrice = $result_price[$criteria_price];
                            break;
                        } elseif (($result_price['alternative_price1'] == $mall_price2 && $result_price['alternative_price2'] == $mall_price1)) {
                            $comparisonValuePrice = 1 / $result_price[$criteria_price]; // Take the inverse
                            $isInversePrice = true;
                            break;
                        }
                    }

                    if ($comparisonValuePrice !== null) {
                        if ($isInversePrice) {
                            echo "<td>" . number_format($comparisonValuePrice, 5, '.', '') . "</td>"; // Display inverse comparison_price value
                        } else {
                            echo "<td>" . number_format($comparisonValuePrice, 5, '.', '') . "</td>"; // Display comparison_price value
                        }
                        $totalValuesPrice[$mall_price2] += $comparisonValuePrice; // Fix here, use mall_price2 as key_price for totalValuesPrice
                    } else {
                        echo "<td>-</td>";
                    }
                }
            }

            // Show the total row after looping through all mallsT$mallsToShowPrice
            echo "<tr><td>Total</td>";
            $totalTotalPrice = 0;
            foreach ($mallsToShowPrice as $mall_price) {
                $totalTotalPrice += $totalValuesPrice[$mall_price];
                echo "<td>" . number_format($totalValuesPrice[$mall_price], 5, '.', '') . "</td>";
            }
            echo "</tr>";

            echo "</table>";

            echo "<h3>Normalized Comparison_price Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_price</th>";
            foreach ($mallsToShowPrice as $mall_price) {
                echo "<th>$mall_price</th>";
            }
            echo "<th>Eigen</th>"; // Menambahkan judul kolom untuk normalized total per baris

            // Array to store column totals
            $columnTotalsPrice = array_fill_keys($mallsToShowPrice, 0);

            // Counting the number of mallsT$mallsToShowPrice
            $numMallsPrice = count($mallsToShowPrice);

            // Initialize an array to store normalized row totals
            $normalizedRowTotalsPrice = [];

            // Loop through each mall_price for comparison_price results
            foreach ($mallsToShowPrice as $mall_price1) {
                echo "<tr>";
                echo "<td>$mall_price1</td>";
                $rowTotalPrice = 0; // Menyimpan total per baris

                foreach ($mallsToShowPrice as $mall_price2) {
                    $comparisonValuePrice = null;

                    foreach ($comparison_results_price as $result_price) {
                        if (($result_price['alternative_price1'] == $mall_price1 && $result_price['alternative_price2'] == $mall_price2)) {
                            $comparisonValuePrice = $result_price[$criteria_price];
                            break;
                        } elseif (($result_price['alternative_price1'] == $mall_price2 && $result_price['alternative_price2'] == $mall_price1)) {
                            $comparisonValuePrice = 1 / $result_price[$criteria_price]; // Take the inverse
                            break;
                        }
                    }

                    if ($comparisonValuePrice !== null) {
                        // Calculate the normalized value
                        $normalizedValuePrice = $comparisonValuePrice / $totalValuesPrice[$mall_price2];
                        echo "<td>" . number_format($normalizedValuePrice, 5, '.', '') . "</td>";

                        // Add to column totals
                        $columnTotalsPrice[$mall_price2] += $normalizedValuePrice;

                        // Add to row total
                        $rowTotalPrice += $normalizedValuePrice;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                // Calculate normalized row total
                $normalizedRowTotalPrice = $rowTotalPrice / $numMallsPrice;
                $normalizedRowTotalsPrice[$mall_price1] = $normalizedRowTotalPrice; // Store normalized row total
                echo "<td>" . number_format($normalizedRowTotalPrice, 5, '.', '') . "</td>";
            }

            // Show the total row after looping through all mallsT$mallsToShowPrice
            echo "<tr><td>Total</td>";
            foreach ($mallsToShowPrice as $mall_price) {
                echo "<td>" . number_format($columnTotalsPrice[$mall_price], 5, '.', '') . "</td>";
            }

            // Calculate eigen value and display
            $eigenValuePrice = array_sum($columnTotalsPrice) / $numMallsPrice;
            echo "<td>" . number_format($eigenValuePrice, 5, '.', '') . "</td>";

            echo "</tr>";
            echo "</table>";

            // Display normalized row totals
            // echo "<h3>Normalized Row Totals</h3>";
            // echo "<ul>";
            // foreach ($normalizedRowTotalsPrice as $mall_price => $rowTotalPrice) {
            //     echo "<li><strong>$mall_price:</strong> " . number_format($rowTotalPrice, 5, '.', '') . "</li>";
            // }
            // echo "</ul>";


            // Simpan nilai normalized row totals dalam sesi
            $_SESSION['normalized_row_totals_harga'] = $normalizedRowTotalsPrice;

            // Calculate Lambda Max
            $lambdaMaxPrice = 0;
            foreach ($mallsToShowPrice as $mall_price) {
                $lambdaMaxPrice += $totalValuesPrice[$mall_price2] * $normalizedRowTotalPrice;
            }

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall_price
            $randomConsistencyIndexPrice  = 0;
            switch ($numMallsPrice) {
                case 1:
                    $randomConsistencyIndexPrice  = 0;
                    break;
                case 2:
                    $randomConsistencyIndexPrice  = 0;
                    break;
                case 3:
                    $randomConsistencyIndexPrice  = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexPrice  = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexPrice  = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexPrice  = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexPrice  = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexPrice  = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexPrice  = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexPrice  = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexPrice  = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexPrice  = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexPrice  = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexPrice  = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexPrice  = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Calculate Consistency Index (CI)
            $CIPrice = ($lambdaMaxPrice - $numMallsPrice) / ($numMallsPrice - 1);


            // Calculate Consistency Ratio (CR)
            $CRPrice = $CIPrice / $randomConsistencyIndexPrice; // You need to define RI according to your matrix size

            // Check if consistency is acceptable
            if ($CRPrice < 0.1) {
                echo "<p>Consistency Ratio (CR) is acceptable </p>";
            } else {
                echo "<p>Consistency Ratio (CR) is not acceptable </p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_price_results_price'])) {
    $_SESSION['comparison_price_results_price'] = [];
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
                    <label for="criteria_price">Criteria:</label>
                    <input type="text" name="criteria_price" class="form-control" value="K02 - Price" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="alternative_price" class="form-select">
                        <?php
                        $malls_price = [
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

                        foreach ($malls_price as $mall_price) {
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
                        foreach ($malls_price as $mall_price) {
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
                $alternative_price = $_POST['alternative_price'];
                $comparison_price_value_price = $_POST['comparison_price'];
                $alternative_price2 = $_POST['alternative_price2'];

                // Retrieve comparison_price results from session
                $comparison_price_results_price = $_SESSION['comparison_price_results_price'];

                // Check if the comparison_price result for this combination of alternative_price and alternative_price2 already exists
                // Jika alternative_price dan alternative_price2 sama, set nilai perbandingannya menjadi 1
                if ($alternative_price === $alternative_price2) {
                    $comparison_price_value_price = 1;
                }

                // Check if the comparison_price result for this combination of alternative_price and alternative_price2 already exists
                $exists = false;
                foreach ($comparison_price_results_price as $key_price => $result_price) {
                    if ($result_price['alternative_price'] == $alternative_price && $result_price['alternative_price2'] == $alternative_price2) {
                        $exists = true;
                        // Update the comparison_price value
                        $comparison_price_results_price[$key_price][$criteria_price] = $comparison_price_value_price;
                        break; // Break the loop after updating the comparison_price value
                    }
                }

                // If the comparison_price result doesn't exist, add it to the comparison_price results array
                if (!$exists) {
                    $comparison_price_results_price[] = array(
                        'alternative_price' => $alternative_price,
                        'alternative_price2' => $alternative_price2,
                        $criteria_price => $comparison_price_value_price
                    );
                }


                // Update the comparison_price results in the session
                $_SESSION['comparison_price_results_price'] = $comparison_price_results_price;
            } else {
                // Action if criteria_price is not defined
                echo "Kriteria tidak terdefinisi.";
            }

            echo "<h3>Comparison_price Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison_price</th>";
            foreach ($malls_price as $mall_price) {
                echo "<th>$mall_price</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesPrice = array_fill_keys($malls_price, 0);

            // Loop through each mall for comparison_price results
            foreach ($malls_price as $mall_price1) {
                echo "<tr>";
                echo "<td>$mall_price1</td>";
                $totalRowPrice = 0; // Total for this row


                foreach ($malls_price as $mall_price2) {
                    $comparison_priceValuePrice = null;
                    $isInversePrice = false; // Flag to check if the comparison_price is inverse

                    foreach ($comparison_price_results_price as $result_price) {
                        if (($result_price['alternative_price'] == $mall_price1 && $result_price['alternative_price2'] == $mall_price2)) {
                            $comparison_priceValuePrice = $result_price[$criteria_price];
                            break;
                        } elseif (($result_price['alternative_price'] == $mall_price2 && $result_price['alternative_price2'] == $mall_price1)) {
                            $comparison_priceValuePrice = 1 / $result_price[$criteria_price]; // Take the inverse
                            $isInversePrice = true;
                            break;
                        }
                    }


                    if ($comparison_priceValuePrice !== null) {
                        if ($isInversePrice) {
                            echo "<td>" . number_format($comparison_priceValuePrice, 5, '.', '') . "</td>"; // Display inverse comparison_price value
                        } else {
                            echo "<td>" . number_format($comparison_priceValuePrice, 5, '.', '') . "</td>"; // Display comparison_price value
                        }
                        $totalRowPrice += $comparison_priceValuePrice;
                        $totalValuesPrice[$mall_price1] += $comparison_priceValuePrice;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowPrice, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison_price results
            echo "<h3>Divided Comparison_price Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Mall</th>";
            foreach ($malls_price as $mall_price) {
                echo "<th>$mall_price</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison_price results
            foreach ($malls_price as $mall_price) {
                echo "<tr>";
                echo "<td>$mall_price</td>";

                // Get the total for this row
                $rowTotalPrice = $totalValuesPrice[$mall_price];

                // Initialize the sum of divided values for this row
                $dividedValuesSumPrice = 0;

                foreach ($malls_price as $mall_price2) {
                    // Get the current value in the table
                    $currentValuePrice = 0;

                    // Search for the corresponding value in the comparison_price results
                    foreach ($comparison_price_results_price as $result_price) {
                        if (($result_price['alternative_price'] == $mall_price && $result_price['alternative_price2'] == $mall_price2)) {
                            $currentValuePrice = $result_price[$criteria_price];
                            break;
                        } elseif (($result_price['alternative_price'] == $mall_price2 && $result_price['alternative_price2'] == $mall_price)) {
                            // If inverse comparison_price found, set the current value as its inverse
                            $currentValuePrice = 1 / $result_price[$criteria_price];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValuePrice = 0;
                    if ($rowTotalPrice != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValuePrice = $currentValuePrice / $rowTotalPrice;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumPrice += $dividedValuePrice;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValuePrice, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumPrice . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numMalls_price = count($malls_price);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnPrice = array_fill_keys($malls_price, 0);

            // Menghitung total nilai per kolom
            foreach ($malls_price as $mall_price) {
                foreach ($malls_price as $mall_price2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalPrice = $totalValuesPrice[$mall_price];
                    foreach ($comparison_price_results_price as $result) {
                        if (($result['alternative_price'] == $mall_price && $result['alternative_price2'] == $mall_price2)) {
                            $currentValuePrice = $result[$criteria_price] / $rowTotalPrice; // Dibagi dengan total baris
                            $totalPerColumnPrice[$mall_price2] += $currentValuePrice;
                            break;
                        } elseif (($result['alternative_price'] == $mall_price2 && $result['alternative_price2'] == $mall_price)) {
                            $currentValuePrice = 1 / $result[$criteria_price] / $rowTotalPrice; // Dibagi dengan total baris
                            $totalPerColumnPrice[$mall_price2] += $currentValuePrice;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnPrice as $mall_price => $total_price) {
                $totalPerColumnPrice[$mall_price] /= $numMalls_price;
            }

            // Menghitung total dari hasil
            $totalResultPrice = 0;
            foreach ($totalPerColumnPrice as $total_price) {
                $totalResultPrice += $total_price;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($malls_price as $mall_price) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnPrice[$mall_price], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultPrice</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Simpan nilai eigenvector dalam sesi
            $_SESSION['eigenvector_harga'] = $totalPerColumnPrice;

            // Hitung Lambda Max
            $lambdaMaxPrice = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($malls_price as $mall_price) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForMallPrice = $totalValuesPrice[$mall_price];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForMallPrice = $totalPerColumnPrice[$mall_price];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxPrice += $totalValueForMallPrice * $eigenvectorForMallPrice;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxPrice, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexPrice = 0;
            switch ($numMalls_price) {
                case 1:
                    $randomConsistencyIndexPrice = 0;
                    break;
                case 2:
                    $randomConsistencyIndexPrice = 0;
                    break;
                case 3:
                    $randomConsistencyIndexPrice = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexPrice = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexPrice = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexPrice = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexPrice = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexPrice = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexPrice = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexPrice = 1.49;
                    break;
                case 11:
                    $randomConsistencyIndexPrice = 1.51;
                    break;
                case 12:
                    $randomConsistencyIndexPrice = 1.48;
                    break;
                case 13:
                    $randomConsistencyIndexPrice = 1.56;
                    break;
                case 14:
                    $randomConsistencyIndexPrice = 1.57;
                    break;
                case 15:
                    $randomConsistencyIndexPrice = 1.59;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexPrice = ($lambdaMaxPrice - $numMalls_price) / ($numMalls_price - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioPrice = $consistencyIndexPrice / $randomConsistencyIndexPrice;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexPrice, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numMalls_price elemen: " . $randomConsistencyIndexPrice . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioPrice, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioPrice < 0.1) {
                echo "<p>Nilai Konsisten</p>";
            } else {
                echo "<p>Nilai Tidak Konsisten</p>";
            }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
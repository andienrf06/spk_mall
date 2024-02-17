<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results1'])) {
    $_SESSION['comparison_results1'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Perbandingan Tingkat Kepentingan Kriteria Terhadap Alternatif Mall Bali Collection</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternative:</label>
                    <input type="text" name="alternatif" class="form-control" value="A01 - Bali Collection" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria1" class="form-select">
                        <?php
                        $tenants = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants as $tenant) {
                            echo "<option value=\"$tenant\">$tenant</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison1" class="form-select">
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
                    <select name="kriteria2" class="form-select">
                        <?php
                        foreach ($tenants as $tenant) {
                            echo "<option value=\"$tenant\">$tenant</option>";
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
            // Get input values
            $alternatif = $_POST['alternatif'];
            $kriteria1 = $_POST['kriteria1'];
            $comparison_value1 = $_POST['comparison1'];
            $kriteria2 = $_POST['kriteria2'];

            // Retrieve comparison results from session
            $comparison_results1 = $_SESSION['comparison_results1'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results1 as $key1 => $result1) {
                if ($result1['kriteria1'] == $kriteria1 && $result1['kriteria2'] == $kriteria2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results1[$key1][$alternatif] = $comparison_value1;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results1[] = array(
                    'kriteria1' => $kriteria1,
                    'kriteria2' => $kriteria2,
                    $alternatif => $comparison_value1
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results1'] = $comparison_results1;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants as $tenant) {
                echo "<th>$tenant</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValues1 = array_fill_keys($tenants, 0);

            // Loop through each mall for comparison results
            foreach ($tenants as $tenant1) {
                echo "<tr>";
                echo "<td>$tenant1</td>";
                $totalRow1 = 0; // Total for this row

                foreach ($tenants as $tenant2) {
                    $comparisonValue1 = null;
                    $isInverse1 = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results1 as $result1) {
                        if (($result1['kriteria1'] == $tenant1 && $result1['kriteria2'] == $tenant2)) {
                            $comparisonValue1 = $result1[$alternatif];
                            break;
                        } elseif (($result1['kriteria1'] == $tenant2 && $result1['kriteria2'] == $tenant1)) {
                            $comparisonValue1 = 1 / $result1[$alternatif]; // Take the inverse
                            $isInverse1 = true;
                            break;
                        }
                    }

                    if ($comparisonValue1 !== null) {
                        if ($isInverse1) {
                            echo "<td>" . number_format($comparisonValue1, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValue1, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRow1 += $comparisonValue1;
                        $totalValues1[$tenant1] += $comparisonValue1;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRow1, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants as $tenant) {
                echo "<th>$tenant</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants as $tenant) {
                echo "<tr>";
                echo "<td>$tenant</td>";

                // Get the total for this row
                $rowTotal1 = $totalValues1[$tenant];

                // Initialize the sum of divided values for this row
                $dividedValuesSum1 = 0;

                foreach ($tenants as $tenant2) {
                    // Get the current value in the table
                    $currentValue1 = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results1 as $result1) {
                        if (($result1['kriteria1'] == $tenant && $result1['kriteria2'] == $tenant2)) {
                            $currentValue1 = $result1[$alternatif];
                            break;
                        } elseif (($result1['kriteria1'] == $tenant2 && $result1['kriteria2'] == $tenant)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValue1 = 1 / $result1[$alternatif];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValue1 = 0;
                    if ($rowTotal1 != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValue1 = $currentValue1 / $rowTotal1;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSum1 += $dividedValue1;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValue1, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSum1 . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenants1 = count($tenants);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumn1 = array_fill_keys($tenants, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants as $tenant) {
                foreach ($tenants as $tenant2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotal1 = $totalValues1[$tenant];
                    foreach ($comparison_results1 as $result1) {
                        if (($result1['kriteria1'] == $tenant && $result1['kriteria2'] == $tenant2)) {
                            $currentValue1 = $result1[$alternatif] / $rowTotal1; // Dibagi dengan total baris
                            $totalPerColumn1[$tenant2] += $currentValue1;
                            break;
                        } elseif (($result1['kriteria1'] == $tenant2 && $result1['kriteria2'] == $tenant)) {
                            $currentValue1 = 1 / $result1[$alternatif] / $rowTotal1; // Dibagi dengan total baris
                            $totalPerColumn1[$tenant2] += $currentValue1;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumn1 as $tenant => $total1) {
                $totalPerColumn1[$tenant] /= $numTenants1;
            }

            // Menghitung total dari hasil
            $totalResult1 = 0;
            foreach ($totalPerColumn1 as $total1) {
                $totalResult1 += $total1;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants as $tenant) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumn1[$tenant], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResult1</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Simpan nilai eigenvector dalam sesi
            $_SESSION['eigenvector_balicollection'] = $totalPerColumn1;

            // Hitung Lambda Max
            $lambdaMax1 = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants as $tenant) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenant1 = $totalValues1[$tenant];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenant1 = $totalPerColumn1[$tenant];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMax1 += $totalValueForTenant1 * $eigenvectorForTenant1;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMax1, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndex1 = 0;
            switch ($numTenants1) {
                case 1:
                    $randomConsistencyIndex1 = 0;
                    break;
                case 2:
                    $randomConsistencyIndex1 = 0;
                    break;
                case 3:
                    $randomConsistencyIndex1 = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndex1 = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndex1 = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndex1 = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndex1 = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndex1 = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndex1 = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndex1 = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndex1 = ($lambdaMax1 - $numTenants1) / ($numTenants1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatio1 = $consistencyIndex1 / $randomConsistencyIndex1;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndex1, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenants1 elemen: " . $randomConsistencyIndex1 . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatio1, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatio1 < 0.1) {
                echo "<p>Nilai Konsisten</p>";
            } else {
                echo "<p>Nilai Tidak Konsisten.</p>";
            }
        }
        ?>



    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
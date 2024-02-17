<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_lipporenon'])) {
    $_SESSION['comparison_results_lipporenon'] = [];
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
                <h2 class="mb-4 mt-4">Nilai Bobot Kriteria</h2>
            </div>
        </div>

        <form method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="alternatif">Alternative:</label>
                    <input type="text" name="alternatif_lipporenon" class="form-control" value="A10 - Lippo Plaza Renon" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_lipporenon" class="form-select">
                        <?php
                        $tenants_lipporenon = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_lipporenon as $tenant_lipporenon) {
                            echo "<option value=\"$tenant_lipporenon\">$tenant_lipporenon</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_lipporenon" class="form-select">
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
                    <select name="kriteria_lipporenon2" class="form-select">
                        <?php
                        foreach ($tenants_lipporenon as $tenant_lipporenon) {
                            echo "<option value=\"$tenant_lipporenon\">$tenant_lipporenon</option>";
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
            $alternatif_lipporenon = $_POST['alternatif_lipporenon'];
            $kriteria_lipporenon = $_POST['kriteria_lipporenon'];
            $comparison_value_lipporenon = $_POST['comparison_lipporenon'];
            $kriteria_lipporenon2 = $_POST['kriteria_lipporenon2'];

            // Retrieve comparison results from session
            $comparison_results_lipporenon = $_SESSION['comparison_results_lipporenon'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_lipporenon as $key_lipporenon => $result_lipporenon) {
                if ($result_lipporenon['kriteria_lipporenon'] == $kriteria_lipporenon && $result_lipporenon['kriteria_lipporenon2'] == $kriteria_lipporenon2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_lipporenon[$key_lipporenon][$alternatif_lipporenon] = $comparison_value_lipporenon;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_lipporenon[] = array(
                    'kriteria_lipporenon' => $kriteria_lipporenon,
                    'kriteria_lipporenon2' => $kriteria_lipporenon2,
                    $alternatif_lipporenon => $comparison_value_lipporenon
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_lipporenon'] = $comparison_results_lipporenon;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                echo "<th>$tenant_lipporenon</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesLippoRenon = array_fill_keys($tenants_lipporenon, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_lipporenon as $tenant_lipporenon1) {
                echo "<tr>";
                echo "<td>$tenant_lipporenon1</td>";
                $totalRowLippoRenon = 0; // Total for this row

                foreach ($tenants_lipporenon as $tenant_lipporenon2) {
                    $comparisonValueLippoRenon = null;
                    $isInverseLippoRenon = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_lipporenon as $result_lipporenon) {
                        if (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon1 && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon2)) {
                            $comparisonValueLippoRenon = $result_lipporenon[$alternatif_lipporenon];
                            break;
                        } elseif (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon2 && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon1)) {
                            $comparisonValueLippoRenon = 1 / $result_lipporenon[$alternatif_lipporenon]; // Take the inverse
                            $isInverseLippoRenon = true;
                            break;
                        }
                    }

                    if ($comparisonValueLippoRenon !== null) {
                        if ($isInverseLippoRenon) {
                            echo "<td>" . number_format($comparisonValueLippoRenon, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueLippoRenon, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowLippoRenon += $comparisonValueLippoRenon;
                        $totalValuesLippoRenon[$tenant_lipporenon1] += $comparisonValueLippoRenon;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowLippoRenon, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                echo "<th>$tenant_lipporenon</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                echo "<tr>";
                echo "<td>$tenant_lipporenon</td>";

                // Get the total for this row
                $rowTotalLippoRenon = $totalValuesLippoRenon[$tenant_lipporenon];

                // Initialize the sum of divided values for this row
                $dividedValuesSumLippoRenon = 0;

                foreach ($tenants_lipporenon as $tenant_lipporenon2) {
                    // Get the current value in the table
                    $currentValueLippoRenon = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_lipporenon as $result_lipporenon) {
                        if (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon2)) {
                            $currentValueLippoRenon = $result_lipporenon[$alternatif_lipporenon];
                            break;
                        } elseif (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon2 && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueLippoRenon = 1 / $result_lipporenon[$alternatif_lipporenon];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueLippoRenon = 0;
                    if ($rowTotalLippoRenon != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueLippoRenon = $currentValueLippoRenon / $rowTotalLippoRenon;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumLippoRenon += $dividedValueLippoRenon;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueLippoRenon, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumLippoRenon . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsLippoRenon1 = count($tenants_lipporenon);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnLippoRenon = array_fill_keys($tenants_lipporenon, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                foreach ($tenants_lipporenon as $tenant_lipporenon2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalLippoRenon = $totalValuesLippoRenon[$tenant_lipporenon];
                    foreach ($comparison_results_lipporenon as $result_lipporenon) {
                        if (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon2)) {
                            $currentValueLippoRenon = $result_lipporenon[$alternatif_lipporenon] / $rowTotalLippoRenon; // Dibagi dengan total baris
                            $totalPerColumnLippoRenon[$tenant_lipporenon2] += $currentValueLippoRenon;
                            break;
                        } elseif (($result_lipporenon['kriteria_lipporenon'] == $tenant_lipporenon2 && $result_lipporenon['kriteria_lipporenon2'] == $tenant_lipporenon)) {
                            $currentValueLippoRenon = 1 / $result_lipporenon[$alternatif_lipporenon] / $rowTotalLippoRenon; // Dibagi dengan total baris
                            $totalPerColumnLippoRenon[$tenant_lipporenon2] += $currentValueLippoRenon;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnLippoRenon as $tenant_lipporenon => $totalLippoRenon) {
                $totalPerColumnLippoRenon[$tenant_lipporenon] /= $numTenantsLippoRenon1;
            }

            // Menghitung total dari hasil
            $totalResultLippoRenon = 0;
            foreach ($totalPerColumnLippoRenon as $totalLippoRenon) {
                $totalResultLippoRenon += $totalLippoRenon;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnLippoRenon[$tenant_lipporenon], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultLippoRenon</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxLippoRenon = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_lipporenon as $tenant_lipporenon) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantLippoRenon = $totalValuesLippoRenon[$tenant_lipporenon];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantLippoRenon = $totalPerColumnLippoRenon[$tenant_lipporenon];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxLippoRenon += $totalValueForTenantLippoRenon * $eigenvectorForTenantLippoRenon;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLippoRenon, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexLippoRenon = 0;
            switch ($numTenantsLippoRenon1) {
                case 1:
                    $randomConsistencyIndexLippoRenon = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLippoRenon = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLippoRenon = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLippoRenon = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLippoRenon = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLippoRenon = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLippoRenon = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLippoRenon = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLippoRenon = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLippoRenon = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexLippoRenon = ($lambdaMaxLippoRenon - $numTenantsLippoRenon1) / ($numTenantsLippoRenon1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioLippoRenon = $consistencyIndexLippoRenon / $randomConsistencyIndexLippoRenon;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexLippoRenon, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsLippoRenon1 elemen: " . $randomConsistencyIndexLippoRenon . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioLippoRenon, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioLippoRenon < 0.1) {
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
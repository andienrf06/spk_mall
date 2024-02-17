<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_living'])) {
    $_SESSION['comparison_results_living'] = [];
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
                    <input type="text" name="alternatif_living" class="form-control" value="A15 - Living World Denpasar" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_living" class="form-select">
                        <?php
                        $tenants_living = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_living as $tenant_living) {
                            echo "<option value=\"$tenant_living\">$tenant_living</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_living" class="form-select">
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
                    <select name="kriteria_living2" class="form-select">
                        <?php
                        foreach ($tenants_living as $tenant_living) {
                            echo "<option value=\"$tenant_living\">$tenant_living</option>";
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
            $alternatif_living = $_POST['alternatif_living'];
            $kriteria_living = $_POST['kriteria_living'];
            $comparison_value_living = $_POST['comparison_living'];
            $kriteria_living2 = $_POST['kriteria_living2'];

            // Retrieve comparison results from session
            $comparison_results_living = $_SESSION['comparison_results_living'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_living as $key_living => $result_living) {
                if ($result_living['kriteria_living'] == $kriteria_living && $result_living['kriteria_living2'] == $kriteria_living2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_living[$key_living][$alternatif_living] = $comparison_value_living;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_living[] = array(
                    'kriteria_living' => $kriteria_living,
                    'kriteria_living2' => $kriteria_living2,
                    $alternatif_living => $comparison_value_living
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_living'] = $comparison_results_living;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_living as $tenant_living) {
                echo "<th>$tenant_living</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesLiving = array_fill_keys($tenants_living, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_living as $tenant_living1) {
                echo "<tr>";
                echo "<td>$tenant_living1</td>";
                $totalRowLiving = 0; // Total for this row

                foreach ($tenants_living as $tenant_living2) {
                    $comparisonValueLiving = null;
                    $isInverseLiving = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_living as $result_living) {
                        if (($result_living['kriteria_living'] == $tenant_living1 && $result_living['kriteria_living2'] == $tenant_living2)) {
                            $comparisonValueLiving = $result_living[$alternatif_living];
                            break;
                        } elseif (($result_living['kriteria_living'] == $tenant_living2 && $result_living['kriteria_living2'] == $tenant_living1)) {
                            $comparisonValueLiving = 1 / $result_living[$alternatif_living]; // Take the inverse
                            $isInverseLiving = true;
                            break;
                        }
                    }

                    if ($comparisonValueLiving !== null) {
                        if ($isInverseLiving) {
                            echo "<td>" . number_format($comparisonValueLiving, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueLiving, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowLiving += $comparisonValueLiving;
                        $totalValuesLiving[$tenant_living1] += $comparisonValueLiving;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowLiving, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_living as $tenant_living) {
                echo "<th>$tenant_living</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_living as $tenant_living) {
                echo "<tr>";
                echo "<td>$tenant_living</td>";

                // Get the total for this row
                $rowTotalLiving = $totalValuesLiving[$tenant_living];

                // Initialize the sum of divided values for this row
                $dividedValuesSumLiving = 0;

                foreach ($tenants_living as $tenant_living2) {
                    // Get the current value in the table
                    $currentValueLiving = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_living as $result_living) {
                        if (($result_living['kriteria_living'] == $tenant_living && $result_living['kriteria_living2'] == $tenant_living2)) {
                            $currentValueLiving = $result_living[$alternatif_living];
                            break;
                        } elseif (($result_living['kriteria_living'] == $tenant_living2 && $result_living['kriteria_living2'] == $tenant_living)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueLiving = 1 / $result_living[$alternatif_living];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueLiving = 0;
                    if ($rowTotalLiving != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueLiving = $currentValueLiving / $rowTotalLiving;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumLiving += $dividedValueLiving;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueLiving, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumLiving . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsLiving1 = count($tenants_living);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnLiving = array_fill_keys($tenants_living, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_living as $tenant_living) {
                foreach ($tenants_living as $tenant_living2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalLiving = $totalValuesLiving[$tenant_living];
                    foreach ($comparison_results_living as $result_living) {
                        if (($result_living['kriteria_living'] == $tenant_living && $result_living['kriteria_living2'] == $tenant_living2)) {
                            $currentValueLiving = $result_living[$alternatif_living] / $rowTotalLiving; // Dibagi dengan total baris
                            $totalPerColumnLiving[$tenant_living2] += $currentValueLiving;
                            break;
                        } elseif (($result_living['kriteria_living'] == $tenant_living2 && $result_living['kriteria_living2'] == $tenant_living)) {
                            $currentValueLiving = 1 / $result_living[$alternatif_living] / $rowTotalLiving; // Dibagi dengan total baris
                            $totalPerColumnLiving[$tenant_living2] += $currentValueLiving;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnLiving as $tenant_living => $totalLiving) {
                $totalPerColumnLiving[$tenant_living] /= $numTenantsLiving1;
            }

            // Menghitung total dari hasil
            $totalResultLiving = 0;
            foreach ($totalPerColumnLiving as $totalLiving) {
                $totalResultLiving += $totalLiving;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_living as $tenant_living) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnLiving[$tenant_living], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultLiving</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxLiving = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_living as $tenant_living) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantLiving = $totalValuesLiving[$tenant_living];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantLiving = $totalPerColumnLiving[$tenant_living];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxLiving += $totalValueForTenantLiving * $eigenvectorForTenantLiving;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLiving, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexLiving = 0;
            switch ($numTenantsLiving1) {
                case 1:
                    $randomConsistencyIndexLiving = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLiving = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLiving = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLiving = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLiving = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLiving = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLiving = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLiving = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLiving = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLiving = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexLiving = ($lambdaMaxLiving - $numTenantsLiving1) / ($numTenantsLiving1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioLiving = $consistencyIndexLiving / $randomConsistencyIndexLiving;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexLiving, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsLiving1 elemen: " . $randomConsistencyIndexLiving . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioLiving, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioLiving < 0.1) {
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
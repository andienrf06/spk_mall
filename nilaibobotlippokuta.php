<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results_lippokuta'])) {
    $_SESSION['comparison_results_lippokuta'] = [];
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
                    <input type="text" name="alternatif_lippokuta" class="form-control" value="A06 - Lippo Mall Kuta" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <select name="kriteria_lippokuta" class="form-select">
                        <?php
                        $tenants_lippokuta = [
                            "Location",
                            "Price",
                            "Competitor",
                        ];

                        foreach ($tenants_lippokuta as $tenant_lippokuta) {
                            echo "<option value=\"$tenant_lippokuta\">$tenant_lippokuta</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col">
                    <select name="comparison_lippokuta" class="form-select">
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
                    <select name="kriteria_lippokuta2" class="form-select">
                        <?php
                        foreach ($tenants_lippokuta as $tenant_lippokuta) {
                            echo "<option value=\"$tenant_lippokuta\">$tenant_lippokuta</option>";
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
            $alternatif_lippokuta = $_POST['alternatif_lippokuta'];
            $kriteria_lippokuta = $_POST['kriteria_lippokuta'];
            $comparison_value_lippokuta = $_POST['comparison_lippokuta'];
            $kriteria_lippokuta2 = $_POST['kriteria_lippokuta2'];

            // Retrieve comparison results from session
            $comparison_results_lippokuta = $_SESSION['comparison_results_lippokuta'];

            // Check if the comparison result for this combination of alternative1 and alternative2 already exists
            $exists = false;
            foreach ($comparison_results_lippokuta as $key_lippokuta => $result_lippokuta) {
                if ($result_lippokuta['kriteria_lippokuta'] == $kriteria_lippokuta && $result_lippokuta['kriteria_lippokuta2'] == $kriteria_lippokuta2) {
                    $exists = true;
                    // Update the comparison value
                    $comparison_results_lippokuta[$key_lippokuta][$alternatif_lippokuta] = $comparison_value_lippokuta;
                    break;
                }
            }

            // If the comparison result doesn't exist, add it to the comparison results array
            if (!$exists) {
                $comparison_results_lippokuta[] = array(
                    'kriteria_lippokuta' => $kriteria_lippokuta,
                    'kriteria_lippokuta2' => $kriteria_lippokuta2,
                    $alternatif_lippokuta => $comparison_value_lippokuta
                );
            }


            // Update the comparison results in the session
            $_SESSION['comparison_results_lippokuta'] = $comparison_results_lippokuta;


            echo "<h3>Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Comparison</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<th>$tenant_lippokuta</th>";
            }
            echo "<th>Total</th></tr>";

            // Initialize an array to store the total values for each mall
            $totalValuesLippoKuta = array_fill_keys($tenants_lippokuta, 0);

            // Loop through each mall for comparison results
            foreach ($tenants_lippokuta as $tenant_lippokuta1) {
                echo "<tr>";
                echo "<td>$tenant_lippokuta1</td>";
                $totalRowLippoKuta = 0; // Total for this row

                foreach ($tenants_lippokuta as $tenant_lippokuta2) {
                    $comparisonValueLippoKuta = null;
                    $isInverseLippoKuta = false; // Flag to check if the comparison is inverse

                    foreach ($comparison_results_lippokuta as $result_lippokuta) {
                        if (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta1 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta2)) {
                            $comparisonValueLippoKuta = $result_lippokuta[$alternatif_lippokuta];
                            break;
                        } elseif (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta2 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta1)) {
                            $comparisonValueLippoKuta = 1 / $result_lippokuta[$alternatif_lippokuta]; // Take the inverse
                            $isInverseLippoKuta = true;
                            break;
                        }
                    }

                    if ($comparisonValueLippoKuta !== null) {
                        if ($isInverseLippoKuta) {
                            echo "<td>" . number_format($comparisonValueLippoKuta, 5, '.', '') . "</td>"; // Display inverse comparison value
                        } else {
                            echo "<td>" . number_format($comparisonValueLippoKuta, 5, '.', '') . "</td>"; // Display comparison value
                        }
                        $totalRowLippoKuta += $comparisonValueLippoKuta;
                        $totalValuesLippoKuta[$tenant_lippokuta1] += $comparisonValueLippoKuta;
                    } else {
                        echo "<td>-</td>";
                    }
                }

                echo "<td>" . number_format($totalRowLippoKuta, 5, '.', '') . "</td>"; // Display the total for this row
                echo "</tr>";
            }


            echo "</table>";

            // Display the divided comparison results
            echo "<h3>Divided Comparison Results</h3>";
            echo "<table border='1'>";
            echo "<tr><th>Criteria</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<th>$tenant_lippokuta</th>";
            }
            echo "<th>Total</th>"; // Add Total column header
            echo "</tr>";

            // Display the divided comparison results
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                echo "<tr>";
                echo "<td>$tenant_lippokuta</td>";

                // Get the total for this row
                $rowTotalLippoKuta = $totalValuesLippoKuta[$tenant_lippokuta];

                // Initialize the sum of divided values for this row
                $dividedValuesSumLippoKuta = 0;

                foreach ($tenants_lippokuta as $tenant_lippokuta2) {
                    // Get the current value in the table
                    $currentValueLippoKuta = 0;

                    // Search for the corresponding value in the comparison results
                    foreach ($comparison_results_lippokuta as $result_lippokuta) {
                        if (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta2)) {
                            $currentValueLippoKuta = $result_lippokuta[$alternatif_lippokuta];
                            break;
                        } elseif (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta2 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta)) {
                            // If inverse comparison found, set the current value as its inverse
                            $currentValueLippoKuta = 1 / $result_lippokuta[$alternatif_lippokuta];
                            break;
                        }
                    }

                    // Calculate the value divided by the row total
                    $dividedValueLippoKuta = 0;
                    if ($rowTotalLippoKuta != 0) {
                        // Perform division only if row total is non-zero
                        $dividedValueLippoKuta = $currentValueLippoKuta / $rowTotalLippoKuta;
                    }

                    // Update the sum of divided values for this row
                    $dividedValuesSumLippoKuta += $dividedValueLippoKuta;

                    // Display the divided value
                    echo "<td>" . number_format($dividedValueLippoKuta, 5, '.', '') . "</td>";
                }

                // Display the sum of divided values for this row
                echo "<td>" . $dividedValuesSumLippoKuta . "</td>";
                echo "</tr>";
            }

            // Menghitung jumlah elemen mall
            $numTenantsLippoKuta1 = count($tenants_lippokuta);

            // Array untuk menyimpan total nilai per kolom
            $totalPerColumnLippoKuta = array_fill_keys($tenants_lippokuta, 0);

            // Menghitung total nilai per kolom
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                foreach ($tenants_lippokuta as $tenant_lippokuta2) {
                    // Menambahkan nilai pada kolom ke total kolom yang sesuai
                    $rowTotalLippoKuta = $totalValuesLippoKuta[$tenant_lippokuta];
                    foreach ($comparison_results_lippokuta as $result_lippokuta) {
                        if (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta2)) {
                            $currentValueLippoKuta = $result_lippokuta[$alternatif_lippokuta] / $rowTotalLippoKuta; // Dibagi dengan total baris
                            $totalPerColumnLippoKuta[$tenant_lippokuta2] += $currentValueLippoKuta;
                            break;
                        } elseif (($result_lippokuta['kriteria_lippokuta'] == $tenant_lippokuta2 && $result_lippokuta['kriteria_lippokuta2'] == $tenant_lippokuta)) {
                            $currentValueLippoKuta = 1 / $result_lippokuta[$alternatif_lippokuta] / $rowTotalLippoKuta; // Dibagi dengan total baris
                            $totalPerColumnLippoKuta[$tenant_lippokuta2] += $currentValueLippoKuta;
                            break;
                        }
                    }
                }
            }

            // Membagi total nilai per kolom dengan jumlah elemen mall
            foreach ($totalPerColumnLippoKuta as $tenant_lippokuta => $totalLippoKuta) {
                $totalPerColumnLippoKuta[$tenant_lippokuta] /= $numTenantsLippoKuta1;
            }

            // Menghitung total dari hasil
            $totalResultLippoKuta = 0;
            foreach ($totalPerColumnLippoKuta as $totalLippoKuta) {
                $totalResultLippoKuta += $totalLippoKuta;
            }

            // Menampilkan total nilai per kolom
            echo "<tr><th>Eigen Vector</th>";
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                // Display the eigenvector value
                echo "<td>" . number_format($totalPerColumnLippoKuta[$tenant_lippokuta], 5, '.', '') . "</td>";;
            }
            echo "<td>$totalResultLippoKuta</td>"; // Menampilkan total dari hasil
            echo "</tr>";

            echo "</table>";

            // Hitung Lambda Max
            $lambdaMaxLippoKuta = 0;

            // Pengulangan untuk setiap alternatif
            foreach ($tenants_lippokuta as $tenant_lippokuta) {
                // Inisialisasi nilai hasil total untuk alternatif ini
                $totalValueForTenantLippoKuta = $totalValuesLippoKuta[$tenant_lippokuta];

                // Ambil nilai eigenvector untuk alternatif ini
                $eigenvectorForTenantLippoKuta = $totalPerColumnLippoKuta[$tenant_lippokuta];

                // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
                $lambdaMaxLippoKuta += $totalValueForTenantLippoKuta * $eigenvectorForTenantLippoKuta;
            }

            echo "<p>Nilai Lambda Max: " . number_format($lambdaMaxLippoKuta, 5, '.', '') . "</p>";

            // Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
            $randomConsistencyIndexLippoKuta = 0;
            switch ($numTenantsLippoKuta1) {
                case 1:
                    $randomConsistencyIndexLippoKuta = 0;
                    break;
                case 2:
                    $randomConsistencyIndexLippoKuta = 0;
                    break;
                case 3:
                    $randomConsistencyIndexLippoKuta = 0.58;
                    break;
                case 4:
                    $randomConsistencyIndexLippoKuta = 0.90;
                    break;
                case 5:
                    $randomConsistencyIndexLippoKuta = 1.12;
                    break;
                case 6:
                    $randomConsistencyIndexLippoKuta = 1.24;
                    break;
                case 7:
                    $randomConsistencyIndexLippoKuta = 1.32;
                    break;
                case 8:
                    $randomConsistencyIndexLippoKuta = 1.41;
                    break;
                case 9:
                    $randomConsistencyIndexLippoKuta = 1.45;
                    break;
                case 10:
                    $randomConsistencyIndexLippoKuta = 1.49;
                    break;
                default:
                    // Handle for more than 10 elements if needed
                    break;
            }

            // Hitung Consistency Index (CI)
            $consistencyIndexLippoKuta = ($lambdaMaxLippoKuta - $numTenantsLippoKuta1) / ($numTenantsLippoKuta1 - 1);

            // Hitung nilai konsistensi ratio (CR)
            $consistencyRatioLippoKuta = $consistencyIndexLippoKuta / $randomConsistencyIndexLippoKuta;

            // Tampilkan hasil konsistensi
            echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndexLippoKuta, 5, '.', '') . "</p>";
            echo "<p>Nilai Random Consistency Index (RI) untuk $numTenantsLippoKuta1 elemen: " . $randomConsistencyIndexLippoKuta . "</p>";
            echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatioLippoKuta, 5, '.', '') . "</p>";

            // Tambahkan kondisi untuk menentukan konsistensi
            if ($consistencyRatioLippoKuta < 0.1) {
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
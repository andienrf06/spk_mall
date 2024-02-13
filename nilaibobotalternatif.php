<?php
session_start();

// Initialize the $input_values array
if (!isset($_SESSION['comparison_results'])) {
    $_SESSION['comparison_results'] = [];
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
                <img src="/img/logo.png" alt="Logo">
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
        Rekomendasi
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
        <a class="dropdown-item" href="nilaibobotalternatif.php">Nilai Bobot Alternatif</a>
        <a class="dropdown-item" href="nilaibobotkriteria.php">Nilai Bobot Kriteria</a>
        <a class="dropdown-item" href="hasil_rekomendasi.php">Hasil Rekomendasi</a>
    </div>
</div>

                <div class="item-button">
                    <a href="/logout" type="button">Keluar</a>
                </div>
            </div>

            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                    <select name="criteria" class="form-select">
                        <option value="K01">K01 - Location</option>
                        <option value="K02">K02 - Price</option>
                        <option value="K03">K03 - Competitors</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
            <div class="col">
                <select name="alternative1" class="form-select">
        <?php
        $malls = [
            "Bali Collection",
            "Samasta Lifestyle Village",
            "Sidewalk Jimbaran",
        ];

        foreach ($malls as $mall) {
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
        foreach ($malls as $mall) {
            echo "<option value=\"$mall\">$mall</option>";
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
    // Memeriksa apakah kriteria telah diatur
    if (isset($_POST['criteria'])) {
        // Get input values
        $criteria = $_POST['criteria'];
        $alternative1 = $_POST['alternative1'];
        $comparison_value = $_POST['comparison'];
        $alternative2 = $_POST['alternative2'];

        // Retrieve comparison results from session
        $comparison_results = $_SESSION['comparison_results'];

        // Check if the comparison result for this combination of alternative1 and alternative2 already exists
        $exists = false;
        foreach ($comparison_results as $key => $result) {
            if ($result['alternative1'] == $alternative1 && $result['alternative2'] == $alternative2) {
                $exists = true;
                // Update the comparison value
                $comparison_results[$key][$criteria] = $comparison_value;
                break;
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
        // Tindakan jika kriteria tidak terdefinisi
        echo "Kriteria tidak terdefinisi.";
    }

    echo "<h3>Comparison Results</h3>";
echo "<table border='1'>";
echo "<tr><th>Comparison</th>";
foreach ($malls as $mall) {
    echo "<th>$mall</th>";
}
echo "<th>Total</th></tr>";

// Initialize an array to store the total values for each mall
$totalValues = array_fill_keys($malls, 0);

// Loop through each mall for comparison results
foreach ($malls as $mall1) {
    echo "<tr>";
    echo "<td>$mall1</td>";
    $totalRow = 0; // Total for this row

    foreach ($malls as $mall2) {
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
            $totalRow += $comparisonValue;
            $totalValues[$mall1] += $comparisonValue;
        } else {
            echo "<td>-</td>";
        }
    }

    echo "<td>" . number_format($totalRow, 5, '.', '') . "</td>"; // Display the total for this row
    echo "</tr>";
}


    echo "</table>";

    // Display the divided comparison results
    echo "<h3>Divided Comparison Results</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Mall</th>";
    foreach ($malls as $mall) {
        echo "<th>$mall</th>";
    }
    echo "<th>Total</th>"; // Add Total column header
    echo "</tr>";

    // Display the divided comparison results
    foreach ($malls as $mall) {
        echo "<tr>";
        echo "<td>$mall</td>";

        // Get the total for this row
        $rowTotal = $totalValues[$mall];

        // Initialize the sum of divided values for this row
        $dividedValuesSum = 0;

        foreach ($malls as $mall2) {
            // Get the current value in the table
            $currentValue = 0;

            // Search for the corresponding value in the comparison results
            foreach ($comparison_results as $result) {
                if (($result['alternative1'] == $mall && $result['alternative2'] == $mall2)) {
                    $currentValue = $result[$criteria];
                    break;
                } elseif (($result['alternative1'] == $mall2 && $result['alternative2'] == $mall)) {
                    // If inverse comparison found, set the current value as its inverse
                    $currentValue = 1 / $result[$criteria];
                    break;
                }
            }

            // Calculate the value divided by the row total
            $dividedValue = 0;
            if ($rowTotal != 0) {
                // Perform division only if row total is non-zero
                $dividedValue = $currentValue / $rowTotal;
            }

            // Update the sum of divided values for this row
            $dividedValuesSum += $dividedValue;

            // Display the divided value
            echo "<td>" . number_format($dividedValue, 5, '.', '') . "</td>";
        }

        // Display the sum of divided values for this row
        echo "<td>" . $dividedValuesSum . "</td>";
        echo "</tr>";
    }

    // Menghitung jumlah elemen mall
    $numMalls = count($malls);

    // Array untuk menyimpan total nilai per kolom
    $totalPerColumn = array_fill_keys($malls, 0);

    // Menghitung total nilai per kolom
    foreach ($malls as $mall) {
        foreach ($malls as $mall2) {
            // Menambahkan nilai pada kolom ke total kolom yang sesuai
            $rowTotal = $totalValues[$mall];
            foreach ($comparison_results as $result) {
                if (($result['alternative1'] == $mall && $result['alternative2'] == $mall2)) {
                    $currentValue = $result[$criteria] / $rowTotal; // Dibagi dengan total baris
                    $totalPerColumn[$mall2] += $currentValue;
                    break;
                } elseif (($result['alternative1'] == $mall2 && $result['alternative2'] == $mall)) {
                    $currentValue = 1 / $result[$criteria] / $rowTotal; // Dibagi dengan total baris
                    $totalPerColumn[$mall2] += $currentValue;
                    break;
                }
            }
        }
    }

    // Membagi total nilai per kolom dengan jumlah elemen mall
    foreach ($totalPerColumn as $mall => $total) {
        $totalPerColumn[$mall] /= $numMalls;
    }

    // Menghitung total dari hasil
    $totalResult = 0;
    foreach ($totalPerColumn as $total) {
        $totalResult += $total;
    }

    // Menampilkan total nilai per kolom
    echo "<tr><th>Eigen Vector</th>";
    foreach ($malls as $mall) {
        // Display the eigenvector value
echo "<td>" . number_format($totalPerColumn[$mall], 5, '.', '') . "</td>";
;
    }
    echo "<td>$totalResult</td>"; // Menampilkan total dari hasil
    echo "</tr>";

    echo "</table>";

    // Hitung Lambda Max
$lambdaMax = 0;

// Pengulangan untuk setiap alternatif
foreach ($malls as $mall) {
    // Inisialisasi nilai hasil total untuk alternatif ini
    $totalValueForMall = $totalValues[$mall];
    
    // Ambil nilai eigenvector untuk alternatif ini
    $eigenvectorForMall = $totalPerColumn[$mall];
    
    // Perkalian nilai total dengan nilai eigenvector dan tambahkan ke Lambda Max
    $lambdaMax += $totalValueForMall * $eigenvectorForMall;
}

echo "<p>Nilai Lambda Max: " . number_format($lambdaMax, 5, '.', '') . "</p>";

// Hitung nilai konsistensi acak berdasarkan jumlah elemen mall
$randomConsistencyIndex = 0;
switch ($numMalls) {
    case 1:
        $randomConsistencyIndex = 0;
        break;
    case 2:
        $randomConsistencyIndex = 0;
        break;
    case 3:
        $randomConsistencyIndex = 0.58;
        break;
    case 4:
        $randomConsistencyIndex = 0.90;
        break;
    case 5:
        $randomConsistencyIndex = 1.12;
        break;
    case 6:
        $randomConsistencyIndex = 1.24;
        break;
    case 7:
        $randomConsistencyIndex = 1.32;
        break;
    case 8:
        $randomConsistencyIndex = 1.41;
        break;
    case 9:
        $randomConsistencyIndex = 1.45;
        break;
    case 10:
        $randomConsistencyIndex = 1.49;
        break;
    default:
        // Handle for more than 10 elements if needed
        break;
}

// Hitung Consistency Index (CI)
$consistencyIndex = ($lambdaMax - $numMalls) / ($numMalls - 1);

// Hitung nilai konsistensi ratio (CR)
$consistencyRatio = $consistencyIndex / $randomConsistencyIndex;

// Tampilkan hasil konsistensi
echo "<p>Nilai Consistency Index (CI): " . number_format($consistencyIndex, 5, '.', '') . "</p>";
echo "<p>Nilai Random Consistency Index (RI) untuk $numMalls elemen: " . $randomConsistencyIndex . "</p>";
echo "<p>Nilai Consistency Ratio (CR): " . number_format($consistencyRatio, 5, '.', '') . "</p>";

// Tambahkan kondisi untuk menentukan konsistensi
if ($consistencyRatio < 0.1) {
    echo "<p>Nilai Konsisten</p>";
} else {
    echo "<p>Nistem Tidak Konsisten.</p>";
}

}
?>

</div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
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
                <h1 class="mb-4 mt-4">Hasil Rekomendasi</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 mt-4">Unweighted Supermatrix</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>A4</th>
                                <th>A5</th>
                                <th>A6</th>
                                <th>A7</th>
                                <th>A8</th>
                                <th>A8</th>
                                <th>A9</th>
                                <th>A10</th>
                                <th>A11</th>
                                <th>A12</th>
                                <th>A13</th>
                                <th>A14</th>
                                <th>A15</th>
                                <th>A16</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Location']) ? number_format($_SESSION['eigenvector_balicollection']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Price']) ? number_format($_SESSION['eigenvector_balicollection']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Competitor']) ? number_format($_SESSION['eigenvector_balicollection']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A2</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Location']) ? number_format($_SESSION['eigenvector_samasta']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Price']) ? number_format($_SESSION['eigenvector_samasta']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Competitor']) ? number_format($_SESSION['eigenvector_samasta']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Location']) ? number_format($_SESSION['eigenvector_sidewalk']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Price']) ? number_format($_SESSION['eigenvector_sidewalk']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Competitor']) ? number_format($_SESSION['eigenvector_sidewalk']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A4</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Location']) ? number_format($_SESSION['eigenvector_park23']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Price']) ? number_format($_SESSION['eigenvector_park23']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Competitor']) ? number_format($_SESSION['eigenvector_park23']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A5</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Location']) ? number_format($_SESSION['eigenvector_mbg']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Price']) ? number_format($_SESSION['eigenvector_mbg']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Competitor']) ? number_format($_SESSION['eigenvector_mbg']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A6</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Location']) ? number_format($_SESSION['eigenvector_lippokuta']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Price']) ? number_format($_SESSION['eigenvector_lippokuta']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Competitor']) ? number_format($_SESSION['eigenvector_lippokuta']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A7</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Location']) ? number_format($_SESSION['eigenvector_lipposunset']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Price']) ? number_format($_SESSION['eigenvector_lipposunset']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Competitor']) ? number_format($_SESSION['eigenvector_lipposunset']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A8</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Location']) ? number_format($_SESSION['eigenvector_tsm']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Price']) ? number_format($_SESSION['eigenvector_tsm']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Competitor']) ? number_format($_SESSION['eigenvector_tsm']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A9</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Location']) ? number_format($_SESSION['eigenvector_level']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Price']) ? number_format($_SESSION['eigenvector_level']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Competitor']) ? number_format($_SESSION['eigenvector_level']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A10</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Location']) ? number_format($_SESSION['eigenvector_lipporenon']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Price']) ? number_format($_SESSION['eigenvector_lipporenon']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Competitor']) ? number_format($_SESSION['eigenvector_lipporenon']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A11</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Location']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Price']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Competitor']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A12</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Location']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Price']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Competitor']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A13</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Location']) ? number_format($_SESSION['eigenvector_beachwalk']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Price']) ? number_format($_SESSION['eigenvector_beachwalk']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Competitor']) ? number_format($_SESSION['eigenvector_beachwalk']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A14</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Location']) ? number_format($_SESSION['eigenvector_discovery']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Price']) ? number_format($_SESSION['eigenvector_discovery']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Competitor']) ? number_format($_SESSION['eigenvector_discovery']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A15</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Location']) ? number_format($_SESSION['eigenvector_living']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Price']) ? number_format($_SESSION['eigenvector_living']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Competitor']) ? number_format($_SESSION['eigenvector_living']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A16</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Location']) ? number_format($_SESSION['eigenvector_ramayana']['Location'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Price']) ? number_format($_SESSION['eigenvector_ramayana']['Price'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Competitor']) ? number_format($_SESSION['eigenvector_ramayana']['Competitor'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>K1</td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Bali Collection'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Samasta Lifestyle Village'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Sidewalk Jimbaran'], 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                            <tr>
                                <td>K2</td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Bali Collection'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Samasta Lifestyle Village'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Sidewalk Jimbaran'], 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                            <tr>
                                <td>K3</td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Bali Collection'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Samasta Lifestyle Village'], 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Sidewalk Jimbaran'], 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 mt-4">Weighted Supermatrix</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>A4</th>
                                <th>A5</th>
                                <th>A6</th>
                                <th>A7</th>
                                <th>A8</th>
                                <th>A8</th>
                                <th>A9</th>
                                <th>A10</th>
                                <th>A11</th>
                                <th>A12</th>
                                <th>A13</th>
                                <th>A14</th>
                                <th>A15</th>
                                <th>A16</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Location']) ? number_format($_SESSION['eigenvector_balicollection']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Price']) ? number_format($_SESSION['eigenvector_balicollection']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_balicollection']['Competitor']) ? number_format($_SESSION['eigenvector_balicollection']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A2</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Location']) ? number_format($_SESSION['eigenvector_samasta']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Price']) ? number_format($_SESSION['eigenvector_samasta']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_samasta']['Competitor']) ? number_format($_SESSION['eigenvector_samasta']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Location']) ? number_format($_SESSION['eigenvector_sidewalk']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Price']) ? number_format($_SESSION['eigenvector_sidewalk']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_sidewalk']['Competitor']) ? number_format($_SESSION['eigenvector_sidewalk']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A4</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Location']) ? number_format($_SESSION['eigenvector_park23']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Price']) ? number_format($_SESSION['eigenvector_park23']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_park23']['Competitor']) ? number_format($_SESSION['eigenvector_park23']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A5</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Location']) ? number_format($_SESSION['eigenvector_mbg']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Price']) ? number_format($_SESSION['eigenvector_mbg']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_mbg']['Competitor']) ? number_format($_SESSION['eigenvector_mbg']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A6</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Location']) ? number_format($_SESSION['eigenvector_lippokuta']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Price']) ? number_format($_SESSION['eigenvector_lippokuta']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lippokuta']['Competitor']) ? number_format($_SESSION['eigenvector_lippokuta']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A7</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Location']) ? number_format($_SESSION['eigenvector_lipposunset']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Price']) ? number_format($_SESSION['eigenvector_lipposunset']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipposunset']['Competitor']) ? number_format($_SESSION['eigenvector_lipposunset']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A8</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Location']) ? number_format($_SESSION['eigenvector_tsm']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Price']) ? number_format($_SESSION['eigenvector_tsm']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_tsm']['Competitor']) ? number_format($_SESSION['eigenvector_tsm']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A9</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Location']) ? number_format($_SESSION['eigenvector_level']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Price']) ? number_format($_SESSION['eigenvector_level']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_level']['Competitor']) ? number_format($_SESSION['eigenvector_level']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A10</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Location']) ? number_format($_SESSION['eigenvector_lipporenon']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Price']) ? number_format($_SESSION['eigenvector_lipporenon']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_lipporenon']['Competitor']) ? number_format($_SESSION['eigenvector_lipporenon']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A11</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Location']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Price']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyakvillage']['Competitor']) ? number_format($_SESSION['eigenvector_seminyakvillage']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A12</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Location']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Price']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_seminyaksquare']['Competitor']) ? number_format($_SESSION['eigenvector_seminyaksquare']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A13</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Location']) ? number_format($_SESSION['eigenvector_beachwalk']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Price']) ? number_format($_SESSION['eigenvector_beachwalk']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_beachwalk']['Competitor']) ? number_format($_SESSION['eigenvector_beachwalk']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A14</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Location']) ? number_format($_SESSION['eigenvector_discovery']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Price']) ? number_format($_SESSION['eigenvector_discovery']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_discovery']['Competitor']) ? number_format($_SESSION['eigenvector_discovery']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A15</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Location']) ? number_format($_SESSION['eigenvector_living']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Price']) ? number_format($_SESSION['eigenvector_living']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_living']['Competitor']) ? number_format($_SESSION['eigenvector_living']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>A16</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Location']) ? number_format($_SESSION['eigenvector_ramayana']['Location'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Price']) ? number_format($_SESSION['eigenvector_ramayana']['Price'] / 2, 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['eigenvector_ramayana']['Competitor']) ? number_format($_SESSION['eigenvector_ramayana']['Competitor'] / 2, 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <td>K1</td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_lokasi']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                            <tr>
                                <td>K2</td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_harga']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                            <tr>
                                <td>K3</td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Bali Collection'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Samasta Lifestyle Village'] / 2, 5, '.', ''); ?></td>
                                <td><?php echo number_format($_SESSION['eigenvector_pesaing']['Sidewalk Jimbaran'] / 2, 5, '.', ''); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                                <th>0</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        // Inisialisasi matriks dengan nilai yang sudah diberikan
        $weighted_supermatrix = [
            [1, 0, 0, $_SESSION['eigenvector_balicollection']['Location'] / 2, $_SESSION['eigenvector_balicollection']['Price'] / 2, $_SESSION['eigenvector_balicollection']['Competitor'] / 2],
            [0, 1, 0, $_SESSION['eigenvector_samasta']['Location'] / 2, $_SESSION['eigenvector_samasta']['Price'] / 2, $_SESSION['eigenvector_samasta']['Competitor'] / 2],
            [0, 0, 1, $_SESSION['eigenvector_sidewalk']['Location'] / 2, $_SESSION['eigenvector_sidewalk']['Price'] / 2, $_SESSION['eigenvector_sidewalk']['Competitor'] / 2],
            [$_SESSION['eigenvector_lokasi']['Bali Collection'] / 2, $_SESSION['eigenvector_lokasi']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_lokasi']['Sidewalk Jimbaran'] / 2, 1, 0, 0],
            [$_SESSION['eigenvector_harga']['Bali Collection'] / 2, $_SESSION['eigenvector_harga']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_harga']['Sidewalk Jimbaran'] / 2, 0, 1, 0],
            [$_SESSION['eigenvector_pesaing']['Bali Collection'] / 2, $_SESSION['eigenvector_pesaing']['Samasta Lifestyle Village'] / 2, $_SESSION['eigenvector_pesaing']['Sidewalk Jimbaran'] / 2, 0, 0, 1]
        ];

        $epsilon = 0.00001; // Nilai toleransi untuk perbedaan angka

        // Iterasi untuk mencapai limit supermatrix
        $limit_reached = false;
        while (!$limit_reached) {
            $new_matrix = $weighted_supermatrix; // Salin matriks yang ada
            $limit_reached = true; // Asumsikan batas sudah tercapai

            // Simpan nilai kolom terlebih dahulu
            $column_sums = array_map('array_sum', $weighted_supermatrix);
            $num_rows = count($weighted_supermatrix);
            $num_cols = count($weighted_supermatrix[0]);

            // Iterasi setiap kolom dalam matriks
            for ($col_key = 0; $col_key < $num_cols; $col_key++) {
                $sum = 0; // Reset jumlah untuk setiap kolom
                // Hitung total untuk kolom saat ini
                for ($row_key = 0; $row_key < $num_rows; $row_key++) {
                    $sum += $weighted_supermatrix[$row_key][$col_key];
                }

                // Hitung nilai yang diharapkan untuk kolom saat ini
                $expected_value = $sum / $num_rows;

                // Periksa apakah perbedaan antara nilai aktual dan nilai yang diharapkan lebih besar dari epsilon
                if (abs($column_sums[$col_key] - $num_rows * $expected_value) > $epsilon) {
                    $limit_reached = false; // Jika ada perbedaan yang signifikan, batas belum tercapai
                }

                // Atur nilai semua elemen dalam kolom menjadi nilai yang diharapkan
                for ($row_key = 0; $row_key < $num_rows; $row_key++) {
                    $new_matrix[$row_key][$col_key] = $expected_value;
                }
            }

            // Perbarui matriks dengan matriks baru untuk iterasi berikutnya
            $weighted_supermatrix = $new_matrix;
        }
        ?>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4 mt-4">Hasil Limit Supermatrix</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A1</th>
                                <th>A2</th>
                                <th>A3</th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A1</td>
                                <?php
                                foreach ($weighted_supermatrix[0] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>A2</td>
                                <?php
                                foreach ($weighted_supermatrix[1] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>A3</td>
                                <?php
                                foreach ($weighted_supermatrix[2] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K1</td>
                                <?php
                                foreach ($weighted_supermatrix[3] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K2</td>
                                <?php
                                foreach ($weighted_supermatrix[4] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                            <tr>
                                <td>K3</td>
                                <?php
                                foreach ($weighted_supermatrix[5] as $col) {
                                    echo "<td>" . number_format($col, 5, '.', '') . "</td>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
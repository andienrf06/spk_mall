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

            <div class="navb-items d-none d-xl-flex gap-3">

                <div class="navb-items d-none d-xl-flex">
                    <a href="index.php">Beranda</a>
                </div>

                <div class="navb-items d-none d-xl-flex">
                    <a href="search.php">Pencarian</a>
                </div>

                <!-- <div class="navb-items d-none d-xl-flex">
        <a href="pilihmall.php">Pilih Mall</a>
    </div> -->

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

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="/img/logo-variant.png" alt="Logo">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>

                        <div class="modal-body">

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="index.php">Beranda</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="search.php">Pencarian</a>
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

                        <div class="mobile-modal-footer">

                            <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                            <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
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
                    <h2 class="mb-4 mt-4">Unweighted Supermatrix dan Weighted Supermatrix</h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>A01</th>
                                <th>A02</th>
                                <th>A03</th>
                                <th>A04</th>
                                <th>A05</th>
                                <th>A06</th>
                                <th>A07</th>
                                <th>A08</th>
                                <th>A09</th>
                                <th>A10</th>
                                <th>A11</th>
                                <th>A12</th>
                                <th>A13</th>
                                <th>A14</th>
                                <th>A15</th>
                                <th>A16</th>
                                <th>K01</th>
                                <th>K02</th>
                                <th>K03</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>A01</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_bc']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Harga']) ? number_format($_SESSION['normalized_row_totals_bc']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_bc']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A02</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_samasta']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Harga']) ? number_format($_SESSION['normalized_row_totals_samasta']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_samasta']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A03</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Harga']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A04</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_park23']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Harga']) ? number_format($_SESSION['normalized_row_totals_park23']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_park23']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A05</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_mbg']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Harga']) ? number_format($_SESSION['normalized_row_totals_mbg']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_mbg']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A06</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Harga']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A07</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Harga']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A08</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_tsm']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Harga']) ? number_format($_SESSION['normalized_row_totals_tsm']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_tsm']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A09</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_level']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_level']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_level']['Harga']) ? number_format($_SESSION['normalized_row_totals_level']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_level']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_level']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A10</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_plaza']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Harga']) ? number_format($_SESSION['normalized_row_totals_plaza']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_plaza']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A11</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_village']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_village']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_village']['Harga']) ? number_format($_SESSION['normalized_row_totals_village']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_village']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_village']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A12</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_square']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_square']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_square']['Harga']) ? number_format($_SESSION['normalized_row_totals_square']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_square']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_square']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A13</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_bw']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Harga']) ? number_format($_SESSION['normalized_row_totals_bw']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_bw']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A14</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_discovery']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Harga']) ? number_format($_SESSION['normalized_row_totals_discovery']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_discovery']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A15</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_living']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_living']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_living']['Harga']) ? number_format($_SESSION['normalized_row_totals_living']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_living']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_living']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>A16</th>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Lokasi']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Lokasi'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Harga']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Harga'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Pesaing']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Pesaing'], 5, '.', '') : '0'; ?></td>
                            </tr>
                            <tr>
                                <th>K01</th>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Bali Collection'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Park 23']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Park 23'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>K02</th>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_harga']['Bali Collection'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Park 23']) ? number_format($_SESSION['normalized_row_totals_harga']['Park 23'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_harga']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_harga']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_harga']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_harga']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th>K03</th>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Bali Collection'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Park 23']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Park 23'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
                                <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
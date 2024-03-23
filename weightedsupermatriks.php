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
                <h2 class="mb-4 mt-4">Hasil Unweighted Supermatrix dan Weighted Supermatrix</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Bali Collection'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_harga']['Bali Collection'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Bali Collection']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Bali Collection'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_harga']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Samasta Lifestyle Village'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_harga']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Sidewalk Jimbaran'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Park 23']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Park 23'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Park 23']) ? number_format($_SESSION['normalized_row_totals_harga']['Park 23'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Park 23']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Park 23'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Mall Kuta'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Discovery Shopping Mall'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_harga']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Beachwalk Shopping Centre'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_harga']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Mall Bali Galeria'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Sunset'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_harga']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Village']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Seminyak Village'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_harga']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Seminyak Square']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Seminyak Square'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_harga']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Trans Studio Mall Bali'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Level21 Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Level21 Mall'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_harga']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Renon']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Lippo Plaza Renon'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_harga']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Living World Denpasar']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Living World Denpasar'], 5, '.', '') : '0'; ?></td>
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
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_lokasi']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_harga']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall']) ? number_format($_SESSION['normalized_row_totals_pesaing']['Ramayana Bali Mall'], 5, '.', '') : '0'; ?></td>
                        </tr>
                        <tr>
                            <th>K01</th>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_bc']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_samasta']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_park23']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_discovery']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_bw']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_mbg']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_village']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_village']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_square']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_square']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_tsm']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_level']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_level']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_plaza']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_living']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_living']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Ukuran Gerai']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Ukuran Gerai'], 5, '.', '') : '0'; ?></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>K02</th>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_bc']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_samasta']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_park23']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_discovery']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_bw']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_mbg']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_village']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_village']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_square']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_square']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_tsm']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_level']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_level']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_plaza']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_living']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_living']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Harga Gerai']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Harga Gerai'], 5, '.', '') : '0'; ?></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th>K03</th>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bc']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_bc']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_samasta']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_samasta']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_sidewalk']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_sidewalk']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_park23']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_park23']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lippokuta']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_lippokuta']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_discovery']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_discovery']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_bw']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_bw']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_mbg']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_mbg']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_lipposunset']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_lipposunset']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_village']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_village']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_square']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_square']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_tsm']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_tsm']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_level']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_level']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_plaza']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_plaza']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_living']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_living']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
                            <td><?php echo isset($_SESSION['normalized_row_totals_ramayana']['Jumlah Pesaing Gerai']) ? number_format($_SESSION['normalized_row_totals_ramayana']['Jumlah Pesaing Gerai'], 5, '.', '') : '0'; ?></td>
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
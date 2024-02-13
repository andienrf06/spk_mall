<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Pusat Perbelanjaan Modern</title>

    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
    ">
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
    <a class="dropdown-toggle" href="nilaibobot.php" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="/img/logo-variant.png" alt="Logo">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>

                        <div class="modal-body">
                            
                            <div class="modal-line">
                                <i class="fa-solid fa-house"></i><a href="index.php">Beranda</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="search.php">Pencarian</a>
                            </div>
                            
                            <div class="item dropdown"> 
    <a class="dropdown-toggle" href="nilaibobot.php" role="button" id="dropdownRekomendasi" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Rekomendasi
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi">
        <a class="dropdown-item" href="nilaibobotalternatif.php">Nilai Bobot Alternatif</a>
        <a class="dropdown-item" href="nilaibobotkriteria.php">Nilai Bobot Kriteria</a>
        <a class="dropdown-item" href="hasil_rekomendasi.php">Hasil Rekomendasi</a>
    </div>
</div>


                            <!-- <div class="modal-line">
                                <i class="fa-solid fa-circle-info"></i><a href="/about">About</a>
                            </div> -->

                            <a href="/logout" class="navb-button" type="button">Logout</a>
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

    <section id="hero" class="d-flex align-items-center custom-hero-section">
    <div class="row justify-content-between gy-5 mt-5">
    <section id="hero" class="d-flex align-items-center custom-hero-section">
    <div class="container">
        <div class="row justify-content-between gy-8 mt-8">
            <div class="col-lg-8 mx-auto">
                <div class="portfolio-description">
                    <h1 class="welcome-text">Welcome, </h1>
                    <h2>Sistem Pendukung Keputusan Pusat Perbelanjaan Modern</h2>
                    <p>
                        Sistem ini membantu pengusaha bisnis menentukan gerai yang akan dipilih, diantara beberapa 
                        pusat perbelanjaan modern di Provinsi Bali dengan membandingkan setiap alternatif pada setiap kriteria 
                        dan sebaliknya menggunakan metode Analytic Network Process (ANP).
                    </p>
                    <p>
                        Proses yang harus dilakukan untuk mendapatkan hasil keputusan, adalah sebagai berikut:
                    </p>
                    <p>
                            1. Memilih menu ANP
                    </p>
                    <p>
                            2. Memilih Sub Menu Seleksi Metode ANP
                    </p>
                    <p>
                            3. Memilih Perbandingan Alternatif dan menentukan bobot/skor
                    </p>
                    <p>
                            4. Memilih Perbandingan Kriteria dan menentukan bobot/skor
                    </p>
                    <p>
                            5. Memilih Hasil Seleksi
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js
    "></script>
</body>

</html>
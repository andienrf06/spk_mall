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

<body id="search">
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

        
        <div class="navb-items d-none d-xl-flex">
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

        <!-- <div class="item">
            <a href="/about">About</a>
        </div> -->

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

                   
                    <div class="navb-items d-none d-xl-flex">
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

                    <a href="/logout" class="navb-button" type="button">Keluar</a>
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
    <?php
    require_once("sparqllib.php");
    $test = "";
    if (isset($_POST['search-mall'])){
      $test = $_POST['search-mall'];
      $data = sparql_get(
        "http://localhost:3030/mall_database",
        "
      PREFIX d:<http://www.semanticweb.org/andie/ontologies/2023/10/untitled-ontology-23#>
      
      SELECT ?namaMall ?kabupatenKota ?namaGerai ?ukuranGerai ?kategoriGerai ?hargaGerai ?rangeHarga ?jumlahPesaing
      WHERE {
        ?mall    d:nama_mall            ?namaMall;
                 d:hasLocation          ?kabkota.
        ?kabkota d:kab_kota             ?kabupatenKota.   
        ?mall    d:isKriteriaBy         ?gerai.
        ?gerai   d:nama_gerai           ?namaGerai;
                 d:ukuran_gerai         ?ukuranGerai;
                 d:jenis_gerai          ?kategoriGerai;
                 d:harga_gerai          ?hargaGerai;
                 d:hasRangePrice        ?range.
        ?range   d:range_harga_gerai    ?rangeHarga.
        ?mall    d:isKriteriaBy         ?pesaing.
        ?pesaing d:jumlah_pesaing_gerai ?jumlahPesaing.
        FILTER (regex (?namaMall, '$test', 'i') || regex (?kabupatenKota, '$test', 'i'))
    }"  
    );
} else {
    $data = sparql_get(
        "http://localhost:3030/mall_database",
        "
        PREFIX d:<http://www.semanticweb.org/andie/ontologies/2023/10/untitled-ontology-23#>
      
        SELECT ?namaMall ?kabupatenKota ?namaGerai ?ukuranGerai ?kategoriGerai ?hargaGerai ?rangeHarga ?jumlahPesaing
        WHERE {
          ?mall    d:nama_mall            ?namaMall;
                   d:hasLocation          ?kabkota.
          ?kabkota d:kab_kota             ?kabupatenKota.   
          ?mall    d:isKriteriaBy         ?gerai.
          ?gerai   d:nama_gerai           ?namaGerai;
                   d:ukuran_gerai         ?ukuranGerai;
                   d:jenis_gerai          ?kategoriGerai;
                   d:harga_gerai          ?hargaGerai;
                   d:hasRangePrice        ?range.
          ?range   d:range_harga_gerai    ?rangeHarga.
          ?mall    d:isKriteriaBy         ?pesaing.
          ?pesaing d:jumlah_pesaing_gerai ?jumlahPesaing.
          FILTER (regex (?namaMall, '$test', 'i') || regex (?kabupatenKota, '$test', 'i'))
      }"  
    );
}
    if (!isset($data)){
        print"<p>Error: " . sparql_error() . ": " . sparql_error() . "</p>";
    }

    ?>

    <section id = "about">
        <div class="container">


        <div class="row tentang my-3">
    <div class="text-end mt-3">
        <form action="" method="post" id="nameform" class="d-flex">
            <div class="ms-auto search-box">
                <input type="text" name="search-mall" placeholder="Cari disini" />
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
            <i class="bi bi-search"></i>
        </form>
    </div>
</div>

<div class="row text-center mb-3 mt-3 hasil">
    <div class="col">
        <h2 class="mb-4">Daftar Gerai Pusat Perbelanjaan Modern Provinsi Bali</h2>
    </div>
</div>


<?php if ($test != "") : ?>
    <div class="row fs-5">
        <div class="col-md-5">
            <p>
                <span>
                    <?= "Hasil Pencarian : " . $test ?>
                </span>
            </p>
        </div>
    </div>
<?php endif; ?>
                
                <div class="row">
    <?php foreach ($data as $dat) : ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <?php
                // Assuming images are in a folder named "img"
                $namaGerai = $dat['namaGerai'];
                $imageUrl = getImageUrlByOutletName($namaGerai);
                
                // Check if the image file exists
                if ($imageUrl) {
                    ?>
                    <img src="<?= $imageUrl ?>" class="card-img-top" alt="<?= $namaGerai ?> Image">
                    <?php
                } else {
                    ?>
                    <p>Error: Image not found for <?= $namaGerai ?></p>
                    <?php
                }
                ?>
                
                <div class="card-body">
                    <h5 class="card-title"><?= $dat['namaMall'] ?></h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Kabupaten & Kota:</b> <?= $dat['kabupatenKota'] ?></li>
                        <li class="list-group-item"><b>Harga Gerai:</b> <?= $dat['hargaGerai'] ?></li>
                    </ul>
                    <div class="mt-auto ml-auto d-flex justify-content-end">
                        <a href="details.php?namaMall=<?= urlencode($dat['namaMall']) ?>" class="btn btn-primary">View Details</a>
                    </div>


                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
function getImageUrlByOutletName($namaGerai) {
    // Add more if statements for each outlet
    if ($namaGerai == "Gerai Bali Collection (1)") {
        return "img\balicollection1.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (2)") {
        return "img\balicollection2.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (3)") {
        return "img\balicollection3.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (4)") {
        return "img\balicollection4.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (5)") {
        return "img\balicollection5.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (6)") {
        return "img\balicollection6.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (7)") {
        return "img\balicollection7.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (8)") {
        return "img\balicollection8.jpg";
    } elseif ($namaGerai == "Gerai Bali Collection (9)") {
        return "img\balicollection9.jpg";
    } elseif ($namaGerai == "Gerai Samasta Lifestyle Village (1)") {
        return "img\samasta1.jpg";
    } elseif ($namaGerai == "Gerai Samasta Lifestyle Village (2)") {
        return "img\samasta2.jpg";
    } elseif ($namaGerai == "Gerai Samasta Lifestyle Village (3)") {
        return "img\samasta3.jpg";
    } elseif ($namaGerai == "Gerai Sidewalk Jimbaran (1)") {
        return "img\sidewalk1.jpg";
    } elseif ($namaGerai == "Gerai Sidewalk Jimbaran (2)") {
        return "img\sidewalk2.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (1)") {
        return "img\park1.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (2)") {
        return "img\park2.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (3)") {
        return "img\park3.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (4)") {
        return "img\park4.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (5)") {
        return "img\park5.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (6)") {
        return "img\park6.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (7)") {
        return "img\park7.jpg";
    } elseif ($namaGerai == "Gerai Park 23 (8)") {
        return "img\park8.jpg";
    } elseif ($namaGerai == "Gerai Mall Bali Galeria (1)") {
        return "img\mbg1.jpg";
    } elseif ($namaGerai == "Gerai Mall Bali Galeria (2)") {
        return "img\mbg2.jpg";
    } elseif ($namaGerai == "Gerai Mall Bali Galeria (3)") {
        return "img\mbg3.jpg";
    } elseif ($namaGerai == "Gerai Mall Bali Galeria (4)") {
        return "img\mbg4.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (1)") {
        return "img\lippokuta1.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (2)") {
        return "img\lippokuta2.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (3)") {
        return "img\lippokuta3.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (4)") {
        return "img\lippokuta4.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (5)") {
        return "img\park5.jpg";
    } elseif ($namaGerai == "Gerai Lippo Mall Kuta (6)") {
        return "img\park6.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (1)") {
        return "img\lipposunset1.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (2)") {
        return "img\lipposunset2.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (3)") {
        return "img\lipposunset3.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (4)") {
        return "img\lipposunset4.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (5)") {
        return "img\lipposunset5.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (6)") {
        return "img\lipposunset6.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (7)") {
        return "img\lipposunset7.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (8)") {
        return "img\lipposunset8.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (9)") {
        return "img\lipposunset9.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Sunset (10)") {
        return "img\lipposunset10.jpg";
    }  elseif ($namaGerai == "Gerai Trans Studio Mall Bali (1)") {
        return "img\geraitsm1.jpg";
    } elseif ($namaGerai == "Gerai Trans Studio Mall Bali (2)") {
        return "img\geraitsm2.jpg";
    } elseif ($namaGerai == "Gerai Trans Studio Mall Bali (3)") {
        return "img\geraitsm3.jpg";
    } elseif ($namaGerai == "Gerai Trans Studio Mall Bali (4)") {
        return "img\geraitsm4.jpg";
    } elseif ($namaGerai == "Gerai Trans Studio Mall Bali (5)") {
        return "img\geraitsm5.jpg";
    } elseif ($namaGerai == "Gerai Level 21 Mall (1)") {
        return "img\level1.jpg";
    } elseif ($namaGerai == "Gerai Level 21 Mall (2)") {
        return "img\level2.jpg";
    } elseif ($namaGerai == "Gerai Level 21 Mall (3)") {
        return "img\level3.jpg";
    } elseif ($namaGerai == "Gerai Level 21 Mall (4)") {
        return "img\level4.jpg";
    } elseif ($namaGerai == "Gerai Level 21 Mall (5)") {
        return "img\level5.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Renon (1)") {
        return "img\plazarenon1.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Renon (2)") {
        return "img\plazarenon2.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Renon (3)") {
        return "img\plazarenon3.jpg";
    } elseif ($namaGerai == "Gerai Lippo Plaza Renon (4)") {
        return "img\plazarenon4.jpg";
    } elseif ($namaGerai == "Gerai Seminyak Village (1)") {
        return "img\seminyakvillage1.jpg";
    } elseif ($namaGerai == "Gerai Seminyak Village (2)") {
        return "img\seminyakvillage2.jpg";
    } elseif ($namaGerai == "Gerai Seminyak Square (1)") {
        return "img\seminyaksquare1.jpg";
    } elseif ($namaGerai == "Gerai Beachwalk Shopping Centre (1)") {
        return "img\BW1.jpg";
    } elseif ($namaGerai == "Gerai Beachwalk Shopping Centre (2)") {
        return "img\BW2.jpg";
    } elseif ($namaGerai == "Gerai Beachwalk Shopping Centre (3)") {
        return "img\BW3.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (1)") {
        return "img\discovery1.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (2)") {
        return "img\discovery2.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (3)") {
        return "img\discovery3.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (4)") {
        return "img\discovery4.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (5)") {
        return "img\discovery5.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (6)") {
        return "img\discovery6.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (7)") {
        return "img\discovery7.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (8)") {
        return "img\discovery8.jpg";
    } elseif ($namaGerai == "Gerai Discovery Shopping Mall (9 )") {
        return "img\discovery9.jpg";
    } elseif ($namaGerai == "Gerai Living World Denpasar (1)") {
        return "img\living1.jpg";
    } elseif ($namaGerai == "Gerai Living World Denpasar (2)") {
        return "img\living2.jpg";
    } elseif ($namaGerai == "Gerai Living World Denpasar (3)") {
        return "img\living3.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (1)") {
        return "img\gerairamayana1.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (2)") {
        return "img\gerairamayana2.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (3)") {
        return "img\gerairamayana3.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (4)") {
        return "img\gerairamayana4.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (5)") {
        return "img\gerairamayana5.jpg";
    } elseif ($namaGerai == "Gerai Ramayana Bali Mall (6)") {
        return "img\gerairamayana6.jpg";
    }
    // Add more elseif statements for other outlets
    else {
        // Return a default image or handle unknown outlets
        return null;
    }
}
?>
            </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>
<?php
session_start();

// List of malls
$malls = [
    "Bali Collection",
    "Beachwalk Shopping Centre",
    "Discovery Shopping Mall",
    "Level21 Mall",
    "Lippo Mall Kuta",
    "Lippo Plaza Renon",
    "Lippo Plaza Sunset",
    "Living World Denpasar",
    "Mall Bali Galeria",
    "Park 23",
    "Ramayana Bali Mall",
    "Samasta Lifestyle Village",
    "Seminyak Square",
    "Seminyak Village",
    "Sidewalk Jimbaran",
    "Trans Studio Mall Bali",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mall_selection'])) {
    // Validate the number of malls selected
    if (count($_POST['mall_selection']) > 5) {
        echo "Anda hanya dapat memilih maksimal 5 mall.";
        exit();
    }

    $_SESSION['selected_malls'] = $_POST['mall_selection'];
    exit();
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
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Nilai Bobot Kriteria
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi2">
                        <a class="dropdown-item" href="nilaibobotbalicollection.php">Berdasarkan Bali Collection</a>
                        <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                        <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                        <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                        <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                        <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                        <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                        <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                        <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                        <a class="dropdown-item" href="nilaibobotpark23.php">Berdasarkan Park 23</a>
                        <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                        <a class="dropdown-item" href="nilaibobotsamasta.php">Berdasarkan Samasta Lifestyle Village</a>
                        <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                        <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                        <a class="dropdown-item" href="nilaibobotsidewalk.php">Berdasarkan Sidewalk Jimbaran</a>
                        <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
                    </div>
                </div>
                <div class="item dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rekomendasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi3">
                        <a class="dropdown-item" href="weightedsupermatriks.php">Hasil Nilai Bobot</a>
                        <a class="dropdown-item" href="hasilakhir.php">Hasil Rekomendasi</a>
                    </div>
                </div>
            </div>
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>
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
                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="pilihmall.php">Pilih Mall</a>
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
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nilai Bobot Kriteria
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi2">
                                    <a class="dropdown-item" href="nilaibobotbalicollection.php">Berdasarkan Bali Collection</a>
                                    <a class="dropdown-item" href="nilaibobotbeachwalk.php">Berdasarkan Beachwalk Shopping Centre</a>
                                    <a class="dropdown-item" href="nilaibobotdiscovery.php">Berdasarkan Discovery Shopping Mall</a>
                                    <a class="dropdown-item" href="nilaibobotlevel.php">Berdasarkan Level21 Mall</a>
                                    <a class="dropdown-item" href="nilaibobotlippokuta.php">Berdasarkan Lippo Mall Kuta</a>
                                    <a class="dropdown-item" href="nilaibobotplazarenon.php">Berdasarkan Lippo Plaza Renon</a>
                                    <a class="dropdown-item" href="nilaibobotlipposunset.php">Berdasarkan Lippo Plaza Sunset</a>
                                    <a class="dropdown-item" href="nilaibobotliving.php">Berdasarkan Living World Denpasar</a>
                                    <a class="dropdown-item" href="nilaibobotmbg.php">Berdasarkan Mall Bali Galeria</a>
                                    <a class="dropdown-item" href="nilaibobotpark23.php">Berdasarkan Park 23</a>
                                    <a class="dropdown-item" href="nilaibobotramayana.php">Berdasarkan Ramayana Bali Mall</a>
                                    <a class="dropdown-item" href="nilaibobotsamasta.php">Berdasarkan Samasta Lifestyle Village</a>
                                    <a class="dropdown-item" href="nilaibobotseminyaksquare.php">Berdasarkan Seminyak Square</a>
                                    <a class="dropdown-item" href="nilaibobotseminyakvillage.php">Berdasarkan Seminyak Village</a>
                                    <a class="dropdown-item" href="nilaibobotsidewalk.php">Berdasarkan Sidewalk Jimbaran</a>
                                    <a class="dropdown-item" href="nilaibobottsm.php">Berdasarkan Trans Studio Mall Bali</a>
                                </div>
                            </div>
                            <div class="item dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownRekomendasi3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Rekomendasi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownRekomendasi3">
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

    <script>
        // Take the dropdown element
        var dropdownToggle = document.querySelector('#dropdownRekomendasi');
        var dropdownMenu = document.querySelector('.dropdown-menu');
        var dropdownToggle2 = document.querySelector('#dropdownRekomendasi2');
        var dropdownMenu2 = document.querySelector('.dropdown-menu[aria-labelledby="dropdownRekomendasi2"]');
        var dropdownToggle3 = document.querySelector('#dropdownRekomendasi3');
        var dropdownMenu3 = document.querySelector('.dropdown-menu[aria-labelledby="dropdownRekomendasi3"]');

        // Add an event listener to set the dropdown appearance
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        dropdownToggle2.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu2.classList.toggle('show');
        });

        dropdownToggle3.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu3.classList.toggle('show');
        });

        // Sembunyikan dropdown saat pengguna mengklik di luar dropdown
        window.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
            if (!dropdownToggle2.contains(event.target)) {
                dropdownMenu2.classList.remove('show');
            }
            if (!dropdownToggle3.contains(event.target)) {
                dropdownMenu3.classList.remove('show');
            }
        });
    </script>

    </header>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="pilih-text">Pilih Pusat Perbelanjaan Modern</h2>
            </div>
        </div>

        <form method="post">
            <table class="table table-striped">
                <tr>
                    <th>Pilih</th>
                    <th>Nama Pusat Perbelanjaan Modern</th>
                </tr>
                <?php foreach ($malls as $mall) : ?>
                    <tr>
                        <td><input type="checkbox" name="mall_selection[]" value="<?php echo $mall; ?>"></td>
                        <td><?php echo $mall; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mb-4"></div>

        <div id="popup">
            <p>Mall berhasil dipilih!</p>
            <p>Silahkan Menuju Menu Nilai Bobot Alternatif!</p>
        </div>

        <script>
            // Call the showPopup() function when the user clicks the Submit button
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.querySelector("form");
                form.addEventListener("submit", function(event) {
                    event.preventDefault(); // Stops the default form submission event

                    // Counts the number of selected checkboxes
                    var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                    if (checkboxes.length > 5) {
                        alert("Anda hanya dapat memilih maksimal 5 mall.");
                        return false; // Menghentikan pengiriman form jika melebihi 5
                    }

                    // Sending form data using AJAX
                    var formData = new FormData(form);
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", ""); // Using the same URL
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                showPopup(); // Show a popup if the sending is successful
                            } else {
                                console.error('Terjadi kesalahan saat mengirim data');
                            }
                        }
                    };
                    xhr.send(formData);
                });
            });

            function showPopup() {
                var popup = document.getElementById("popup");
                popup.style.display = "block";
                setTimeout(function() {
                    popup.style.display = "none";
                }, 2000); // The popup will disappear after 2 seconds (2000 milliseconds)
            }
        </script>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require_once("sparqllib.php");

// Execute the SPARQL query
// Execute the SPARQL query
$data = sparql_get(
    "http://localhost:3030/mall_database",
    "
    PREFIX d:<http://www.semanticweb.org/andie/ontologies/2023/10/untitled-ontology-23#>
    
    SELECT ?namaMall ?kabupatenKota ?namaGerai ?ukuranGerai ?kategoriGerai ?hargaGerai ?rangeHarga ?jumlahPesaing
    WHERE {
        ?mall d:nama_mall ?namaMall;
              d:hasLocation ?kabkota.
        ?kabkota d:kab_kota ?kabupatenKota.
        ?mall d:isKriteriaBy ?gerai.
        ?gerai d:nama_gerai ?namaGerai;
               d:ukuran_gerai ?ukuranGerai;
               d:jenis_gerai ?kategoriGerai;
               d:harga_gerai ?hargaGerai;
               d:hasRangePrice ?range.
        ?range d:range_harga_gerai ?rangeHarga.
        ?mall d:isKriteriaBy ?pesaing.
        ?pesaing d:jumlah_pesaing_gerai ?jumlahPesaing.
    }"
);


// Check if data is retrieved successfully
// Check if data is retrieved successfully
if ($data) {
    $geraiBaliCollectionFound = false; // Inisialisasi flag untuk menandai apakah data Gerai Bali Collection (1) ditemukan
    foreach ($data as $row) {
        // Check apakah nama gerai adalah Gerai Bali Collection (1)
        if ($row['namaGerai'] == 'Gerai Bali Collection (1)') {
            // Tandai bahwa data Gerai Bali Collection (1) ditemukan
            $geraiBaliCollectionFound = true;

            // Tampilkan detail data untuk Gerai Bali Collection (1)
            echo "<p>Nama Mall: " . $row['namaMall'] . "</p>";
            echo "<p>Kabupaten/Kota: " . $row['kabupatenKota'] . "</p>";
            echo "<p>Nama Gerai: " . $row['namaGerai'] . "</p>";
            echo "<p>Ukuran Gerai: " . $row['ukuranGerai'] . "</p>";
            echo "<p>Kategori Gerai: " . $row['kategoriGerai'] . "</p>";
            echo "<p>Harga Gerai: " . $row['hargaGerai'] . "</p>";
            echo "<p>Range Harga: " . $row['rangeHarga'] . "</p>";
            echo "<p>Jumlah Pesaing: " . $row['jumlahPesaing'] . "</p>";

            // Tidak perlu lanjutkan loop karena data sudah ditemukan
            break;
        }
    }

    // Jika data Gerai Bali Collection (1) tidak ditemukan, tampilkan pesan
    if (!$geraiBaliCollectionFound) {
        echo "<p>Data untuk Gerai Bali Collection (1) tidak ditemukan.</p>";
    }
} else {
    echo "<p>Data tidak ditemukan.</p>";
}

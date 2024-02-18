<?php
session_start();

// Set session jika belum ada
if (!isset($_SESSION['selected_malls'])) {
    $_SESSION['selected_malls'] = [];
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update selected malls in session
    $_SESSION['selected_malls'] = $_POST['selected_malls'] ?? [];
}

// Ambil daftar mal yang akan ditampilkan
$mallsToShow = $_SESSION['selected_malls'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Mal</title>
</head>

<body>
    <h2>Pilih Mal untuk Ditampilkan</h2>
    <form method="post" action="nilaibobotlokasi.php">
        <select name="selected_malls[]" multiple>
            <!-- Tampilkan opsi mal -->
            <?php
            // Daftar mal yang tersedia
            $malls = [
                "Bali Collection",
                "Samasta Lifestyle Village",
                "Sidewalk Jimbaran",
                // Tambahkan mal lainnya di sini
            ];

            // Tampilkan opsi untuk setiap mal
            foreach ($malls as $mall) {
                echo "<option value=\"$mall\">$mall</option>";
            }
            ?>
        </select>
        <input type="submit" value="Tampilkan">
    </form>
</body>

</html>
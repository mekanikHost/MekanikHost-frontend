<?php
// Database connection (ganti dengan informasi database Anda)
$servername = "localhost";
$username = "root"; // username database
$password = ""; // password database
$dbname = "mekaniktoto"; // nama database

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$package_name = $_POST['package-name'];
$package_price = $_POST['package-price'];
$package_duration = $_POST['package-duration'];

// Query untuk memasukkan data ke database
$sql = "INSERT INTO hosting_packages (package_name, package_price, package_duration) 
        VALUES ('$package_name', '$package_price', '$package_duration')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    // Jika berhasil, redirect ke halaman konfirmasi
    header("Location: submit-package.html?status=success");
    exit();
} else {
    // Jika gagal, tampilkan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>

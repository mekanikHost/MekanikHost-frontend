<?php
// Memuat SDK Midtrans
require_once './vendor/autoload.php';

// Ganti dengan Server Key dan Client Key Anda
\Midtrans\Config::$serverKey = 'your-server-key';SB-Mid-server-xgrXS53HFeIPmuEjsd1aEDGU
\Midtrans\Config::$clientKey = 'your-client-key'; SB-Mid-client-ubZ1ckqckboI2a3J
\Midtrans\Config::$isProduction = false;  // Set ke false untuk mode sandbox, true untuk mode production

// Ambil data dari POST request
$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    echo json_encode(['error' => 'Data yang dikirimkan tidak valid']);
    exit();
}

$name = $data['domain-full']; // Cek jika variabel domain penuh
$email = $data['email']; // Cek email
$package = $data['paket']; // Cek paket hosting yang dipilih

// Tentukan jumlah pembayaran berdasarkan paket
$amount = 0;
if ($package == 'Shared Hosting') {
    $amount = 50000;  // Rp 50.000
} elseif ($package == 'VPS Hosting') {
    $amount = 150000; // Rp 150.000
} elseif ($package == 'Cloud Hosting') {
    $amount = 250000; // Rp 250.000
} else {
    echo json_encode(['error' => 'Paket tidak valid']);
    exit();
}

// Buat transaksi
$transaction_details = [
    'order_id' => uniqid(),
    'gross_amount' => $amount
];

// Data pembayaran
$order = [
    'payment_type' => 'credit_card',  // Jenis pembayaran
    'transaction_details' => $transaction_details,
    'credit_card' => [
        'secure' => true  // Keamanan pada kartu kredit
    ]
];

// Kirim transaksi ke Midtrans dan dapatkan token
try {
    $snapToken = \Midtrans\Snap::createTransaction($order)->token;
    echo json_encode(['token' => $snapToken]); // Kirimkan token ke frontend
} catch (Exception $e) {
    echo json_encode(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
}
?>


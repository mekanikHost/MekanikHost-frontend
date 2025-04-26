<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $subjek = htmlspecialchars($_POST['subjek']);
  $pesan = htmlspecialchars($_POST['pesan']);
  ?>
  <!DOCTYPE html>
  <html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Terkirim - MekanikHost</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #f8f9fa;
      }
      .container {
        margin-top: 60px;
        max-width: 600px;
      }
      .card {
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
      }
      .btn-primary {
        background-color: #ff6600;
        border: none;
      }
      .btn-primary:hover {
        background-color: #e65c00;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="card p-4">
        <h4 class="mb-3">Pesan Anda Telah Dikirim</h4>
        <ul class="list-group list-group-flush mb-3">
          <li class="list-group-item"><strong>Nama:</strong> <?= $nama ?></li>
          <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
          <li class="list-group-item"><strong>Subjek:</strong> <?= $subjek ?></li>
          <li class="list-group-item"><strong>Pesan:</strong><br><?= nl2br($pesan) ?></li>
        </ul>
        <a href="contact.html" class="btn btn-primary w-100">Kembali ke Kontak</a>
      </div>
    </div>
  </body>
  </html>
  <?php
} else {
  echo "Akses langsung tidak diperbolehkan.";
}
?>

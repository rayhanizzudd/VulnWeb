<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vulnerable</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: rgb(174, 215, 255);
      margin: 0;
      padding: 0;
    }
    .sidebar {
      position: relative;
      height: 100vh;
      background-color: #343a40;
      color: white;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }
    .sidebar a:hover {
      background-color: #495057;
      border-radius: 5px;
    }
    .logout-link {
      position: absolute;
      bottom: 20px;
      width: 90%;
    }
    canvas {
      margin: 20px auto;
      display: block;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
          <h3 class="text-center py-3">VulnWeb</h3>
          <h4>Vulnerable</h4>
          <ul class="nav flex-column">
            <li class="nav-item"><h5><a href="#">About</a></h5></li>
            <li class="nav-item"><h5><a href="<?php echo site_url('Vulnupload'); ?>">File Upload</a></h5></li>
            <li class="nav-item"><h5><a href="<?php echo site_url('Vulnsqli'); ?>">SQL Injection</a></h5></li>
            <li class="nav-item"><h5><a href="<?php echo site_url('Vulnxss'); ?>">XSS</a></h5></li>
          </ul>
          <h5 class="logout-link"><a href="<?php echo site_url('dashboard'); ?>">Kembali</a></h5>
        </div>
      </nav>
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Selamat datang di halaman Vulnerabilty web, <strong><?php echo ucfirst($this->session->userdata('username')); ?></strong>!</h1>
        </div>

        <p>Pada halaman vulnerable ini anda akan diberikan tampilan website yang menyerupai website sebenarnya namun web ini penuh dengan kerentanan, sehingga dengan adanya vulnweb ini anda bisa mengetahui dan mencoba unutk testing pada fitur yang tersedia pada website pada umumnya.</p>
        <p>Vulnweb bukan hanya sekadar website percakapan biasa. Platform ini dirancang untuk tujuan edukasi dan pelatihan, di mana para profesional keamanan atau pengembang dapat memahami berbagai celah yang dapat dimanfaatkan oleh penyerang. Dengan mencoba dan mengidentifikasi kerentanannya yang ada, Anda akan lebih siap untuk memperbaiki dan mencegah potensi serangan yang dapat membahayakan aplikasi web Anda.</p>
        <p><h3>Manfaat</h3> <br>Dengan memahami dan mencoba eksploitasi terhadap kerentanannya yang ada di Vulnweb, Anda akan memiliki pemahaman yang lebih dalam tentang bagaimana serangan bekerja dan bagaimana cara untuk menanggulanginya. Ini juga memungkinkan Anda untuk mempersiapkan aplikasi Anda agar lebih tahan terhadap ancaman dunia maya.</p>
        <p><h3>Pengujian Tanpa Risiko</h3><br> Fitur ini memberikan kesempatan untuk melakukan pengujian tanpa risiko merusak aplikasi nyata atau data sensitif. Anda dapat dengan aman mengeksplorasi dan mengidentifikasi kerentanannya yang ada, sekaligus mempelajari teknik dan solusi mitigasi yang tepat untuk setiap jenis celah.</p>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>

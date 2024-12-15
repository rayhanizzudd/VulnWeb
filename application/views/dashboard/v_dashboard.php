<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboardr</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: rgb(174, 215, 255);;
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
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sidebar">
        <div class="sidebar-sticky">
          <h3 class="text-center py-3">VulnWeb</h3>
          <ul class="nav flex-column">
            <li class="nav-item"><h5><a href="#">Dashboard</a></h5></li>
            <li class="nav-item"><h5><a href="<?php echo site_url('vulnerable'); ?>">Vulnerable</a></h5></li>
            <li class="nav-item"><h5><a href="<?php echo site_url('secure'); ?>">Secure</a></h5></li>
          </ul>
          <h5 class="logout-link"><a href="<?php echo site_url('login/logout'); ?>">Keluar</a></h5>
        </div>
      </nav>
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Selamat datang di halaman dashboard Vulnweb, <strong><?php echo ucfirst($this->session->userdata('username')); ?></strong>!</h1>
        </div>

        <div class="content">
          <h3>Selamat datang di Vulnweb!</h3>
          <p>Di sini, Anda dapat mempelajari dan menguji aplikasi web yang rentan terhadap serangan. Kami menyediakan dua kategori utama:</p>
          
          <ul>
            <li><strong>Web Rentan:</strong> Aplikasi web yang memiliki kerentanannya untuk diuji dan diperbaiki.</li>
            <li><strong>Web Aman:</strong> Aplikasi web yang sudah diuji dan tidak memiliki kerentanan besar.</li>
          </ul>

          <p>Pada Vulnweb ini, Anda akan diberikan beberapa kategori kerentanan pada website yang umum ditemukan, antara lain:</p>

          <div class="row">
            <div class="col-md-4">
              <h4>File Upload Vulnerability</h4>
              <img src="https://appcheck-ng.com/wp-content/uploads/File-Upload-Vuln-Pic-4.png" class="img-fluid" alt="File Upload Vulnerability">
              <p>Kerentanannya terjadi ketika aplikasi web tidak memverifikasi atau membatasi file yang diunggah. Hal ini memungkinkan penyerang untuk mengunggah file berbahaya, seperti skrip PHP yang dapat dieksekusi di server.</p>
            </div>
            <div class="col-md-4">
              <h4>SQL Injection</h4>
              <img src="https://miro.medium.com/v2/resize:fit:1400/1*6Lqnum01bmkmD-EqHXlRfw.png" class="img-fluid" alt="SQL Injection">
              <p>SQL Injection terjadi ketika aplikasi web memungkinkan input pengguna yang tidak terfilter untuk dieksekusi langsung ke dalam query SQL. Hal ini bisa memungkinkan penyerang mengakses atau mengubah data yang tidak seharusnya mereka lihat atau ubah.</p>
            </div>
            <div class="col-md-4">
              <h4>Cross Site Scripting (XSS)</h4>
              <img src="https://cdn.prod.website-files.com/5ff66329429d880392f6cba2/613afbb3f677add6ebeb2123_Cross-Site%20Scripting%20(XSS)%20example.png" class="img-fluid" alt="Cross Site Scripting (XSS)">
              <p>XSS adalah serangan di mana penyerang dapat menyisipkan skrip berbahaya ke dalam halaman web yang kemudian dijalankan oleh browser pengguna yang tidak sadar. Hal ini bisa mengakibatkan pencurian data sensitif atau pengambilalihan sesi pengguna.</p>
            </div>
          </div>

          
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

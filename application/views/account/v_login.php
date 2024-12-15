<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body {
          background-color: rgb(174, 215, 255);
          font-family: 'Arial', sans-serif;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
      }
      .login-container {
          padding: 30px;
          background-color: rgb(201, 222, 255);
          box-shadow: 0 10px 30px rgba(0, 11, 137, 0.3);
          border-radius: 10px;
          max-width: 400px;
          width: 100%;
      }
      h2 {
          color: #007bff;
          font-weight: bold;
          margin-bottom: 30px;
          text-align: center;
      }
      .form-group label {
          color: #495057;
      }
      .form-control {
          border-radius: 20px;
          border: 1px solid #ced4da;
          transition: border-color 0.3s ease;
      }
      .form-control:focus {
          border-color: #007bff;
          box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
      }
      .btn-primary {
          background-color: #007bff;
          border-color: #007bff;
          border-radius: 20px;
          padding: 10px;
          font-size: 16px;
          font-weight: bold;
          transition: background-color 0.3s ease;
      }
      .btn-primary:hover {
          background-color: #0056b3;
          border-color: #0056b3;
      }
      .alert {
          margin-bottom: 20px;
      }
      p {
          font-size: 14px;
      }
      .text-center a {
          color: #007bff;
          font-weight: bold;
      }
      .text-center a:hover {
          text-decoration: underline;
      }
  </style>
</head>
<body>
  <div class="container login-container">
    <h2>Halaman Login</h2>
    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>
    <?php echo form_open('login'); ?>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Masukkan username">
      <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Masukkan password">
      <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Login</button>
    <?php echo form_close(); ?>
    <p class="text-center mt-3">
      Belum punya akun? <a href="<?php echo site_url('register'); ?>">Klik di sini untuk Daftar</a>
    </p>
    <p class="text-center">
      Kembali ke beranda, Silakan klik <?php echo anchor(site_url().'/beranda','di sini..'); ?>
    </p>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>

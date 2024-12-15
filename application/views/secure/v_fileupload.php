<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
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
        .main-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        form label {
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        form button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .feedback {
            margin-top: 20px;
            font-weight: bold;
        }
        .feedback p {
            margin: 0;
        }
        .view-code-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;
        }
        .view-code-button:hover {
            background-color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            margin: 15% auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .modal img {
            max-width: 100%;
            height: auto;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover {
            color: black;
            text-decoration: none;
        }
        .view-code-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .view-code-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h3 class="text-center py-3">VulnWeb</h3>
                    <h4>Secure</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item"><h5><a href="<?php echo site_url('Secure'); ?>">About</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Secupload'); ?>">File Upload</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Secsqli'); ?>">SQL Injection</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Secxss'); ?>">XSS</a></h5></li>
                    </ul>
                    <h5 class="logout-link"><a href="<?php echo site_url('dashboard'); ?>">Kembali</a></h5>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Secure Edit Profile</h1>
                </div>
                <div class="main-content">
                    <form action="<?php echo site_url('Secupload/do_upload'); ?>" method="post" enctype="multipart/form-data">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>

                        <label for="comment">Deskripsi:</label>
                        <textarea id="comment" name="comment" rows="4" required></textarea>

                        <label for="userfile">Unggah Foto Profile:</label>
                        <input type="file" id="userfile" name="userfile" required>

                        <button type="submit">Unggah</button>
                    </form>
                    <div class="feedback">
                        <?php if (isset($error)) { ?>
                            <p style="color:red;">Error: <?php echo $error; ?></p>
                        <?php } ?>

                        <?php if (isset($success)) { ?>
                            <p style="color:green;">Success: </p>
                            <p><?php echo $success; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <button class="view-code-button">View Code</button>

    <div class="modal" id="codeModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <img src="https://s3-alpha-sig.figma.com/img/b56b/0f3e/0729f5fdf9830deffec79473906e477f?Expires=1734912000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Hyrb2GXZyPZVU-DUYxBfgCsvLN~Rlg4viVnk5pIbJu352eTo4TqZlgaNAt3h0FmYPVZjzucuXmewGCzNOyO0T4cdmgedhskI-Dzj0a9wO1wej7eFt8dKPyEwTLQB~9wPLgFQJMI8bUFiACZwJeV2g6ojqTUx56vdV1pfjJhLFO~Zm-ie-TambaW8L4d9r5J2RnpD1XJCmTfZmTaGmt6F2a7uqfN26qkXCKww2qUYDdTWzGlLYlMbjCsLWrtRep86VAnvoTdnnc8a5X3Kkk4DmRRegNsDhAeZXAnNnoFJZPCce-BGUWRV4RvmQucMFB1owJMSSp7xB5VBkV~7Vd1IcQ__" alt="Code Image">
        </div>
    </div>

    <script>
        const modal = document.getElementById('codeModal');
        const btn = document.querySelector('.view-code-button');
        const span = document.getElementById('closeModal');

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>

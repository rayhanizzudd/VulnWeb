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
        .feedback p.success {
            color: green;
        }
        .feedback p.error {
            color: red;
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
                    <h4>Vulnerable</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item"><h5><a href="<?php echo site_url('vulnerable'); ?>">About</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Vulnupload'); ?>">File Upload</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Vulnsqli'); ?>">SQL Injection</a></h5></li>
                        <li class="nav-item"><h5><a href="<?php echo site_url('Vulnxss'); ?>">XSS</a></h5></li>
                    </ul>
                    <h5 class="logout-link"><a href="<?php echo site_url('dashboard'); ?>">Kembali</a></h5>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Vulnerable Login Page</h1>
                </div>
                <div class="main-content">
                    <form method="post" action="<?php echo site_url('Vulnsqli/login'); ?>">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                        <button type="submit">Masuk</button>
                    </form><br>
                    <div id="message" class="feedback">
                        <?php if (!empty($message)): ?>
                            <div class="mt-3 alert alert-info text-center">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <button class="view-code-button">View Code</button>

    <div class="modal" id="codeModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <img src="https://s3-alpha-sig.figma.com/img/9e05/98da/7d8dbc87a6402eff3084a4b9ba112365?Expires=1734912000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=a6DoV0jJ5Gq0DrPax-yIgQAMW55rREOHvpjL1~ocPcKWAjQGYY9uQpvRUaO2CBwWj2SpD18JFJlCiuKiGtlc48fuyzjdN3HYM8RbaN2Z0aPChC~x~Q28aXs0W4RCS2Zkt3GF2iG7Vjh3vpH0siJ7YOYPmrv24qNPiC7N-p7OUzO72NlRCr6xt6vLOxOdcS5deKUhlRVkyXaFBDg-3GmStY8Eg9fcaEDy83A4Un72~JcBmkqndY1KFNFhJzrzE5Ih4cHQJKnYqcYgbUonxiTic-1mdTB-KRH7TS8c4N4T3Zm0tswSAcQW56O-Kv9eFoHAXwrgs23WZDy6YZQAICOAtQ__" alt="Code Image">
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

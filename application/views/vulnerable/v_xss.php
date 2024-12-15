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
            position: sticky;
            top: 0;
            background-color: #343a40;
            color: white;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px;
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
        .main-content {
            padding: 20px;
            /* background-color: white; */
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
            <nav class="col-md-2 col-lg-2 sidebar">
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
                <div class="container mt-5">
                    <h1 class="text-center">Vulnerable to XSS</h1>

                    <!-- Form Pencarian -->
                    <form action="<?= site_url('vulnxss/process') ?>" method="get" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Produk Teknologi..." value="<?= $search_query?>">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>


                    <!-- Hasil Pencarian -->
                    <?php if (!empty($product_image)): ?>
                        <div class="text-center mb-4">
                            <h5>Hasil Pencarian:  <?= $search_query ?></h5>
                        </div>
                    <?php endif; ?>

                    

                    <!-- Form Komentar -->
                    <form action="<?= site_url('vulnxss/process') ?>" method="post">
                        <h2>Tambahkan Komentar</h2>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Kirim Komentar</button><br><br><br>
                    </form>

                    <!-- Daftar Komentar -->
                    <div class="mb-4">
                        <h2>Komentar :</h2>
                        <?php if (!empty($comments)): ?>
                            <ul class="list-group">
                                <?php foreach ($comments as $comment): ?>
                                    <li class="list-group-item">
                                        <strong><?= $comment['username'] ?> :</strong> <br> <?= $comment['comment'] ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted">Belum ada komentar.</p>
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
            <img src="https://s3-alpha-sig.figma.com/img/3207/0937/b289ba81d60fad2db3405c6965034b2f?Expires=1734912000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=S0huMDlTy3d17h2EzBrTyZeCrIX~FpF0RQaAfu0qqEjOrl~OvJoLkXU7RKONnyFjgKUjAIIzvETeDayu93oYnp9P9NPIGrI8yernRACGHn7CYopEm34DVrug3CVaSYOAZzUqmRn0~B3Mh0fpR-YZPwUFiChBogbaVmheZZvnzXTcfZBZPjM~hqU~QbvE~QnntUAF5qbcyFBlZi-FhnZVC-XvGq889FDllDXSRKdYaY~AC1E5AoNHYnFZnn8EjFBLlzIBSyZnOtHQLrX2g-Kw6~4eW6YRTuk078oP79FIvxF913PyK8dHS6Ip8yN~A-YyqRlIgF-419o88yjQvH4NnA__" alt="Code Image">
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

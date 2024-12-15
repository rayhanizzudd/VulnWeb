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
            <!-- Sidebar -->
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

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="container mt-5">
                    <h1 class="text-center">Secure to XSS</h1>

                    <!-- Form Pencarian -->
                    <form action="<?= site_url('secxss/process') ?>" method="get" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Produk Teknologi..." value="<?= htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="btn btn-primary input-group-text">Search</button>
                        </div>
                    </form>

                    <!-- Hasil Pencarian -->
                    <?php if (!empty($product_image)): ?>
                        <div class="text-center mb-4">
                            <h5>Hasil Pencarian:  <?= htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8') ?></h5>
                        </div>
                    <?php endif; ?>
                    <!-- Form Komentar -->
                    <form action="<?= site_url('secxss/process') ?>" method="post">
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
                        <button type="submit" class="btn btn-success">Kirim Komentar</button><br><br>
                    </form>
                    <!-- Daftar Komentar -->
                    <div class="mb-4">
                        <h2>Komentar :</h2>
                        <?php if (!empty($comments)): ?>
                            <ul class="list-group">
                                <?php foreach ($comments as $comment): ?>
                                    <li class="list-group-item">
                                        <strong><?= htmlspecialchars($comment['username'], ENT_QUOTES, 'UTF-8') ?> :</strong> <br>  <?= htmlspecialchars($comment['comment'], ENT_QUOTES, 'UTF-8') ?>
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
            <img src="https://s3-alpha-sig.figma.com/img/fd96/aca5/5adbf31cba8d660a0dbaa5c4314505b2?Expires=1734912000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=eKRdYEw3rLT7qqiBpG~AZFBfyRxw3or15AcAW5NFkpDvMc4o6EwigpF89M4ls2KhIo1RfBoY4xbRSW8KvYbNgXgSbXysYf5Ay31rLuABFx6Flytr2XXc6pQpQhpDmlj00geZiMb~74l0lJljJene3eqwoi3KIsZPt8thwPrgeZk8pOXCUSaOchrc27LT9TiYAI-iD~mDvLtk365FqGfoKrtceHMQYtKF1ySq7lSuhykS787b2oxfOr~2hnL2hVejNJ2IK1w9ledf8Ty6QCotgn~tGqVJoU2MMZBwCUVLCuga8wlqzunhn~wab-kY26uNFnBOaGIKKiBBDtA2l1BTPg__" alt="Code Image">
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

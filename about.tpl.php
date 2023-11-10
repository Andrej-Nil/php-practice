<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">
    <title><?= $title ?? 'TITLE'?></title>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <nav class="navbar navbar-expand-lg  bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Навбар</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about.php">О нас</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="main py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?= $post ?>

                </div>
                <div class="col-md-4">
                    <h3>Recent posts</h3>
                    <ul class="list-group">
                        <?php foreach ($recent_posts as $post) : ?>
                            <li class="list-group-item"><a href="post/<?= $post['slug'] ?>" ><?= $post['title'] ?></a> </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="p3 mb-2 bg-body text-dark text-center">
            <div class="p-3 mb-2 bg-dark text-white"><p class="">&copy;  Copyright <?= date('Y') ?></p></div>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
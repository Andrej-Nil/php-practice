
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?= PATH ?>/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/main.css" rel="stylesheet">
    <link rel="icon" href="assets/img/favicon.ico">
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
                            <a class="nav-link" href="about">О нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="posts/create">Создать пост</a>
                        </li>
                    </ul>

                    <ul class="d-flex text-dark align-items-center list-unstyled m-0 gap-3">
                        <?php if(check_auth()): ?>
                            <li><?= $_SESSION['user']['name'] ?></li>
                            <li><a class="nav-link" href="logout">Logout</a></li>
                        <?php else: ?>
                            <li><a class="nav-link" href="register">Register</a></li>
                            <li><a class="nav-link" href="login">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php get_alerts();  ?>
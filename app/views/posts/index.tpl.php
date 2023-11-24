<?php require VIEWS . '/incs/header.php' ?>
    <main class="main py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php foreach ($posts as $post): ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><a href="posts?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
                                <p class="card-text"><?= $post['excerpt'] ?></p>
                                <a href="posts?id=<?= $post['id'] ?>" class="btn btn-primary">Перейти в <?= $post['title'] ?></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
<hr/>

                    <?php for($i = 1; $i <= $pages_cnt; $i++) : ?>
                        <a href='?page=<?= $i?>$i}'><?= $i ?></a>/
                   <?php endfor; ?>
                </div>
                <?php require VIEWS . '/incs/sidebar.php' ?>
            </div>
        </div>
    </main>
<?php require VIEWS . '/incs/footer.php' ?>
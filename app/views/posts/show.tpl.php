<?php require VIEWS . '/incs/header.php' ?>
    <main class="main py-3">
        <div class="container">
            <div class="row">
                <h1 class="mb-5"><?= $post['title'] ?></h1>
                <div class="col-md-12"><?= $post['content'] ?></div>

                <form action="/posts" method="POST">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </div>
        </div>
    </main>
<?php require VIEWS . '/incs/footer.php' ?>
<?php require VIEWS . '/incs/header.php' ?>
    <main class="main py-3">
        <div class="container">
            <div class="row">
                <h1 class="mb-5"><?= $title ?></h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Post title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Post title" value="<?= old('title') ?>">
                        <?php if( isset( $errors['title']) ): ?>
                        <div class="invalid-feedback d-block">
                           <?= $errors['title'] ?>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-control" id="excerpt" placeholder="Post excerpt" rows="2"><?= old('excerpt') ?></textarea>
                        <?php if( isset( $errors['excerpt']) ): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['excerpt'] ?>
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="content" placeholder="Post content" rows="5"><?= old('content') ?></textarea>
                        <?php if( isset( $errors['content']) ): ?>
                            <div class="invalid-feedback d-block">
                                <?= $errors['content'] ?>
                            </div>
                        <?php endif;?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
<?php require VIEWS . '/incs/footer.php' ?>
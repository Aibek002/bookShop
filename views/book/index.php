<?php use yii\helpers\Html; ?>
<?php use yii\helpers\Url; ?>
<div class="container-fluid">

    <form action="<?= Url::to(['book/index']) ?>" method="get">
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="title" aria-describedby="button-addon2"
                placeholder="Введите заголовок книги..." value="<?= Html::encode(Yii::$app->request->get('title')) ?>">
            <button class="btn btn-outline-secondary" id="button-addon2" type="submit">Искать</button>
        </div>
    </form>
</div>
<h1>Search Results</h1>

<?php if (!empty($books)): ?>
    <div class="container">
        <div class="row">

            <?php foreach ($books as $book): ?>
                <?php if ($book['key'] !== "No Key"): ?>
                    <!-- <a href="/book/test?key=<?= urlencode($book['key']) ?>" class="more-info"> -->
                    <!-- <?= Html::a('View Book', Url::to(['book/test', 'key' => $book['key']])) ?> -->
                    <!-- <?php echo $book['key']; ?> -->
                    <div class="col">
                        <div class="book-item">
                            <?php if ($book['cover_url'] !== "Unknown" || $book['cover_url'] !== ""): ?>
                                <img src="<?= Html::encode($book['cover_url']) ?>" class="cover-image"><br>
                            <?php else: ?>
                                <div class="book-cover-alt">
                                    <?= Html::encode($book['title']) ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <p class="title_book"> <strong><?= Html::encode($book['title']) ?></strong></p>
                        <!-- <p class="authors_book"> <?= Html::encode($book['author']) ?></p>
                    ISBN: <?= Html::encode($book['isbn']) ?><br>
                   
                    <p class="info_text_book"> <?= Html::encode($book['language']) ?></p>
                    <p class="info_text_book"> <?= Html::encode($book['publication_date']) ?></p> -->

                    </div>
                    <!-- </a> -->
                <?php else: ?>
                    <div class="col">
                        <div class="book-item">
                            <?php if ($book['cover_url'] !== "Unknown" || $book['cover_url'] !== ""): ?>
                                <img src="<?= Html::encode($book['cover_url']) ?>" class="cover-image"><br>
                            <?php else: ?>
                                <div class="book-cover-alt">
                                    <?= Html::encode($book['title']) ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <p class="title_book"> <strong><?= Html::encode($book['title']) ?></strong></p>
                        <!-- <p class="authors_book"> <?= Html::encode($book['author']) ?></p>
                    ISBN: <?= Html::encode($book['isbn']) ?><br>
                   
                    <p class="info_text_book"> <?= Html::encode($book['language']) ?></p>
                    <p class="info_text_book"> <?= Html::encode($book['publication_date']) ?></p> -->

                    </div>
                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <?php if ($title === "/"): ?>
        <p>Please search your book! </p>
    <?php else: ?>
        <p>Books <strong style="color: red;"><?php echo $title ?></strong> not found</p>
    <?php endif; ?>
<?php endif; ?>
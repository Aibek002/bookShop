<?php
use yii\helpers\Html;

?>

<h1>Search Results</h1>

<?php if (!empty($books)): ?>
    <div class="container">
        <div class="row">

            <?php foreach ($books as $book): ?>
                <div class="col">
                    <div class="book-item">
                        <?php if ($book['cover_url']): ?>
                            <img src="<?= Html::encode($book['cover_url']) ?>" alt="<?= Html::encode($book['title']) ?>" 
                                class="cover-image"><br>
                        <?php else: ?>
                            <div class="book-cover-alt">
                                <?= Html::encode($book['title']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <p class="title_book">  <strong><?= Html::encode($book['title']) ?></strong></p>
                    <!-- <p class="authors_book"> <?= Html::encode($book['author']) ?></p>
                    ISBN: <?= Html::encode($book['isbn']) ?><br>
                   
                    <p class="info_text_book"> <?= Html::encode($book['language']) ?></p>
                    <p class="info_text_book"> <?= Html::encode($book['publication_date']) ?></p> -->

                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>
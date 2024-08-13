<?php
use yii\helpers\Html;
?>

<h1>Search Results</h1>

<?php if (!empty($books)): ?>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <strong><?= Html::encode($book['title']) ?></strong><br>
                Author: <?= Html::encode($book['author']) ?><br>
                ISBN: <?= Html::encode($book['isbn']) ?><br>
                Language: <?= Html::encode($book['language']) ?><br>
                Publication Date: <?= Html::encode($book['publication_date']) ?><br>
                <?php if ($book['cover_url']): ?>
                    <img src="<?= Html::encode($book['cover_url']) ?>" alt="Cover Image" style="width: 100px; height: auto;"><br>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php print_r($books); ?>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>

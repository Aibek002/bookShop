<?php

/** @var yii\web\View $this */

$this->title = 'Book Shop';
?>
<div class="site-index">

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
                Publication Date: <?= Html::encode($book['publication_date']) ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>

</div>

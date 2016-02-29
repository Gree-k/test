<p><a href="/index.php">&larr;Назад</a></p>
<div class="blog-post">
    <h1><?= $news->title; ?></h1>
    <p><?= str_replace('<br />', '</p><p>', nl2br($news->text)); ?></p>
</div>
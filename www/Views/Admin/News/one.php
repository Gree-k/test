<a href="/index.php?cont=Admin&act=All">&larr;Назад</a>
<div class="btn-group pull-right">
    <a class="btn btn-primary" href="/index.php?cont=Admin&act=FormNews&id=<?=$news->id;?>">Редактировать</a>
    <a class="btn btn-primary" href="/index.php?cont=Admin&act=DeleteNews&id=<?=$news->id;?>">Удалить</a>
</div>
<div class="blog-post">
    <h1><?= $news->title; ?></h1>
    <p><?= str_replace('<br />', '</p><p>', nl2br($news->text)); ?></p>
</div>
<h2>Список всех новостей</h2>

<div id="newState" class="sub-header">
<a href="index.php?cont=Admin&act=FormNews" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Добавить статью</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Автор</th>
            <th>Дата публикации</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($news as $new):?>
            <tr>
                <td><?= $new->title; ?></td>
                <td><?=$new->username;?></td>
                <td><?=$new->date;?></td>
                <td><a href="index.php?cont=Admin&act=FormNews&id=<?=$new->id;?>">Редактировать</a></td>
                <td><a href="index.php?cont=Admin&act=DeleteNews&id=<?=$new->id;?>">Удалить</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<?php foreach ($news as $new):?>
    <div>
        <a href="index.php?act=One&id=<?=$new->id;?>"><h1><?= $new->title; ?></h1></a><br>
        <p><?= mb_substr($new->text,0,150)?>
            <?php if(strlen($new->text)>150):?>
                &nbsp;&hellip;&nbsp;
                <a href="index.php?act=One&id=<?=$new->id; ?>">Читать далее</a>
            <?php endif;?>
        </p>
        <p><em>Опубликованно: <?=$new->date;?></em></p>
    </div>

    <!--            <a href="index.php?act=Form&id=--><?//=$new->id;?><!--">Редактировать</a>-->
    <!--            <a href="index.php?act=Del&id=--><?//=$new->id;?><!--">Удалить</a><br>-->
<?php endforeach;?>
    <!--    <p><a href="index.php?act=Form">Добавить статью</a></p>-->

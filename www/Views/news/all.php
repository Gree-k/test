<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
    <?php foreach ($news as $new):?>

            <a href="index.php?act=One&id=<?=$new->id;?>"><h1><?= $new->title; ?></h1></a><br>
            <p><?= substr($new->text,0,150)?>
                <?php if(strlen($new->text)>150):?>
                    &nbsp;...&nbsp;
                    <a href="index.php?act=One&id=<?=$new->id; ?>">>>>&nbsp;Читать далее</a>
                <?php endif;?>
            </p>
            <p style="font-size: 12px; margin: 0; padding: 0;"><?=$new->date;?></p>
            <a href="index.php?act=Form&id=<?=$new->id;?>">Редактировать</a>
            <a href="index.php?act=Del&id=<?=$new->id;?>">Удалить</a><br>
    <?php endforeach;?>
    <p><a href="index.php?act=Form">Добавить статью</a></p>
</div>
</body>
</html>

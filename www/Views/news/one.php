<p><a href="/index.php">&larr;Назад</a></p>
<div class="blog-post">
    <h1><?= $news->title; ?></h1>
    <p><?= str_replace('<br />', '</p><p>', nl2br($news->text)); ?></p>
</div>
<div class="sub-header">
    <h4 id="commentAnchor">Комментарии <?=$news->countComm;?></h4>
</div>
<?php if(isset($_SESSION['username'])):?>
    <div id="formComment">
        <form action="/index.php?cont=News&act=AddCommentToNews" method="post">
            <input type="hidden" name="articles_id" value="<?=$news->id;?>">
            <label  style="width: 100%">
                <textarea class="form-control" name="comment" rows="3" maxlength="255" style="resize: none;"></textarea>
            </label>
            <div class="text-right">
                <button type="submit" class="btn btn-primary ">Отправить</button>
            </div>
        </form>
    </div>
<? endif;?>
<?php foreach ($comments as $com):?>

    <div class="comment">
        <table>
            <tr">
                <td rowspan="2"  style="vertical-align: top">
<!--                    сделать в бд модель с аватаром и выводить сюда-->
                    <img src="/Views/Style/img/non-profile.jpg" class="pull-left img-thumbnail">
                </td>
                <td class="sub-header" style="height: 25px;">
                    <h4 class="pull-left" style="color: lightcoral; margin: 0"><?=$com->name . ' ' . $com->surname;?> </h4>
                    <p class="pull-right" style="margin: 0"><?=$com->date;?></p>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 10px"><p style="font-size: 16px"><?=str_replace('<br />', '</p><p>', nl2br($com->comment));?></p></td>
            </tr>
        </table>
    </div>

<?php endforeach;?>
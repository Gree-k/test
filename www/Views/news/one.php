<p><a href="/index.php">&larr;Назад</a></p>
<div class="blog-post">
    <h1><?= $news->title; ?></h1>
    <p><?= str_replace('<br />', '</p><p>', nl2br($news->text)); ?></p>
</div>
<div class="sub-header">
    <h4 id="commentAnchor"><span class="glyphicon glyphicon-comment"></span> Комментарии</h4>
</div>
<div id="formComment">
    <form>
        <label  style="width: 100%">
            <textarea class="form-control" name="text" rows="3" maxlength="255" style="resize: none;"></textarea>
        </label>
        <div class="text-right">
            <button type="submit" class="btn btn-primary ">Отправить</button>
        </div>
    </form>
</div>
<?php foreach ($comments as $com):?>

    <div class="comment">
        <table>
            <tr>
                <td rowspan="2">
                    //сделать в бд модель с аватаром и выводить сюда
                    <img src="/Views/Style/non-profile.jpg" class="pull-left ">
                </td>
                <td class="sub-header">
                    <h4 class="pull-left" style="color: lightcoral;"><?=$com->name . ' ' . $com->surname;?> </h4>
                    <p class="pull-right"><?=$com->date;?></p>
                </td>
            </tr>
            <tr>
                <td><p style="font-size: 16px"><?=$com->comment;?></p></td>
            </tr>
        </table>
    </div>

<?php endforeach;?>
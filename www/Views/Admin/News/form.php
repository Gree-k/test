<form action="/index.php?cont=Admin&act=SaveNews" method="post">
    <?php if(!empty($news)):?>
        <input type="hidden" name="id" value="<?=$news->id;?>">
    <?php endif;?>
    <label class="adminFormLabel" >
        Заголовок статьи:
        <input class="form-control" type="text" name="title" style="margin-top: 10px"
               value="<?=empty($news) ? '' : htmlspecialchars($news->title,ENT_QUOTES);?>">
    </label>

    <label class="adminFormLabel">
        Содержание:
        <textarea class="form-control" name="text" rows="15" style="margin-top: 10px">
            <?=empty($news) ? '' : $news->text;?></textarea><br>
    </label>
    <input type="submit" value="Сохранить" class="btn btn-primary pull-right">
</form>

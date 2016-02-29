<form action="/index.php?act=Save" method="post">
    <?php if(!empty($news)):?><input type="hidden" name="id" value="<?=$news->id;?>"><? endif;?>
    Заголовок статьи:<br>
    <input type="text" name="title" value="<?=empty($news) ? '' : $news->title;?>"><br>
    Содержание:<br>
    <textarea name="text" rows="10"><?=empty($news) ? '' : $news->text;?></textarea><br>
    <input type="submit" value="Добавить">
</form>

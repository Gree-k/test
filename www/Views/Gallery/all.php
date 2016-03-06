<div <?php echo isset($_SESSION['username']) ? 'class="col-sm-9"' : 'class="col-sm-12"';?> >

    <?php foreach($image as $img):?>
        <div <?php echo isset($_SESSION['username']) ? 'class="col-xs-4 col-md-4""' : 'class="col-xs-4 col-md-3""';?>>
            <a href="index.php?cont=Gallery&act=One&id=<?=$img->id;?>" class="thumbnail" >
                <img  alt="<?=$img->name;?>" title="<?=$img->name;?>" src="<?=$img->url_mini;?>">
            </a>
        </div>
    <? endforeach;?>
</div>
<?php if (isset($_SESSION['username'])): ?>
    <div class=" col-sm-3 col-xs-4 ">
    <form enctype="multipart/form-data" action="index.php?cont=Gallery&act=SaveImg" method="post">
        <input type="file" accept="image/jpeg" name="uploadImg" style="margin-bottom: 10px">
        <button type="submit" class="btn btn-default">Загрузить</button>
    </form>
    </div>
<?php endif ?>
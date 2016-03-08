<div class="blog-header">
    <p class="lead blog-description">Тестовый вариант галереи</p>
</div>

<div <?php echo isset($_SESSION['username']) ? 'class="col-sm-9"' : 'class="col-sm-12"';?> >

    <?php foreach($image as $img):?>
        <div <?php echo isset($_SESSION['username']) ? 'class="col-xs-4 col-md-4""' : 'class="col-xs-4 col-md-3""';?>>
            <a href="index.php?cont=Gallery&act=One&id=<?=$img->id;?>" class="thumbnail" >
                <img  alt="<?=$img->name;?>" title="<?=$img->name;?>" src="<?=$img->url_mini;?>">
            </a>
        </div>
    <? endforeach;?>

    <?php if($count>IMG_ON_PAGE):?>
        <div class="col-xs-12">
            <div style="text-align: center;" >
                <ul class="pagination ">
                    <?php if(!isset($_GET['page']) || $_GET['page']==1):?>
                        <li><span>&laquo;</span></li>
                    <?php else:?>
                        <li ><a  href="/index.php?cont=Gallery&act=All&page=<?=$_GET['page']-1;?>">&laquo;</a></li>
                    <?php endif;?>

                    <?for($i=1;$i<=ceil($count/IMG_ON_PAGE);$i++):?>
                        <li <?php if((!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $i == $_GET['page'])):?>
                            class="active"
                        <?php endif;?>
                        ><a href="/index.php?cont=Gallery&act=All&page=<?=$i;?>"><?=$i;?></a></li>
                    <?endfor;?>

                    <?php if(isset($_GET['page']) && ceil($count/IMG_ON_PAGE) == $_GET['page']):?>
                        <li><span>&raquo;</span></li>
                    <?php else:?>
                        <li ><a  href="/index.php?cont=Gallery&act=All&page=<?=$_GET['page']+1;?>">&raquo;</a></li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    <? endif;?>
</div>
<?php if (isset($_SESSION['username'])): ?>
    <div class=" col-sm-3 col-xs-4 ">
    <form enctype="multipart/form-data" action="index.php?cont=Gallery&act=SaveImg" method="post">
        <input type="file" accept="image/jpeg" name="uploadImg" style="margin-bottom: 10px">
        <button type="submit" class="btn btn-default">Загрузить</button>
    </form>
    </div>
<?php endif ?>




<div class="blog-header">
    <p class="lead blog-description">Тестовый вариант новостной ленты</p>
</div>

<div class="col-sm-8 blog-main">
    <?php foreach ($news as $new):?>
        <div class="blog-post">
            <a href="index.php?act=One&id=<?=$new->id;?>"><h2 class="blog-post-title"><?= $new->title; ?></h2></a><br>
            <p class="blog-post-meta"><?=date("F j, Y", strtotime(explode(' ', $new->date)[0]));?>
                by <?=$new->username;?></p>
            <p><?= mb_substr($new->text,0,500)?>
                <?php if(mb_strlen($new->text)>500):?>
                    &nbsp;&hellip;
    <!--                <a href="index.php?act=One&id=--><?//=$new->id; ?><!--">Читать&nbsp;далее</a>-->
                <?php endif;?>
            </p>
    <!--        <a href="index.php?act=One&id=--><?//=$new->id;?><!--#commentAnchor">Коментарии</a>-->
            <div class="btn-group btn-group-lg" style="margin-left: -15px" >
                <a href="index.php?act=One&id=<?=$new->id;?>#commentAnchor" class="btn">
                    <span style="font-size: 0.8em" class="glyphicon glyphicon-comment"></span> <?=$new->countComm;?></a>
                <?php if(mb_strlen($new->text)>500):?>
                    <a href="index.php?act=One&id=<?=$new->id; ?>" class="btn">Читать далее</a>
                <?php endif;?>
            </div>
        </div>
    <?php endforeach;?>

    <?php if($count>NEWS_ON_PAGE):?>
        <div style="text-align: center">
            <ul class="pagination ">
                <?php if(!isset($_GET['page']) || $_GET['page']==1):?>
                    <li><span>&laquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=News&act=All&page=<?=$_GET['page']-1;?>">&laquo;</a></li>
                <?php endif;?>

                <?for($i=1;$i<=ceil($count/NEWS_ON_PAGE);$i++):?>
                    <li <?php if((!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $i == $_GET['page'])):?>
                        class="active"
                    <?php endif;?>
                    ><a href="/index.php?cont=News&act=All&page=<?=$i;?>"><?=$i;?></a></li>
                <?endfor;?>

                <?php if(isset($_GET['page']) && ceil($count/NEWS_ON_PAGE) == $_GET['page']):?>
                    <li><span>&raquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=News&act=All&page=<?=$_GET['page']+1;?>">&raquo;</a></li>
                <?php endif;?>
            </ul>
        </div>
    <? endif;?>
</div>

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
</div>


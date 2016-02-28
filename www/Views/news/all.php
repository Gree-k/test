<div class="col-sm-8 blog-main">
<?php foreach ($news as $new):?>
    <div class="blog-post">
        <a href="index.php?act=One&id=<?=$new->id;?>"><h2 class="blog-post-title"><?= $new->title; ?></h2></a><br>
        <p class="blog-post-meta"><?=$new->date;?> by <?=$new->login;?></p>
        <p><?= mb_substr($new->text,0,500)?>
            <?php if(mb_strlen($new->text)>500):?>
                &nbsp;&hellip;&nbsp;
                <a href="index.php?act=One&id=<?=$new->id; ?>">Читать&nbsp;далее</a>
            <?php endif;?>
        </p>
    </div>

<?php endforeach;?>
</div>

<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>
</div>
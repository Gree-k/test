<h2>Список всех новостей</h2>

<div id="newState" class="sub-header">
<a href="index.php?cont=Admin&act=FormNews" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Добавить статью</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Автор</th>
            <th>Дата публикации</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($news as $new):?>
            <tr>
                <td style="width: 50%"><a href="index.php?cont=Admin&act=One&id=<?=$new->id;?>"><?= $new->title; ?></a></td>
                <td><?=$new->username;?></td>
                <td><?=$new->date;?></td>
                <td><a href="index.php?cont=Admin&act=FormNews&id=<?=$new->id;?>">Редактировать</a></td>
                <td><a href="index.php?cont=Admin&act=DeleteNews&id=<?=$new->id;?>">Удалить</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?php if($count>NEWS_ON_PANEL):?>
        <div style="text-align: center">
            <ul class="pagination ">
                <?php if(!isset($_GET['page']) || $_GET['page']==1):?>
                    <li><span>&laquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=Admin&act=All&page=<?=$_GET['page']-1;?>">&laquo;</a></li>
                <?php endif;?>

                <?for($i=1;$i<=ceil($count/NEWS_ON_PANEL);$i++):?>
                    <li <?php if((!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $i == $_GET['page'])):?>
                        class="active"
                    <?php endif;?>
                    ><a href="/index.php?cont=Admin&act=All&page=<?=$i;?>"><?=$i;?></a></li>
                <?endfor;?>

                <?php if(isset($_GET['page']) && ceil($count/NEWS_ON_PANEL) == $_GET['page']):?>
                    <li><span>&raquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=Admin&act=All&page=<?=$_GET['page']+1;?>">&raquo;</a></li>
                <?php endif;?>
            </ul>
        </div>
    <? endif;?>
</div>
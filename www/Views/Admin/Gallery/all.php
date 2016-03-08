<script src="/JavaScripts/RenameImg.js"></script>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Изображение</th>
            <th>Размер</th>
            <th>Имя</th>
            <th>Загрузил</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image):?>
            <tr>
                <td><a href="<?=$image->url;?>" target="_blank">
                        <img src="<?= $image->url_mini; ?>" style="width: 100px"></a></td>
                <td><?=$image->size;?></td>
                <td><?=$image->name;?></td>
                <td><?=$image->username;?></td>
                <td><a class="rename" data-name="<?=$image->name;?>"
                       href="index.php?cont=Admin&act=RenameImg&id=<?=$image->id;?>">Изменить имя</a></td>
                <td><a href="index.php?cont=Admin&act=DelImg&id=<?=$image->id;?>">Удалить</a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <?php if($count>IMG_ON_PANEL):?>
        <div style="text-align: center">
            <ul class="pagination ">
                <?php if(!isset($_GET['page']) || $_GET['page']==1):?>
                    <li><span>&laquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=Admin&act=AllImg&page=<?=$_GET['page']-1;?>">&laquo;</a></li>
                <?php endif;?>

                <?for($i=1;$i<=ceil($count/IMG_ON_PANEL);$i++):?>
                    <li <?php if((!isset($_GET['page']) && $i==1) || (isset($_GET['page']) && $i == $_GET['page'])):?>
                            class="active"
                        <?php endif;?>
                    ><a href="/index.php?cont=Admin&act=AllImg&page=<?=$i;?>"><?=$i;?></a></li>
                <?endfor;?>

                <?php if(isset($_GET['page']) && ceil($count/IMG_ON_PANEL) == $_GET['page']):?>
                    <li><span>&raquo;</span></li>
                <?php else:?>
                    <li ><a  href="/index.php?cont=Admin&act=AllImg&page=<?=$_GET['page']+1;?>">&raquo;</a></li>
                <?php endif;?>
            </ul>
        </div>
    <? endif;?>

</div>
<div id="modalRename" class="modal fade ">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Редактирование</h4>
            </div>
            <form id="modalFormRename" action="" method="post">
                <div class="modal-body" >
                    <label class="control-label" for="newName">Имя изображения:</label>
                    <input type="text" class="form-control form-group"
                           name="name" id="newName" placeholder="Введите новое имя">
                    <!--форма авторизации-->
                </div>
                <div class="modal-footer">
                    <button id="sendName" type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
</div>
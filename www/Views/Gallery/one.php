<script src="/JavaScripts/carousel.js"></script>

<div class="sub-header"><a href="/index.php?cont=Gallery">&larr;Назад</a></div>
<div class="blog-post">

    <div id="wrapper" class="col-xs-12 sub-header" >
        <img id="carouselLeft" src="/Views/Style/img/leftArr.jpg" alt="Left Arrow" class="col-xs-2 "/>

            <ul id="arrImg">
<!--                изображения в карусели-->
            </ul>

        <img id="carouselRight" src="/Views/Style/img/rightArr.jpg" alt="Right Arrow" class="col-xs-2 "/>
    </div>

    <div class="col-sm-10 col-sm-offset-1" style="font-family: Arial">
        <div >
            <table style="width: 100%; margin-bottom: 20px;">
                <tr>
                    <td  class="text-left">Загрузил: <a id="author"><?=$image->username;?></a></td>
                    <td class="text-right"><b>Размер:</b> <span id="size"><?=$image->size;?></span></td>
                </tr>
            </table>
        </div>
        <a id="mainImg" href="<?=$image->url;?>" target="_blank" class="thumbnail">
            <img src="<?=$image->url;?>" >
        </a>
        <div style="margin-bottom: 15px">
            <span id="likes" class="glyphicon glyphicon-eye-open" style="font-size: 0.9em;"> <?=$image->likes;?></span>&nbsp;&nbsp;&nbsp;
            <span id="views" class="glyphicon glyphicon-heart" style="font-size: 0.9em"> <?=$image->views;?></span>
        </div>

    </div>

</div>